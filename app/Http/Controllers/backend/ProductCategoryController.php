<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductCategoryController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $db;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId();
        $this->table = ProductCategory::class;
        $this->module = 'product-category';
        $this->db = 'product_categories';
        $this->notify_title = 'Product Category';
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
            'created_at',
        ];

        $hiddenColumns = [
            'created_by',
            'title',
            'ordering',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleName,
            'module'           => $moduleName,
            '_module'          => $_moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => 'Product categories | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function create(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = Str::singular($moduleName);
        $categories = Str::plural($moduleName);

        $productCategories = ($this->table)::orderBy('title')->get(['id', 'title', 'parent_id']);

        $getStatus = getEnumValues($this->db, 'status');
        $getShowinmenu = getEnumValues($this->db, 'show_in_menu');

        return view('backend.' . $this->module . '.form', [
            'title'               => $moduleTitle,
            'module'              => $moduleName,
            '_module'             => $categories,
            'getStatus'           => $getStatus,
            'getShowinmenu'       => $getShowinmenu,
            'productCategories'   => $productCategories,
            'meta_title'          => 'Create product category | Admin Panel',
            'meta_keywords'       => '',
            'meta_description'    => '',
        ]);
    }

    public function store(Request $request)
    {
        $action = $request->submitBtn;

        if (! $request->isMethod('post')) {
            return back()->with('error', 'Invalid request method.');
        }

        Log::info('Product category store:', $request->all());

        $request->validate([
            'title'        => 'required|string|max:255',
            'friendly_url' => 'required|string|max:255|unique:product_categories,friendly_url',
            'meta_title'   => 'required|string|max:255',
            'parent_id'    => 'nullable|integer|min:0',
            'status'       => 'required|in:Active,Inactive',
            'show_in_menu' => 'nullable|in:Yes,No',
        ]);

        $uploadImage = imageHandling($request, null, 'image', $this->module);

        $dataToStore = [
            'title'            => $request->title,
            'friendly_url'     => $request->friendly_url,
            'description'      => $request->description,
            'parent_id'        => (int) ($request->parent_id ?? 0),
            'status'           => $request->status,
            'ordering'         => $request->ordering ?? 0,
            'meta_title'       => $request->meta_title,
            'meta_keywords'    => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'created_by'       => currentUserId(),
            'image'            => $uploadImage,
            'show_title'       => $request->has('show_title') ? '1' : '0',
            'show_in_menu'     => $request->show_in_menu ?? 'Yes',
        ];

        $row = ($this->table)::create($dataToStore);

        if (! $row) {
            Log::error('Failed to create product category', $dataToStore);

            return back()->with('error', 'Failed to create.');
        }

        if ($action === 'save_new') {
            return to_route($this->module . '.create')->with('success', $this->notify_title . ' created successfully.');
        }
        if ($action === 'save_stay') {
            return to_route($this->module . '.edit', $row->id)->with('success', $this->notify_title . ' created successfully.');
        }

        return redirect()->route('product-categories')->with('success', $this->notify_title . ' created successfully.');
    }

    public function editForm(Request $request, $id)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular($moduleName);
        $_categories = Str::plural($moduleName);

        $data = ($this->table)::findOrFail($id);

        $categories = ($this->table)::where('id', '!=', $id)->orderBy('title')->get();

        $getStatus = getEnumValues($this->db, 'status');
        $getShowinmenu = getEnumValues($this->db, 'show_in_menu');

        return view('backend.' . $this->module . '.edit', [
            'data'          => $data,
            'title'         => $moduleTitle,
            'module'        => $moduleName,
            'categories'    => $categories,
            'getStatus'     => $getStatus,
            'getShowinmenu' => $getShowinmenu,
            '_categories'   => $_categories,
            'meta_title'    => 'Edit product category | Admin Panel',
            'meta_keywords' => '',
            'meta_description' => '',
        ]);
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;

        $request->validate([
            'title'        => 'required|string|max:255',
            'friendly_url' => 'required|string|max:255|unique:product_categories,friendly_url,' . $id,
            'meta_title'   => 'required|string|max:255',
            'parent_id'    => 'nullable|integer|min:0',
            'status'       => 'required|in:Active,Inactive',
            'show_in_menu' => 'nullable|in:Yes,No',
        ]);

        try {
            $row = ($this->table)::findOrFail($id);

            $parentId = (int) ($request->parent_id ?? 0);
            if ($parentId === (int) $row->id) {
                $parentId = 0;
            }

            $dataToUpdate = [
                'title'            => $request->title,
                'friendly_url'     => $request->friendly_url,
                'description'      => $request->description,
                'parent_id'        => $parentId,
                'status'           => $request->status,
                'show_title'       => $request->has('show_title') ? '1' : '0',
                'show_in_menu'     => $request->show_in_menu ?? $row->show_in_menu,
                'ordering'         => $request->ordering ?? 0,
                'meta_title'       => $request->meta_title,
                'meta_keywords'    => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'created_by'       => currentUserId(),
            ];

            $dataToUpdate['image'] = imageHandling($request, $row, 'image', $this->module);

            $row->update($dataToUpdate);

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' updated successfully.');
            }
            if ($action === 'save_stay') {
                return to_route($this->module . '.edit', $row->id)->with('success', $this->notify_title . ' updated successfully.');
            }

            return redirect()->route('product-categories')->with('success', $this->notify_title . ' updated successfully.');
        } catch (\Exception $e) {
            Log::error('Product category update failed: ' . $e->getMessage());

            return back()->with('error', 'An error occurred while updating: ' . $e->getMessage());
        }
    }

    public function updateStatusAjax(Request $request, $id)
    {
        $row = ($this->table)::findOrFail($id);

        $newStatus = $request->status === 'Active' ? 'Inactive' : 'Active';
        $row->status = $newStatus;
        $row->save();

        return response()->json([
            'success' => true,
            'status'  => $newStatus,
            'message' => $this->notify_title . " status updated to {$newStatus}",
        ]);
    }

    public function updateOrderingAjax(Request $request)
    {
        $request->validate([
            'id'       => 'required|integer|exists:product_categories,id',
            'ordering' => 'required|integer|min:0',
        ]);

        $row = ($this->table)::findOrFail($request->id);
        $row->ordering = $request->ordering;
        $row->save();

        return response()->json([
            'success'  => true,
            'message'  => $this->notify_title . ' ordering updated successfully',
            'id'       => $row->id,
            'ordering' => $row->ordering,
        ]);
    }

    public function deleteAjax($id)
    {
        try {
            $row = ($this->table)::findOrFail($id);
            $row->delete();

            return response()->json([
                'success' => true,
                'message' => $this->notify_title . ' deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $this->notify_title . ' failed to delete: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function modalView($id)
    {
        $row = ($this->table)::with(['parentCategory', 'creator'])->findOrFail($id);

        $creator = $row->creator;

        return response()->json([
            'id'                => $row->id,
            'title'             => $row->title,
            'parent_id'         => $row->parent_id,
            'parent_page_title' => $row->parentCategory->title ?? '/Parent',
            'friendly_url'      => $row->friendly_url,
            'description'       => $row->description,
            'ordering'          => $row->ordering,
            'show_in_menu'      => $row->show_in_menu,
            'status'            => $row->status,
            'image'             => $row->image ?? null,
            'created_at'        => $row->created_at ? $row->created_at->format('M d, Y') : null,
            'created_by_name'   => $creator ? trim(($creator->first_name ?? '') . ' ' . ($creator->last_name ?? '')) : '-',
        ]);
    }

    public function deleteAll(Request $request)
    {
        $selectedIds = $request->ids;
        $trashed = $request->trashed;

        if (is_array($selectedIds) && count($selectedIds)) {
            if ($trashed === 'trashed') {
                ($this->table)::withTrashed()->whereIn('id', $request->ids)->forceDelete();

                return redirect()->route('product-categories')->with('success', 'Selected ' . $this->notify_title . 's permanently deleted!');
            }

            ($this->table)::whereIn('id', $selectedIds)->delete();

            return redirect()->route('product-categories')->with('success', 'Selected ' . $this->notify_title . 's deleted successfully.');
        }

        return redirect()->route('product-categories')->with('error', $this->notify_title . ' not selected.');
    }

    public function export()
    {
        $fileName = 'product_categories_export_' . now()->format('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
            'Cache-Control'       => 'no-cache, no-store, must-revalidate',
            'Pragma'              => 'no-cache',
            'Expires'             => '0',
        ];

        $columns = [
            'ID',
            'Title',
            'Friendly URL',
            'Parent ID',
            'Description',
            'Status',
            'Ordering',
            'Show In Menu',
            'Meta Title',
            'Meta Keywords',
            'Meta Description',
            'Created By',
            'Created At',
            'Updated At',
        ];

        $tableClass = $this->table;

        $callback = function () use ($columns, $tableClass) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $columns);

            $tableClass::with(['creator'])->orderBy('id')->chunk(200, function ($rows) use ($handle) {
                foreach ($rows as $row) {
                    fputcsv($handle, [
                        $row->id,
                        $row->title,
                        $row->friendly_url,
                        $row->parent_id,
                        str_replace(["\r", "\n"], ' ', strip_tags((string) $row->description)),
                        $row->status,
                        $row->ordering,
                        $row->show_in_menu,
                        $row->meta_title,
                        $row->meta_keywords,
                        $row->meta_description,
                        $row->creator ? $row->creator->first_name . ' ' . $row->creator->last_name : 'N/A',
                        $row->created_at ? $row->created_at->format('Y-m-d H:i:s') : '',
                        $row->updated_at ? $row->updated_at->format('Y-m-d H:i:s') : '',
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
            'meta_title'       => 'Import product categories | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048',
        ]);

        if (($handle = fopen($request->file('csv_file')->getRealPath(), 'r')) !== false) {
            $header = fgetcsv($handle, 1000, ',');

            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                if (count($row) !== count($header)) {
                    continue;
                }
                $data = @array_combine($header, $row);
                if (! is_array($data) || empty($data['friendly_url'])) {
                    continue;
                }

                ($this->table)::updateOrCreate(
                    ['friendly_url' => $data['friendly_url']],
                    [
                        'title'            => $data['title'] ?? '',
                        'parent_id'        => isset($data['parent_id']) ? (int) $data['parent_id'] : 0,
                        'description'      => $data['description'] ?? '',
                        'status'           => $data['status'] ?? 'Active',
                        'ordering'         => isset($data['ordering']) ? (int) $data['ordering'] : 0,
                        'show_in_menu'     => $data['show_in_menu'] ?? 'Yes',
                        'meta_title'       => $data['meta_title'] ?? ($data['title'] ?? ''),
                        'meta_keywords'    => $data['meta_keywords'] ?? null,
                        'meta_description' => $data['meta_description'] ?? null,
                        'created_by'       => auth()->id(),
                        'show_title'       => '0',
                    ]
                );
            }

            fclose($handle);
        }

        return redirect()->route('product-categories')->with('success', $this->notify_title . 's imported successfully.');
    }

    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $_moduleName = collect($segments)->last();
        $moduleName = $segments[count($segments) - 2] ?? $this->module;

        $getData = ($this->table)::with('parentCategory')->onlyTrashed()->latest()->get();

        $columns = [
            'image',
            'title',
            'parent_id',
            'status',
            'ordering',
            'created_by',
            'created_at',
        ];

        $hiddenColumns = [
            'created_by',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleName,
            'module'           => $moduleName,
            '_module'          => $_moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => 'Trashed product categories | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function restore($id)
    {
        $row = ($this->table)::withTrashed()->findOrFail($id);
        $row->restore();

        return redirect()->route('product-categories')->with('success', $this->notify_title . ' restored successfully!');
    }

    public function forceDelete($id)
    {
        $row = ($this->table)::withTrashed()->findOrFail($id);
        $row->forceDelete();

        return redirect()->route('product-categories')->with('success', $this->notify_title . ' permanently deleted!');
    }

    private function uniqueProductCategoryFriendlyUrl(string $base): string
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
