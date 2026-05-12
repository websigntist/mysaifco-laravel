<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Module;
use App\Models\backend\Page;
use App\Models\backend\MaintenanceMode;
use App\Models\backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Response;

class pageController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId(); // global helper
        $this->table = Page::class;
        $this->module = 'pages';
        $this->notify_title = 'Page';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular($moduleName);

        $getData = ($this->table)::with('parentPage')->latest()->get();
        $columns = [
            'image',
            'menu_title',
            'page_title',
            'friendly_url',
            'parent_id',
            'status',
            'ordering',
            'created_at',
            'created_by'
        ];

        // columns to hide
        $hiddenColumns = [
            'created_by',
            'menu_title',
            'ordering',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => "List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function create(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = Str::singular($moduleName);

        $parentPages = ($this->table)::select('id', 'menu_title', 'parent_id')
            //->orderBy('id', 'desc')   // order by id
            ->orderBy('menu_title', 'asc') // order by title instead
            ->get();

        $getStatus = getEnumValues($this->module, 'status');
        $getlayout = getEnumValues($this->module, 'container_layout');
        $getShowinmenu = getEnumValues($this->module, 'show_in_menu');

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'parentPages'      => $parentPages,
            'getStatus'        => $getStatus,
            'getlayout'        => $getlayout,
            'getShowinmenu'    => $getShowinmenu,
            'meta_title'       => "Create New | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function store(Request $request)
    {
        $action = $request->submitBtn;

        if ($request->isMethod('post')) {
            // Log request data for debugging
            Log::info('Request data:', $request->all());

            // Validate input
            $validated = $request->validate([
                'menu_title'   => 'required|string|max:255',
                'page_title'   => 'required|string|max:255',
                'friendly_url' => 'required|string|unique:pages,friendly_url|max:255',
                'description'  => 'required|string',
                'meta_title'   => 'required|string|max:255',
                //'image'             => 'nullable|image|mimes:webp,jpeg,png,jpg|max:2048',
            ]);

            $uploadImage = imageHandling($request, null, 'image', $this->module);

            // Insert into table
            $dataToStore = [
                'menu_title'       => $request->menu_title,
                'page_title'       => $request->page_title,
                'show_title'       => (int)($request->show_title ?? 0),
                'sub_title'        => $request->sub_title,
                'friendly_url'     => $request->friendly_url,
                'description'      => $request->description,
                'status'           => $request->status,
                'parent_id'        => (int)($request->parent_id ?? 0),
                'container_layout' => $request->container_layout,
                'show_in_menu'     => $request->show_in_menu,
                'ordering'         => $request->ordering ?? 0,
                'meta_title'       => $request->meta_title,
                'meta_keywords'    => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'created_by'       => currentUserId(),
                'image'            => $uploadImage,
                'image_alt'        => $request->image_alt,
                'image_title'      => $request->image_title,
            ];

            $page = ($this->table)::create($dataToStore);
            if (!$page) {
                Log::error('Failed to create', $dataToStore);
                return back()->with('error', 'Failed to create.');
            }

            // Handle maintenance mode image upload
            $maintenanceImageName = imageHandling($request, null, 'maintenance_image', 'maintenance');

            // Insert into maintenance_modes table if maintenance_title and mode are provided
            if ($request->filled('maintenance_title') && $request->filled('mode')) {
                $maintenanceData = [
                    'page_id'           => $page->id,
                    'maintenance_title' => $request->maintenance_title,
                    'mode'              => $request->mode,
                    'maintenance_image' => $maintenanceImageName,
                ];

                $maintenanceMode = MaintenanceMode::create($maintenanceData);
                if (!$maintenanceMode) {
                    Log::error('Failed to create maintenance mode', $maintenanceData);
                    return back()->with('error', 'Failed to create maintenance mode.');
                }
            }

            if ($action === 'save_new') {
                // Insert into maintenance_modes table if maintenance_title and mode are provided
                return to_route($this->module.'.create')->with('success', $this->notify_title . ' Created Successfully.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module.'.edit', $page->id)->with('success', $this->notify_title . ' Created successfully.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' Created successfully.');
            }

        }

        return back()->with('error', 'Invalid request method.');
    }

    public function duplicate($id)
    {
        $source = ($this->table)::withTrashed()->findOrFail($id);

        $baseUrl = $source->friendly_url ?: 'page';
        $candidateUrl = '';
        for ($i = 0; $i < 50; $i++) {
            $candidateUrl = $baseUrl . '-copy-' . Str::lower(Str::random(6));
            if (strlen($candidateUrl) > 255) {
                $candidateUrl = Str::limit($baseUrl, 220, '') . '-' . Str::lower(Str::random(6));
            }
            if (!($this->table)::where('friendly_url', $candidateUrl)->exists()) {
                break;
            }
        }

        if (($this->table)::where('friendly_url', $candidateUrl)->exists()) {
            return redirect()->route($this->module)->with('error', 'Could not generate a unique URL for the duplicate.');
        }

        $newImage = null;
        if (!empty($source->image)) {
            $dir = public_path('assets/images/' . $this->module);
            $srcPath = $dir . DIRECTORY_SEPARATOR . $source->image;
            if (File::exists($srcPath)) {
                $ext = pathinfo($source->image, PATHINFO_EXTENSION);
                $newImage = uniqid('dup_', true) . ($ext !== '' ? '.' . $ext : '');
                File::copy($srcPath, $dir . DIRECTORY_SEPARATOR . $newImage);
            }
        }

        $page = ($this->table)::create([
            'menu_title'       => $source->menu_title . ' (Copy)',
            'page_title'       => $source->page_title . ' (Copy)',
            'show_title'       => $source->show_title,
            'sub_title'        => $source->sub_title,
            'friendly_url'     => $candidateUrl,
            'description'      => $source->description,
            'status'           => $source->status,
            'parent_id'        => $source->parent_id,
            'container_layout' => $source->container_layout,
            'show_in_menu'     => $source->show_in_menu,
            'ordering'         => $source->ordering,
            'meta_title'       => $source->meta_title,
            'meta_keywords'    => $source->meta_keywords,
            'meta_description' => $source->meta_description,
            'created_by'       => currentUserId(),
            'image'            => $newImage,
            'image_alt'        => $source->image_alt,
            'image_title'      => $source->image_title,
        ]);

        $maint = MaintenanceMode::where('page_id', $source->id)->first();
        if ($maint) {
            $newMaintImage = null;
            if (!empty($maint->maintenance_image)) {
                $mDir = public_path('assets/images/maintenance');
                $mSrc = $mDir . DIRECTORY_SEPARATOR . $maint->maintenance_image;
                if (File::exists($mSrc)) {
                    $ext = pathinfo($maint->maintenance_image, PATHINFO_EXTENSION);
                    $newMaintImage = uniqid('dup_m_', true) . ($ext !== '' ? '.' . $ext : '');
                    File::copy($mSrc, $mDir . DIRECTORY_SEPARATOR . $newMaintImage);
                }
            }

            MaintenanceMode::create([
                'page_id'           => $page->id,
                'maintenance_title' => $maint->maintenance_title,
                'mode'              => $maint->mode,
                'maintenance_image' => $newMaintImage,
            ]);
        }

        return redirect()
            ->route($this->module . '.edit', $page->id)
            ->with('success', $this->notify_title . ' duplicated. Adjust titles and URL if needed.');
    }

    public function editForm($id, Request $request)
    {
        $page = ($this->table)::findOrFail($id);

        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular($moduleName);

        // Only fetch menu_title and parent_id for the dropdown
        $parent_id = ($this->table)::select('id', 'menu_title', 'parent_id')->orderBy('id', 'desc')->get();

        $maintenance = MaintenanceMode::where('page_id', $id)->first();
        $getStatus = getEnumValues($this->module, 'status');
        $getlayout = getEnumValues($this->module, 'container_layout');
        $getShowinmenu = getEnumValues($this->module, 'show_in_menu');

        return view('backend.' . $this->module . '.edit', [
            'data'             => $page,
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'parent_ids'       => $parent_id,
            'maintenance'      => $maintenance,
            'getStatus'        => $getStatus,
            'getlayout'        => $getlayout,
            'getShowinmenu'    => $getShowinmenu,
            'meta_title'       => "Edit | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;
        // Validate input
        $request->validate([
            'menu_title'   => 'required|string|max:255',
            'page_title'   => 'required|string|max:255',
            'friendly_url' => 'required|string|max:255|unique:pages,friendly_url,' . $id,
            'description'  => 'required|string',
            'meta_title'   => 'required|string|max:255',
        ]);

        try {
            // Find the
            $page = ($this->table)::findOrFail($id);

            // Initialize data to update
            $dataToUpdate = [
                'menu_title'       => $request->menu_title,
                'page_title'       => $request->page_title,
                'show_title'       => (int)($request->show_title ?? 0),
                'sub_title'        => $request->sub_title,
                'friendly_url'     => $request->friendly_url,
                'description'      => $request->description,
                'status'           => $request->status,
                'parent_id'        => (int)($request->parent_id ?? 0),
                'container_layout' => $request->container_layout,
                'show_in_menu'     => $request->show_in_menu,
                'ordering'         => $request->ordering ?? 0,
                'created_by'       => $this->userId,
                'meta_title'       => $request->meta_title,
                'meta_keywords'    => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'image_alt'        => $request->image_alt,
                'image_title'      => $request->image_title,
            ];

            // Handle image update or deletion
            $dataToUpdate['image'] = imageHandling($request, $page, 'image', $this->module);

            // Update
            $page->update($dataToUpdate);

            // Handle Maintenance Mode
            if ($request->filled('maintenance_title') || $request->filled('mode') || $request->hasFile('maintenance_image')) {
                $maintenance = MaintenanceMode::firstOrNew(['page_id' => $page->id]);

                $maintenance['maintenance_image'] = imageHandling($request, $maintenance, 'maintenance_image', 'maintenance');

                $maintenance->maintenance_title = $request->maintenance_title;
                $maintenance->mode = $request->mode;
                $maintenance->save();
            }

            if ($action === 'save_new') {
                return to_route('pages.create')->with('success', $this->notify_title . ' Updated! Ready to add another.');
            } elseif ($action === 'save_stay') {
                return to_route('pages.edit', $page->id)->with('success', $this->notify_title . ' Updated! You can continue editing.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' updated successfully.');
            }

            return redirect()->route($this->module)->with('success', $this->notify_title . ' created successfully.');
        } catch (\Exception $e) {
            Log::error('Page update failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating.: ' . $e->getMessage());
        }
    }

    public function status($id)
    {
        $page = ($this->table)::findOrFail($id);

        // Toggle status
        $newStatus = $page->status === 'published' ? 'unpublish' : 'published';

        $page->update(['status' => $newStatus]);

        return redirect()->route($this->module)->with('success', $this->notify_title . ' status updated to ' . ucfirst($newStatus) . '.');
    }

    public function view($id)
    {
        \Log::info('View page ID: ' . $id);
        $page = ($this->table)::findOrFail($id);
        $maintenance = MaintenanceMode::where('page_id', $id)->first();

        return view('backend.' . $this->module . '.view', [
            'page'             => $page,
            'maintenance'      => $maintenance,
            'meta_title'       => "View Detail | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function delete($id)
    {
        try {
            $page = ($this->table)::findOrFail($id);      // Find the
            $page->delete();                              // Delete it

            return redirect()->route($this->module)->with('success', $this->notify_title . ' deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function deleteAll(Request $request)
    {
        $selectedIds = $request->ids; // array of IDs
        $trashed = $request->trashed;

        if (is_array($selectedIds) && count($selectedIds)) {
            if ($trashed === 'trashed') {
                ($this->table)::withTrashed()->whereIn('id', $request->ids)->forceDelete();
                return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . ' permanently deleted!');
            }

            ($this->table)::whereIn('id', $selectedIds)->delete();
            return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . ' deleted successfully.');
        }

        return redirect()->route($this->module)->with('error', $this->notify_title . ' not selected.');
    }

    public function updateStatusAjax(Request $request, $id)
    {
        $page = ($this->table)::findOrFail($id);

        // Toggle or set status
        $newStatus = $request->status === 'published' ? 'unpublish' : 'published';
        $page->status = $newStatus;
        $page->save();

        return response()->json([
            'success' => true,
            'status'  => $newStatus,
            'message' => $this->notify_title . " Status Updated to {$newStatus}"
        ]);
    }

    public function updateTitleAjax(Request $request)
    {
        $request->validate([
            'id'         => 'required|string|exists:pages,id',
            'menu_title' => 'required|string|min:0',
        ]);

        $page = ($this->table)::findOrFail($request->id);
        $page->menu_title = $request->menu_title;
        $page->save();

        return response()->json([
            'success'    => true,
            'message'    => $this->notify_title . ' title updated successfully',
            'id'         => $page->id,
            'menu_title' => $page->menu_title,
        ]);
    }

    public function updateOrderingAjax(Request $request)
    {
        $request->validate([
            'id'       => 'required|integer|exists:pages,id',
            'ordering' => 'required|integer|min:0',
        ]);

        $page = ($this->table)::findOrFail($request->id);
        $page->ordering = $request->ordering;
        $page->save();

        return response()->json([
            'success'  => true,
            'message'  => $this->notify_title . ' ordering updated successfully',
            'id'       => $page->id,
            'ordering' => $page->ordering,
        ]);
    }

    public function deleteAjax($id)
    {
        try {
            // Find the
            $page = ($this->table)::findOrFail($id);

            // Delete maintenance record(s) related to this
            MaintenanceMode::where('page_id', $id)->delete();

            // Delete the itself
            $page->delete();

            return response()->json([
                'success' => true,
                'message' => $this->notify_title . ' deleted successfully.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $this->notify_title .  ' failed to delete: ' . $e->getMessage()
            ], 500);
        }
    }

    public function modalView($id)
    {
        // Load the with its parent and creator relationships
        $page = ($this->table)::with([
            'parentPage',
            'creator'
        ])->findOrFail($id);

        return response()->json([
            'id'                => $page->id,
            'menu_title'        => $page->menu_title,
            'parent_id'         => $page->parent_id,
            'parent_page_title' => $page->parentPage->menu_title ?? '/Parent',
            'page_title'        => $page->page_title,
            'friendly_url'      => $page->friendly_url,
            'description'       => $page->description,
            'ordering'          => $page->ordering,
            'show_in_menu'      => $page->show_in_menu,
            'status'            => $page->status,
            'image'             => $page->image ?? null,
            'image_alt'         => $page->image_alt ?? null,
            'image_title'       => $page->image_title ?? null,
            'created_at'        => $page->created_at ? $page->created_at->format('M d, Y') : null,
            'created_by_name'   => trim(($page->creator->first_name ?? '') . ' ' . ($page->creator->last_name ?? '')),
        ]);
    }

    public function export()
    {
        $fileName = 'pages_export_' . now()->format('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
        ];

        $columns = [
            'ID',
            'Menu Title',
            'Page Title',
            'Show Title',
            'Sub Title',
            'Friendly URL',
            'Description',
            'Status',
            'Image',
            'Image Alt',
            'Image Title',
            'Ordering',
            'Created By',
            'Meta Title',
            'Meta Keywords',
            'Meta Description',
            'Created At',
            'Updated At'
        ];

        $callback = function () use ($columns) {
            $handle = fopen('php://output', 'w');

            // Add header
            fputcsv($handle, $columns);

            // Add rows
            ($this->table)::chunk(200, function ($pages) use ($handle) {
                foreach ($pages as $page) {
                    fputcsv($handle, [
                        $page->id,
                        $page->menu_title,
                        $page->page_title,
                        $page->show_title,
                        $page->sub_title,
                        $page->friendly_url,
                        $page->description,
                        $page->status,
                        $page->image,
                        $page->image_alt,
                        $page->image_title,
                        $page->ordering,
                        $page->creator->first_name . ' ' . $page->creator->last_name,
                        $page->meta_title,
                        $page->meta_keywords,
                        $page->meta_description,
                        $page->created_at,
                        $page->updated_at,
                    ]);
                }
            });

            fclose($handle);
        };

        return response()->streamDownload($callback, $fileName, $headers);
    }

    public function importForm(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = Str::singular($moduleName);

        return view('backend.' . $this->module . '.import', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'meta_title'       => "Import CSV List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048',
        ]);

        if (($handle = fopen($request->file('csv_file')->getRealPath(), 'r')) !== false) {
            $header = fgetcsv($handle, 1000, ','); // read header row

            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                $data = array_combine($header, $row);

                $page = ($this->table)::updateOrCreate(['friendly_url' => $data['friendly_url']], // unique field
                    [
                        'menu_title'       => $data['menu_title'] ?? '',
                        'page_title'       => $data['page_title'] ?? '',
                        'show_title'       => $data['show_title'] ?? '',
                        'sub_title'        => $data['sub_title'] ?? '',
                        'description'      => $data['description'] ?? '',
                        'status'           => $data['status'] ?? 'unpublish',
                        'image'            => $data['image'] ?? null,
                        'image_alt'        => $data['image_alt'] ?? null,
                        'image_title'      => $data['image_title'] ?? null,
                        'parent_id'        => $data['parent_id'] ?? null,
                        'container_layout' => $data['container_layout'] ?? '',
                        'show_in_menu'     => $data['show_in_menu'] ?? '',
                        'ordering'         => $data['ordering'] ?? 0,
                        'created_by'       => auth()->id(),
                        'meta_title'       => $data['meta_title'] ?? '',
                        'meta_keywords'    => $data['meta_keywords'] ?? '',
                        'meta_description' => $data['meta_description'] ?? '',
                        'created_at'       => $data['created_at'] ?? now(),
                        'updated_at'       => $data['updated_at'] ?? now(),
                    ]);

                // 2. Insert or update maintenance_modes for this
                MaintenanceMode::updateOrCreate(['page_id' => $page->id], // unique field
                    [
                        'mode' => $data['mode'] ?? '0',
                        // default off
                    ]);
            }

            fclose($handle);
        }

        return redirect()->route($this->module)->with('success', $this->notify_title . 's imported successfully.');
    }

    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $trashed = collect($segments)->last();
        $moduleTitle = Str::singular($trashed);
        $moduleName = $segments[count($segments) - 2] ?? null;

        $getData = ($this->table)::with('parentPage')->onlyTrashed()->latest()->get();
        $columns = [
            'image',
            'menu_title',
            'page_title',
            'friendly_url',
            'parent_id',
            'status',
            'ordering',
            'created_at',
            'created_by'
        ];

        // columns to hide
        $hiddenColumns = [
            'created_by',
            'menu_title',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $trashed,
            'getData'          => $getData,
            'columns'          => $columns,
            'moduleName'       => $moduleName,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => "Trashed list | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function restore($id)
    {
        $restore = ($this->table)::withTrashed()->findOrFail($id);
        $restore->restore();

        return redirect()->route($this->module)->with('success', $this->notify_title . ' restored successfully!');
    }

    public function forceDelete($id)
    {
        $forcedelete = ($this->table)::withTrashed()->findOrFail($id);
        $forcedelete->forceDelete();

        return redirect()->route($this->module)->with('success', $this->notify_title . ' permanently deleted!');
    }

}
