<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\TourType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TourTypeController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId();
        $this->table = TourType::class;
        $this->module = 'tour-types';
        $this->notify_title = 'Tour Type';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        $getData = ($this->table)::orderBy('ordering')->orderByDesc('id')->get();
        $columns = [
            'image',
            'title',
            'status',
            'ordering',
            'created_at',
            'created_by',
        ];

        $hiddenColumns = [
            'created_by',
            'title',
            'ordering',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => 'Listing | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function create(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        $getStatus = getEnumValues('tour_types', 'status');

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
            'meta_title'       => 'Create | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function store(Request $request)
    {
        $action = $request->submitBtn;

        if ($request->isMethod('post')) {
            $request->validate([
                'title'         => 'required|string|max:255',
                'friendly_url'  => 'nullable|string|max:191|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/|unique:tour_types,friendly_url',
                'status'        => 'required|string',
            ]);

            $uploadImage = imageHandling($request, null, 'image', $this->module);

            $dataToStore = [
                'title'             => $request->title,
                'friendly_url'      => $this->resolveFriendlyUrl($request->friendly_url, $request->title),
                'short_description' => $request->short_description,
                'description'       => $request->description,
                'status'            => $request->status,
                'view_all_link'     => $request->view_all_link,
                'ordering'          => $request->ordering ?? 0,
                'meta_title'        => $request->meta_title,
                'meta_keywords'     => $request->meta_keywords,
                'meta_description'  => $request->meta_description,
                'image_alt'         => $request->image_alt,
                'image_title'       => $request->image_title,
                'created_by'        => currentUserId(),
                'image'             => $uploadImage,
            ];

            $dbdata = ($this->table)::create($dataToStore);
            if (!$dbdata) {
                Log::error('Failed to create tour type', $dataToStore);
                return back()->with('error', 'Failed to create.');
            }

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' Created Successfully.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $dbdata->id)->with('success', $this->notify_title . ' Created Successfully.');
            }

            return redirect()->route($this->module)->with('success', $this->notify_title . ' Created Successfully.');
        }

        return back()->with('error', 'Invalid request method.');
    }

    public function duplicate($id)
    {
        $source = ($this->table)::withTrashed()->findOrFail($id);

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

        $copyTitle = $source->title . ' (Copy)';

        $dbdata = ($this->table)::create([
            'title'             => $copyTitle,
            'friendly_url'      => $this->resolveFriendlyUrl(null, $copyTitle, $source->id),
            'short_description' => $source->short_description,
            'description'       => $source->description,
            'status'            => $source->status,
            'view_all_link'     => $source->view_all_link,
            'ordering'          => $source->ordering,
            'meta_title'        => $source->meta_title,
            'meta_keywords'     => $source->meta_keywords,
            'meta_description'  => $source->meta_description,
            'image_alt'         => $source->image_alt,
            'image_title'       => $source->image_title,
            'created_by'        => currentUserId(),
            'image'             => $newImage,
        ]);

        return redirect()
            ->route($this->module . '.edit', $dbdata->id)
            ->with('success', $this->notify_title . ' duplicated. Update title or content if needed.');
    }

    public function editForm($id, Request $request)
    {
        $dbdata = ($this->table)::findOrFail($id);

        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        $getStatus = getEnumValues('tour_types', 'status');

        return view('backend.' . $this->module . '.edit', [
            'data'             => $dbdata,
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
            'meta_title'       => 'Edit | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;

        $request->validate([
            'title'         => 'required|string|max:255',
            'friendly_url'  => 'nullable|string|max:191|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/|unique:tour_types,friendly_url,' . $id,
            'status'        => 'required|string',
        ]);

        try {
            $dbdata = ($this->table)::findOrFail($id);

            $dataToUpdate = [
                'title'             => $request->title,
                'friendly_url'      => $this->resolveFriendlyUrl($request->friendly_url, $request->title, $id),
                'short_description' => $request->short_description,
                'description'       => $request->description,
                'status'            => $request->status,
                'view_all_link'     => $request->view_all_link,
                'ordering'          => $request->ordering ?? 0,
                'meta_title'        => $request->meta_title,
                'meta_keywords'     => $request->meta_keywords,
                'meta_description'  => $request->meta_description,
                'image_alt'         => $request->image_alt,
                'image_title'       => $request->image_title,
                'created_by'        => currentUserId(),
                'image'             => imageHandling($request, $dbdata, 'image', $this->module),
            ];

            $dbdata->update($dataToUpdate);

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' Updated! Ready to add another.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $dbdata->id)->with('success', $this->notify_title . ' Updated! You can continue editing.');
            }

            return redirect()->route($this->module)->with('success', $this->notify_title . ' Successfully updated.');
        } catch (\Exception $e) {
            Log::error('Tour type update failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating the ' . $this->notify_title . ': ' . $e->getMessage());
        }
    }

    public function deleteAll(Request $request)
    {
        $selectedIds = $request->ids;
        $trashed = $request->trashed;

        if (is_array($selectedIds) && count($selectedIds)) {
            if ($trashed === 'trashed') {
                ($this->table)::withTrashed()->whereIn('id', $request->ids)->forceDelete();
                return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . ' permanently deleted!');
            }

            ($this->table)::whereIn('id', $selectedIds)->delete();
            return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . ' deleted successfully.');
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
            'id'                => $dbdata->id,
            'title'             => $dbdata->title,
            'short_description' => $dbdata->short_description,
            'description'       => $dbdata->description,
            'status'            => $dbdata->status,
            'view_all_link'     => $dbdata->view_all_link,
            'ordering'          => $dbdata->ordering,
            'meta_title'        => $dbdata->meta_title,
            'meta_keywords'     => $dbdata->meta_keywords,
            'meta_description'  => $dbdata->meta_description,
            'image'             => $dbdata->image ?? null,
            'image_alt'         => $dbdata->image_alt,
            'image_title'       => $dbdata->image_title,
            'created_at'        => $dbdata->created_at ? $dbdata->created_at->format('M d, Y') : null,
            'created_by_name'   => trim(($dbdata->creator->first_name ?? '') . ' ' . ($dbdata->creator->last_name ?? '')),
        ]);
    }

    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $trashed = collect($segments)->last();
        $moduleTitle = Str::singular(str_replace('-', ' ', $trashed));
        $moduleName = $segments[count($segments) - 2] ?? null;

        $getData = ($this->table)::onlyTrashed()->latest()->get();

        $columns = [
            'image',
            'title',
            'status',
            'ordering',
            'created_at',
            'created_by',
        ];

        $hiddenColumns = [
            'created_by',
            'title',
            'ordering',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $trashed,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => 'Trashed List | Admin Panel',
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

    protected function resolveFriendlyUrl(?string $friendlyUrl, string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug(trim((string) ($friendlyUrl ?: $title)));

        if ($slug === '') {
            $slug = 'tour-type';
        }

        $unique = $slug;
        $n = 1;

        while (
            TourType::query()
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->where('friendly_url', $unique)
                ->exists()
        ) {
            $unique = $slug . '-' . $n++;
        }

        return $unique;
    }
}
