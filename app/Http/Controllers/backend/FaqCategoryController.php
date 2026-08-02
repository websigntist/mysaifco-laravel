<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FaqCategoryController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $db;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId();
        $this->table = FaqCategory::class;
        $this->module = 'faq-categories';
        $this->db = 'faq_categories';
        $this->notify_title = 'FAQ Category';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        $getData = ($this->table)::latest()->get();

        $columns = [
            'image',
            'title',
            'status',
            'ordering',
            'created_by',
            'created_at',
        ];

        $hiddenColumns = [
            'created_by',
            'ordering',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $this->module,
            'moduleName'       => $moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => "Listing | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function create(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? $this->module;
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        $getStatus = getEnumValues($this->db, 'status');

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $this->module,
            'getStatus'        => $getStatus,
            'meta_title'       => "Create | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function store(Request $request)
    {
        $action = $request->submitBtn;

        if ($request->isMethod('post')) {
            Log::info('Request data:', $request->all());

            $request->validate([
                'title'        => 'required|string|max:255',
                'friendly_url' => 'required|string|unique:faq_categories,friendly_url|max:255',
                'meta_title'   => 'nullable|string|max:255',
                'image'        => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
                'status'       => 'required|string',
                'ordering'     => 'nullable|integer',
            ]);

            $uploadImage = imageHandling($request, null, 'image', $this->module);

            $dataToStore = [
                'title'            => $request->title,
                'friendly_url'     => Str::slug($request->friendly_url ?: $request->title),
                'description'      => $request->description,
                'status'           => $request->status ?? 'Active',
                'ordering'         => $request->ordering ?? 0,
                'meta_title'       => $request->meta_title ?: $request->title,
                'meta_keywords'    => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'created_by'       => currentUserId(),
                'image'            => $uploadImage,
            ];

            try {
                $dbdata = ($this->table)::create($dataToStore);
            } catch (\Exception $e) {
                Log::error('Failed to create: ' . $e->getMessage());
                return back()->withInput()->with('error', 'Failed to create: ' . $e->getMessage());
            }

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' created successfully.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $dbdata->id)->with('success', $this->notify_title . ' created successfully.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' created successfully.');
            }
        }

        return back()->with('error', 'Invalid request method.');
    }

    public function duplicate($id)
    {
        $source = ($this->table)::withTrashed()->findOrFail($id);

        $baseUrl = $source->friendly_url ?: Str::slug($source->title);
        $candidateUrl = '';
        for ($i = 0; $i < 50; $i++) {
            $candidateUrl = $baseUrl . '-copy-' . Str::lower(Str::random(6));
            if (!($this->table)::where('friendly_url', $candidateUrl)->exists()) {
                break;
            }
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

        $dbdata = ($this->table)::create([
            'title'            => $source->title . ' (Copy)',
            'friendly_url'     => $candidateUrl,
            'image'            => $newImage,
            'description'      => $source->description,
            'ordering'         => $source->ordering,
            'status'           => $source->status,
            'meta_title'       => $source->meta_title,
            'meta_keywords'    => $source->meta_keywords,
            'meta_description' => $source->meta_description,
            'created_by'       => currentUserId(),
        ]);

        return redirect()
            ->route($this->module . '.edit', $dbdata->id)
            ->with('success', $this->notify_title . ' duplicated. Adjust title or URL if needed.');
    }

    public function editForm($id, Request $request)
    {
        $dbdata = ($this->table)::findOrFail($id);

        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? $this->module;
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        $getStatus = getEnumValues($this->db, 'status');

        return view('backend.' . $this->module . '.edit', [
            'data'             => $dbdata,
            'title'            => $moduleTitle,
            'module'           => $this->module,
            'getStatus'        => $getStatus,
            'meta_title'       => "Edit | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;

        $request->validate([
            'title'        => 'required|string|max:255',
            'friendly_url' => 'required|string|max:255|unique:faq_categories,friendly_url,' . $id,
            'meta_title'   => 'nullable|string|max:255',
            'image'        => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'status'       => 'required|string',
            'ordering'     => 'nullable|integer',
        ]);

        try {
            $dbdata = ($this->table)::findOrFail($id);

            $dataToUpdate = [
                'title'            => $request->title,
                'friendly_url'     => Str::slug($request->friendly_url ?: $request->title),
                'description'      => $request->description,
                'status'           => $request->status,
                'ordering'         => $request->ordering ?? 0,
                'meta_title'       => $request->meta_title ?: $request->title,
                'meta_keywords'    => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ];

            $dataToUpdate['image'] = imageHandling($request, $dbdata, 'image', $this->module);

            $dbdata->update($dataToUpdate);

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' Updated! Ready to add another.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $dbdata->id)->with('success', $this->notify_title . ' Updated!');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' Updated successfully.');
            }
        } catch (\Exception $e) {
            Log::error('Update failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating: ' . $e->getMessage());
        }
    }

    public function deleteAll(Request $request)
    {
        $selectedIds = $request->ids;
        $trashed = $request->trashed;

        if (is_array($selectedIds) && count($selectedIds)) {
            if ($trashed === 'trashed') {
                ($this->table)::withTrashed()->whereIn('id', $selectedIds)->forceDelete();
                return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . '(s) permanently deleted!');
            }

            ($this->table)::whereIn('id', $selectedIds)->delete();
            return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . '(s) deleted successfully.');
        }

        return redirect()->route($this->module)->with('error', 'No ' . $this->notify_title . ' selected.');
    }

    public function updateStatusAjax(Request $request, $id)
    {
        $dbdata = ($this->table)::findOrFail($id);

        $newStatus = $request->status === 'Active' ? 'Inactive' : 'Active';
        $dbdata->status = $newStatus;
        $dbdata->save();

        return response()->json([
            'success' => true,
            'status'  => $newStatus,
            'message' => $this->notify_title . " Status Updated to {$newStatus}",
        ]);
    }

    public function deleteAjax($id)
    {
        try {
            $dbdata = ($this->table)::findOrFail($id);
            $dbdata->delete();

            return response()->json([
                'success' => true,
                'message' => $this->notify_title . ' Deleted Successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $this->notify_title . ' Failed to Delete: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function modalView($id)
    {
        $dbdata = ($this->table)::with(['creator'])->findOrFail($id);

        return response()->json([
            'id'              => $dbdata->id,
            'title'           => $dbdata->title,
            'friendly_url'    => $dbdata->friendly_url,
            'description'     => $dbdata->description,
            'status'          => $dbdata->status,
            'ordering'        => $dbdata->ordering,
            'image'           => $dbdata->image ?? null,
            'meta_title'      => $dbdata->meta_title,
            'meta_keywords'   => $dbdata->meta_keywords,
            'meta_description'=> $dbdata->meta_description,
            'created_at'      => $dbdata->created_at ? $dbdata->created_at->format('M d, Y') : null,
            'created_by_name' => trim(($dbdata->creator->first_name ?? '') . ' ' . ($dbdata->creator->last_name ?? '')),
        ]);
    }

    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $trashed = collect($segments)->last();
        $moduleTitle = Str::singular($trashed);

        $getData = ($this->table)::onlyTrashed()->latest()->get();

        $columns = [
            'image',
            'title',
            'status',
            'ordering',
            'created_by',
        ];

        $hiddenColumns = [
            'ordering',
            'created_by',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $this->module,
            'moduleName'       => $trashed,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => "Trashed List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function restore($id)
    {
        $restore = ($this->table)::withTrashed()->findOrFail($id);
        $restore->restore();

        return redirect()->route($this->module)->with('success', $this->notify_title . ' Restored Successfully!');
    }

    public function forceDelete($id)
    {
        $forcedelete = ($this->table)::withTrashed()->findOrFail($id);
        $forcedelete->forceDelete();

        return redirect()->route($this->module)->with('success', $this->notify_title . ' Permanently Deleted!');
    }
}
