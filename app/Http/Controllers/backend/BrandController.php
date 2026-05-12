<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BrandController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId();
        $this->table = Brand::class;
        $this->module = 'brands';
        $this->notify_title = 'Brand';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular($moduleName);

        $getData = ($this->table)::with('creator')->latest()->get();
        $columns = [
            'image',
            'name',
            'friendly_url',
            'description',
            'status',
            'ordering',
            'created_by',
        ];

        $hiddenColumns = [
            'image',
            'ordering',
            'created_by',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => 'Brands | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function create(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = Str::singular($moduleName);

        $getStatus = getEnumValues($this->module, 'status');

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleName,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
            'meta_title'       => 'Create Brand | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function store(Request $request)
    {
        $action = $request->submitBtn;

        $friendlyUrl = $this->normalizeFriendlyUrl($request->friendly_url, $request->name);

        $request->validate([
            'name'         => 'required|string|max:255',
            'friendly_url' => 'nullable|string|max:255',
            'description'  => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'status'       => 'required|in:Active,Inactive',
            'ordering'     => 'nullable|integer|min:0',
        ]);

        $friendlyUrl = $this->ensureUniqueFriendlyUrl($friendlyUrl);

        $uploadImage = imageHandling($request, null, 'image', $this->module);

        $dataToStore = [
            'name'         => $request->name,
            'friendly_url' => $friendlyUrl,
            'description'  => $request->description,
            'status'       => $request->status,
            'ordering'     => $request->ordering ?? 0,
            'created_by'   => currentUserId(),
            'image'        => $uploadImage,
        ];

        $dbdata = ($this->table)::create($dataToStore);
        if (!$dbdata) {
            Log::error('Failed to create brand', $dataToStore);

            return back()->with('error', 'Failed to create.');
        }

        if ($action === 'save_new') {
            return to_route($this->module . '.create')->with('success', $this->notify_title . ' created successfully.');
        }
        if ($action === 'save_stay') {
            return to_route($this->module . '.edit', $dbdata->id)->with('success', $this->notify_title . ' created successfully.');
        }

        return redirect()->route($this->module)->with('success', $this->notify_title . ' created successfully.');
    }

    public function duplicate($id)
    {
        $source = ($this->table)::withTrashed()->findOrFail($id);

        $newImage = null;
        if (! empty($source->image)) {
            $dir = public_path('assets/images/' . $this->module);
            $srcPath = $dir . DIRECTORY_SEPARATOR . $source->image;
            if (File::exists($srcPath)) {
                $ext = pathinfo($source->image, PATHINFO_EXTENSION);
                $newImage = uniqid('dup_', true) . ($ext !== '' ? '.' . $ext : '');
                File::copy($srcPath, $dir . DIRECTORY_SEPARATOR . $newImage);
            }
        }

        $baseSlug = $this->normalizeFriendlyUrl(null, $source->name . '-copy');
        $friendlyUrl = $this->ensureUniqueFriendlyUrl($baseSlug);

        $dbdata = ($this->table)::create([
            'name'         => $source->name . ' (Copy)',
            'friendly_url' => $friendlyUrl,
            'description'  => $source->description,
            'status'       => $source->status,
            'ordering'     => $source->ordering,
            'created_by'   => currentUserId(),
            'image'        => $newImage,
        ]);

        return redirect()
            ->route($this->module . '.edit', $dbdata->id)
            ->with('success', $this->notify_title . ' duplicated. Update name and URL if needed.');
    }

    public function editForm($id, Request $request)
    {
        $dbdata = ($this->table)::findOrFail($id);

        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;

        $getStatus = getEnumValues($this->module, 'status');

        return view('backend.' . $this->module . '.edit', [
            'data'             => $dbdata,
            'title'            => $moduleName,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
            'meta_title'       => 'Edit Brand | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;

        $dbdata = ($this->table)::findOrFail($id);

        $friendlyUrl = $this->normalizeFriendlyUrl($request->friendly_url, $request->name);

        $request->validate([
            'name'         => 'required|string|max:255',
            'friendly_url' => 'nullable|string|max:255',
            'description'  => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'status'       => 'required|in:Active,Inactive',
            'ordering'     => 'nullable|integer|min:0',
        ]);

        $friendlyUrl = $this->ensureUniqueFriendlyUrl($friendlyUrl, $dbdata->id);

        $dataToUpdate = [
            'name'         => $request->name,
            'friendly_url' => $friendlyUrl,
            'description'  => $request->description,
            'status'       => $request->status,
            'ordering'     => $request->ordering ?? 0,
            'created_by'   => currentUserId(),
        ];

        $dataToUpdate['image'] = imageHandling($request, $dbdata, 'image', $this->module);

        $dbdata->update($dataToUpdate);

        if ($action === 'save_new') {
            return to_route($this->module . '.create')->with('success', $this->notify_title . ' updated successfully.');
        }
        if ($action === 'save_stay') {
            return to_route($this->module . '.edit', $dbdata->id)->with('success', $this->notify_title . ' updated successfully.');
        }

        return redirect()->route($this->module)->with('success', $this->notify_title . ' updated successfully.');
    }

    public function deleteAll(Request $request)
    {
        $selectedIds = $request->ids;
        $trashed = $request->trashed;

        if (is_array($selectedIds) && count($selectedIds)) {
            if ($trashed === 'trashed') {
                ($this->table)::withTrashed()->whereIn('id', $request->ids)->forceDelete();

                return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . 's permanently deleted!');
            }

            ($this->table)::whereIn('id', $selectedIds)->delete();

            return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . 's deleted successfully.');
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
            'message' => $this->notify_title . " status updated to {$newStatus}",
        ]);
    }

    public function deleteAjax($id)
    {
        try {
            $dbdata = ($this->table)::findOrFail($id);
            $dbdata->delete();

            return response()->json([
                'success' => true,
                'message' => $this->notify_title . ' deleted successfully.',
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
        $dbdata = ($this->table)::with(['creator'])->findOrFail($id);

        $creator = $dbdata->creator;

        return response()->json([
            'id'              => $dbdata->id,
            'name'            => $dbdata->name,
            'friendly_url'    => $dbdata->friendly_url,
            'description'     => $dbdata->description,
            'status'          => $dbdata->status,
            'ordering'        => $dbdata->ordering,
            'image'           => $dbdata->image ?? null,
            'created_at'      => $dbdata->created_at ? $dbdata->created_at->format('M d, Y') : null,
            'created_by_name' => $creator ? trim(($creator->first_name ?? '') . ' ' . ($creator->last_name ?? '')) : '-',
        ]);
    }

    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $trashed = collect($segments)->last();
        $moduleTitle = Str::singular($trashed);
        $moduleName = $segments[count($segments) - 2] ?? null;

        $getData = ($this->table)::onlyTrashed()->with('creator')->latest()->get();

        $columns = [
            'image',
            'name',
            'friendly_url',
            'description',
            'status',
            'ordering',
            'created_by',
        ];

        $hiddenColumns = [
            'image',
            'ordering',
            'created_by',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $trashed,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => 'Trashed Brands | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
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

    private function normalizeFriendlyUrl(?string $input, string $fallbackName): string
    {
        $raw = trim((string) $input);
        if ($raw === '') {
            $raw = $fallbackName;
        }

        return Str::slug($raw);
    }

    private function ensureUniqueFriendlyUrl(string $slug, ?int $ignoreId = null): string
    {
        $base = $slug !== '' ? $slug : 'brand';
        $candidate = $base;
        $n = 1;

        while (true) {
            $q = ($this->table)::withTrashed()->where('friendly_url', $candidate);
            if ($ignoreId !== null) {
                $q->where('id', '!=', $ignoreId);
            }
            if (! $q->exists()) {
                return $candidate;
            }
            $candidate = $base . '-' . $n;
            $n++;
        }
    }
}
