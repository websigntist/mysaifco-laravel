<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Module;
use App\Models\backend\BlogCategory;
use App\Models\backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Response;

class BlogCategoryController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $db;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId(); // global helper
        $this->table = BlogCategory::class;
        $this->module = 'blog-category';
        $this->db = 'blog_categories';
        $this->notify_title = 'Blog Category';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $_moduleName = collect($segments)->last();
        $moduleName = Str::singular($_moduleName);

        $getData = ($this->table)::with('parentCategory')->latest()->get();

        $columns = [
            'image',
            'title',
            'parent_id',
            'status',
            'ordering',
            'created_by',
            'created_at'
        ];

        // columns to hide
        $hiddenColumns = [
            'created_by',
            'menu_title',
            'ordering',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleName,
            'module'           => $moduleName,
            '_module'          => $_moduleName,
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
        $categories = Str::plural($moduleName);

        $blogCategories = ($this->table)::all([
            'id',
            'title',
            'parent_id'
        ]);

        $getStatus = getEnumValues($this->db, 'status');
        $getShowinmenu = getEnumValues($this->db, 'show_in_menu');

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            '_module'          => $categories,
            'getStatus'        => $getStatus,
            'getShowinmenu'    => $getShowinmenu,
            'blogCategories'   => $blogCategories,
            'meta_title'       => "Create New | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function store(Request $request)
    {
        $action = $request->submitBtn;

        if ($request->isMethod('post')) {
            Log::info('Request data:', $request->all());

            // Validate input
            $validated = $request->validate([
                'title'        => 'required|string|max:255',
                'friendly_url' => 'required|string|unique:blogs,friendly_url|max:255',
                'meta_title'   => 'required|string|max:255',
            ]);

            $uploadImage = imageHandling($request, null, 'image', $this->module);

            // Insert into BlogCategory table
            $dataToStore = [
                'title'            => $request->title,
                'friendly_url'     => $request->friendly_url,
                'description'      => $request->description,
                'parent_id'        => $request->parent_id,
                'status'           => $request->status,
                'ordering'         => $request->ordering ?? 0,
                'meta_title'       => $request->meta_title,
                'meta_keywords'    => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'created_by'       => currentUserId(),
                'image'            => $uploadImage,
            ];

            $blogCat = ($this->table)::create($dataToStore);

            if (!$blogCat) {
                Log::error('Failed to create', $dataToStore);
                return back()->with('error', 'Failed to create.');
            }

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' created successfully.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $blogCat->id)->with('success', $this->notify_title . ' created successfully.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' created successfully.');
            }
        }

        return back()->with('error', 'Invalid request method.');
    }

    public function editForm(Request $request, $id)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular($moduleName);
        $_categories = Str::plural($moduleName);

        // Load the blog with its categories
        $blogCat = ($this->table)::with('blogCategories')->findOrFail($id);

        // Load all categories to show in multi-select
        $categories = ($this->table)::all();

        $getStatus = getEnumValues($this->db, 'status');
        $getShowinmenu = getEnumValues($this->db, 'show_in_menu');

        return view('backend.' . $this->module . '.edit', [
            'data'             => $blogCat,
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'categories'       => $categories,
            'getStatus'        => $getStatus,
            'getShowinmenu'    => $getShowinmenu,
            '_categories'      => $_categories,
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
            'title'        => 'required|string|max:255',
            'friendly_url' => 'required|string|max:255|unique:blogs,friendly_url,' . $id,
            'meta_title'   => 'required|string|max:255',
        ]);

        try {
            // Find the blog category
            $blogCat = ($this->table)::findOrFail($id);

            // Initialize data to update
            $dataToUpdate = [
                'title'            => $request->title,
                'friendly_url'     => $request->friendly_url,
                'description'      => $request->description,
                'parent_id'        => $request->parent_id,
                'status'           => $request->status,
                'show_title'       => $request->show_title,
                'show_in_menu'     => $request->show_in_menu,
                'ordering'         => $request->ordering ?? 0,
                'meta_title'       => $request->meta_title,
                'meta_keywords'    => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'created_by'       => currentUserId(),
            ];

            // Handle image update or deletion
            $dataToUpdate['image'] = imageHandling($request, $blogCat, 'image', $this->module);

            // Update category
            $blogCat->update($dataToUpdate);

            // Sync relationships if you have categories linked
            if ($request->has($this->db)) {
                $blogCat->blogCategories()->sync($request->blog_categories);
            }

            if ($action === 'save_new') {
                return to_route($this->module.'.create')->with('success', $this->notify_title . ' updated successfully.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module.'.edit', $blogCat->id)->with('success', $this->notify_title . ' updated successfully.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' updated successfully.');
            }

        } catch (\Exception $e) {
            \Log::error('Update failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating: ' . $e->getMessage());
        }
    }

    public function status($id)
    {
        $blogCat = ($this->table)::findOrFail($id);

        // Toggle status
        $newStatus = $blogCat->status === 'Active' ? 'Inactive' : 'Active';

        $blogCat->update(['status' => $newStatus]);

        return redirect()->route($this->module)->with('success', $this->notify_title . ' status updated to ' . ucfirst($newStatus) . '.');
    }

    public function updateStatusAjax(Request $request, $id)
    {
        $blogCat = ($this->table)::findOrFail($id);

        // Toggle or set status
        $newStatus = $request->status === 'Active' ? 'Inactive' : 'Active';
        $blogCat->status = $newStatus;
        $blogCat->save();

        return response()->json([
            'success' => true,
            'status'  => $newStatus,
            'message' => $this->notify_title . " Status Updated to {$newStatus}"
        ]);
    }

    public function updateOrderingAjax(Request $request)
    {
        $request->validate([
            'id'       => 'required|integer|exists:blog-category,id',
            'ordering' => 'required|integer|min:0',
        ]);

        $blogCat = ($this->table)::findOrFail($request->id);
        $blogCat->ordering = $request->ordering;
        $blogCat->save();

        return response()->json([
            'success'  => true,
            'message'  => $this->notify_title . ' ordering updated successfully',
            'id'       => $blogCat->id,
            'ordering' => $blogCat->ordering,
        ]);
    }

    public function deleteAjax($id)
    {
        try {
            $blogCat = ($this->table)::findOrFail($id);
            $blogCat->delete();

            return response()->json([
                'success' => true,
                'message' => $this->notify_title . ' deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $this->notify_title . ' failed to delete: ' . $e->getMessage()
            ], 500);
        }
    }

    public function modalView($id)
    {
        // Load the page with its parent and creator relationships
        $blogCat = ($this->table)::with([
            'parentCategory',
            'creator'
        ])->findOrFail($id);

        return response()->json([
            'id'                => $blogCat->id,
            'title'             => $blogCat->title,
            'parent_id'         => $blogCat->parent_id,
            'parent_page_title' => $blogCat->parentCategory->title ?? '/Parent',
            'friendly_url'      => $blogCat->friendly_url,
            'description'       => $blogCat->description,
            'ordering'          => $blogCat->ordering,
            'show_in_menu'      => $blogCat->show_in_menu,
            'status'            => $blogCat->status,
            'image'             => $blogCat->image ?? null,
            'created_at'        => $blogCat->created_at ? $blogCat->created_at->format('M d, Y') : null,
            'created_by_name'   => trim(($blogCat->creator->first_name ?? '') . ' ' . ($blogCat->creator->last_name ?? '')),
        ]);
    }

    public function delete($id)
    {
        try {
            $blogCat = ($this->table)::findOrFail($id);
            $blogCat->delete();

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

    public function export()
    {
        $fileName = 'blogs_export_' . now()->format('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
            'Cache-Control'       => 'no-cache, no-store, must-revalidate',
            'Pragma'              => 'no-cache',
            'Expires'             => '0',
        ];

        $columns = [
            'ID',
            'Category Title',
            'Friendly URL',
            'Description',
            'Status',
            'Ordering',
            'Created By',
            'Meta Title',
            'Meta Keywords',
            'Meta Description',
            'Created At',
            'Updated At',
        ];

        $callback = function () use ($columns) {
            $handle = fopen('php://output', 'w');

            // Add header row
            fputcsv($handle, $columns);

            // Chunk blogs with categories + creator
            ($this->table)::with([
                'creator',
                'blogCategories'
            ])->chunk(200, function ($blogCats) use ($handle) {
                foreach ($blogCats as $blogCat) {
                    // Get categories as comma-separated string
                    $categories = $blogCat->blogCategories->pluck('title')->implode(', ');

                    fputcsv($handle, [
                        $blogCat->id,
                        $blogCat->title,
                        $blogCat->show_title,
                        $blogCat->friendly_url,
                        str_replace([
                            "\r",
                            "\n"
                        ], ' ', $blogCat->description),
                        // Clean desc
                        ucfirst($blogCat->status),
                        $blogCat->ordering,
                        $blogCat->creator ? $blogCat->creator->first_name . ' ' . $blogCat->creator->last_name : 'N/A',
                        $categories ?: 'N/A',
                        // Show categories
                        $blogCat->meta_title,
                        $blogCat->meta_keywords,
                        $blogCat->meta_description,
                        $blogCat->created_at ? $blogCat->created_at->format('Y-m-d H:i:s') : '',
                        $blogCat->updated_at ? $blogCat->updated_at->format('Y-m-d H:i:s') : '',
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
        $categories = Str::plural($moduleName);

        return view('backend.' . $this->module . '.import', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'categories'       => $categories,
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

                // Create or update blog
                $blogCat = ($this->table)::updateOrCreate(['friendly_url' => $data['friendly_url']], // unique field
                    [
                        'title'            => $data['title'] ?? '',
                        'description'      => $data['description'] ?? '',
                        'status'           => $data['status'] ?? 'unpublish',
                        'image'            => $data['image'] ?? null,
                        'ordering'         => $data['ordering'] ?? 0,
                        'created_by'       => auth()->id(),
                        // Always logged-in user
                        'meta_title'       => $data['meta_title'] ?? '',
                        'meta_keywords'    => $data['meta_keywords'] ?? '',
                        'meta_description' => $data['meta_description'] ?? '',
                        'created_at'       => now(),
                        // Current import timestamp
                        'updated_at'       => now(),
                        // Current import timestamp
                    ]);
            }

            fclose($handle);
        }

        return redirect()->route($this->module)->with('success', $this->notify_title . ' imported successfully.');
    }

    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $_moduleName = collect($segments)->last();
        $moduleName = Str::singular($_moduleName);
        $moduleName = $segments[count($segments) - 2] ?? null;

        $getData = ($this->table)::with('parentCategory')->onlyTrashed()->latest()->get();

        $columns = [
            'image',
            'title',
            'parent_id',
            'status',
            'ordering',
            'created_by',
            'created_at'
        ];

        // columns to hide
        $hiddenColumns = [
            'created_by',
            'menu_title',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleName,
            'module'           => $moduleName,
            '_module'          => $_moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => "Trashed List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function restore($id)
    {
        $restore = ($this->table)::withTrashed()->findOrFail($id);
        $restore->restore();

        return redirect()->route('blog-category')->with('success', $this->notify_title . ' restored successfully!');
    }

    public function forceDelete($id)
    {
        $forcedelete = ($this->table)::withTrashed()->findOrFail($id);
        $forcedelete->forceDelete();

        return redirect()->route('blog-category')->with('success', $this->notify_title . ' permanently deleted!');
    }

    private function uniqueBlogCategoryFriendlyUrl(string $base): string
    {
        $candidate = $base;
        $n = 1;
        while (($this->table)::withTrashed()->where('friendly_url', $candidate)->exists()) {
            $candidate = $base . '-' . $n;
            $n++;
        }

        return $candidate;
    }
}
