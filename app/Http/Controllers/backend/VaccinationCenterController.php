<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\VaccinationCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class VaccinationCenterController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId();
        $this->table = VaccinationCenter::class;
        $this->module = 'vaccination-centers';
        $this->notify_title = 'Vaccination Center';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        $getData = ($this->table)::orderBy('ordering', 'asc')->orderByDesc('id')->get();
        $columns = [
            'image',
            'title',
            'center_location',
            'phone',
            'address',
            'status',
            'ordering',
            'created_at',
            'created_by',
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

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $this->module,
            'getStatus'        => getEnumValues('vaccination_centers', 'status'),
            'getLocationOptions' => $this->getLocationOptions(),
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
                'title'           => 'required|string|max:255',
                'center_location' => 'required|string',
                'address'         => 'nullable|string|max:500',
                'phone'           => 'nullable|string|max:100',
                'map_url'         => 'nullable|string|max:500',
                'image'           => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
                'status'          => 'required|string',
                'ordering'        => 'nullable|integer',
            ]);

            $uploadImage = imageHandling($request, null, 'image', $this->module);

            $payload = $this->payloadFromRequest($request);
            $payload['image'] = $uploadImage;

            $dbdata = ($this->table)::create($payload);

            if (!$dbdata) {
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

        $dbdata = ($this->table)::create([
            'title'           => $source->title . ' (Copy)',
            'center_location' => $source->center_location,
            'address'         => $source->address,
            'phone'           => $source->phone,
            'map_url'         => $source->map_url,
            'image'           => $newImage,
            'status'          => $source->status,
            'ordering'        => $source->ordering,
            'created_by'      => currentUserId(),
        ]);

        return redirect()
            ->route($this->module . '.edit', $dbdata->id)
            ->with('success', $this->notify_title . ' duplicated. Update title if needed.');
    }

    public function editForm($id, Request $request)
    {
        $dbdata = ($this->table)::findOrFail($id);

        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        return view('backend.' . $this->module . '.edit', [
            'data'             => $dbdata,
            'title'            => $moduleTitle,
            'module'           => $this->module,
            'getStatus'        => getEnumValues('vaccination_centers', 'status'),
            'getLocationOptions' => $this->getLocationOptions(),
            'meta_title'       => 'Edit | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;

        $request->validate([
            'title'           => 'required|string|max:255',
            'center_location' => 'required|string',
            'address'         => 'nullable|string|max:500',
            'phone'           => 'nullable|string|max:100',
            'map_url'         => 'nullable|string|max:500',
            'image'           => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'status'          => 'required|string',
            'ordering'        => 'nullable|integer',
        ]);

        try {
            $dbdata = ($this->table)::findOrFail($id);

            $uploadImage = imageHandling($request, $dbdata, 'image', $this->module);

            $payload = $this->payloadFromRequest($request);
            $payload['image'] = $uploadImage;

            $dbdata->update($payload);

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' Updated! Ready to add another.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $dbdata->id)->with('success', $this->notify_title . ' Updated! You can continue editing.');
            }

            return redirect()->route($this->module)->with('success', $this->notify_title . ' Successfully updated.');
        } catch (\Exception $e) {
            Log::error('VaccinationCenter update failed: ' . $e->getMessage());

            return back()->with('error', 'An error occurred while updating: ' . $e->getMessage());
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

        $newStatus = $dbdata->status === 'Active' ? 'Inactive' : 'Active';
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
        $dbdata = ($this->table)::with('creator')->findOrFail($id);

        $imageUrl = null;
        if (!empty($dbdata->image)) {
            $imageUrl = asset('assets/images/' . $this->module . '/' . $dbdata->image);
        }

        return response()->json([
            'id'              => $dbdata->id,
            'title'           => $dbdata->title,
            'center_location' => $dbdata->center_location === 'none' ? 'None' : $dbdata->center_location,
            'address'         => $dbdata->address,
            'phone'           => $dbdata->phone,
            'map_url'         => $dbdata->map_url,
            'image'           => $imageUrl,
            'status'          => $dbdata->status,
            'ordering'        => $dbdata->ordering,
            'created_at'      => $dbdata->created_at ? $dbdata->created_at->format('M d, Y') : null,
            'created_by_name' => trim(($dbdata->creator->first_name ?? '') . ' ' . ($dbdata->creator->last_name ?? '')),
        ]);
    }

    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $trashed = collect($segments)->last();
        $moduleTitle = Str::singular(str_replace('-', ' ', $trashed));

        $getData = ($this->table)::onlyTrashed()->latest()->get();

        $columns = [
            'image',
            'title',
            'center_location',
            'phone',
            'address',
            'status',
            'ordering',
            'created_at',
            'created_by',
        ];

        $hiddenColumns = [
            'created_by',
            'ordering',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $this->module,
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

        if (!empty($forcedelete->image)) {
            $imagePath = public_path('assets/images/' . $this->module . '/' . $forcedelete->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $forcedelete->forceDelete();

        return redirect()->route($this->module)->with('success', $this->notify_title . ' Permanently Deleted!');
    }

    private function getLocationOptions(): array
    {
        return [
            'none'             => 'None',
            'Dubai Centers'    => 'Dubai Centers',
            'Sharjah Centers'  => 'Sharjah Centers',
            'Ajman Centers'    => 'Ajman Centers',
        ];
    }

    private function payloadFromRequest(Request $request): array
    {
        return [
            'title'           => $request->title,
            'center_location' => $request->center_location,
            'address'         => $request->address,
            'phone'           => $request->phone,
            'map_url'         => $request->map_url,
            'status'          => $request->status,
            'ordering'        => (int) ($request->ordering ?? 0),
            'created_by'      => currentUserId(),
        ];
    }
}
