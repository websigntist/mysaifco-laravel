<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\UmrahAirPackage;
use App\Models\backend\TourType;
use App\Models\backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UmrahAirPackageController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId();
        $this->table = UmrahAirPackage::class;
        $this->module = 'umrah-air-packages';
        $this->notify_title = 'Umrah Air Package';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        $getData = ($this->table)::with('tourType')->orderBy('ordering', 'asc')->orderByDesc('id')->get();
        $columns = [
            'image',
            'title',
            'price',
            'min_people',
            'tour_type',
            'status',
            'created_by',
        ];

        $hiddenColumns = [
            'created_by',
            'makkah_hotel',
            'madinah_hotel',
            'ordering',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'tourTypeMap'      => TourType::pluck('title', 'id'),
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

        $getStatus = getEnumValues('umrah_air_packages', 'status');

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
            'tourTypes'        => TourType::activeList(),
            'meta_title'       => 'Create | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function store(Request $request)
    {
        $action = $request->submitBtn;

        if ($request->isMethod('post')) {
            Log::info('UmrahAirPackage Request data:', $request->all());

            $validated = $request->validate([
                'title'                => 'required|string|max:255',
                'tour_type_id'         => 'nullable|integer',
                'tour_type'            => 'nullable|string|max:255',
                'price'                => 'nullable|string|max:255',
                'currency'             => 'nullable|string|max:50',
                'min_people'           => 'nullable|string|max:255',

                'image'                => 'nullable|image|mimes:webp,jpeg,png,jpg,svg|max:2048',
                'image_alt'            => 'nullable|string|max:255',
                'image_title'          => 'nullable|string|max:255',

                'makkah_nights_title'  => 'nullable|string|max:255',
                'makkah_hotel'         => 'nullable|string|max:255',
                'makkah_rating'        => 'nullable|string|max:255',
                'makkah_reviews'       => 'nullable|string|max:255',
                'makkah_image'         => 'nullable|image|mimes:webp,jpeg,png,jpg,svg|max:2048',

                'madinah_nights_title' => 'nullable|string|max:255',
                'madinah_hotel'        => 'nullable|string|max:255',
                'madinah_rating'       => 'nullable|string|max:255',
                'madinah_reviews'      => 'nullable|string|max:255',
                'madinah_image'        => 'nullable|image|mimes:webp,jpeg,png,jpg,svg|max:2048',

                'status'               => 'required|in:Active,Inactive',
                'ordering'             => 'nullable|integer',
            ]);

            $validated['image'] = imageHandling($request, null, 'image', $this->module);
            $validated['makkah_image'] = imageHandling($request, null, 'makkah_image', $this->module);
            $validated['madinah_image'] = imageHandling($request, null, 'madinah_image', $this->module);

            if ($request->filled('tour_type_id') && empty($validated['tour_type'])) {
                $tt = TourType::find($request->tour_type_id);
                if ($tt) {
                    $validated['tour_type'] = $tt->title;
                }
            }

            $validated['created_by'] = $this->userId;

            $inserted = ($this->table)::create($validated);

            $id = $inserted->id;
            add_user_activity('Added new Umrah Air Package');

            notify_toastr('success', 'Umrah Air Package created successfully.', 'Success');

            if ($action === 'save_stay') {
                return redirect()->route($this->module . '.edit', $id)->with('success', 'Umrah Air Package created successfully.');
            }
            if ($action === 'save_new') {
                return redirect()->route($this->module . '.create')->with('success', 'Umrah Air Package created successfully.');
            }

            return redirect()->route($this->module)->with('success', 'Umrah Air Package created successfully.');
        }

        return redirect()->route($this->module);
    }

    public function editForm(Request $request, $id)
    {
        $data = ($this->table)::findOrFail($id);
        $getStatus = getEnumValues('umrah_air_packages', 'status');

        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        return view('backend.' . $this->module . '.edit', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'data'             => $data,
            'getStatus'        => $getStatus,
            'tourTypes'        => TourType::activeList(),
            'meta_title'       => 'Edit | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;
        $record = ($this->table)::findOrFail($id);

        $validated = $request->validate([
            'title'                => 'required|string|max:255',
            'tour_type_id'         => 'nullable|integer',
            'tour_type'            => 'nullable|string|max:255',
            'price'                => 'nullable|string|max:255',
            'currency'             => 'nullable|string|max:50',
            'min_people'           => 'nullable|string|max:255',

            'image'                => 'nullable|image|mimes:webp,jpeg,png,jpg,svg|max:2048',
            'image_alt'            => 'nullable|string|max:255',
            'image_title'          => 'nullable|string|max:255',

            'makkah_nights_title'  => 'nullable|string|max:255',
            'makkah_hotel'         => 'nullable|string|max:255',
            'makkah_rating'        => 'nullable|string|max:255',
            'makkah_reviews'       => 'nullable|string|max:255',
            'makkah_image'         => 'nullable|image|mimes:webp,jpeg,png,jpg,svg|max:2048',

            'madinah_nights_title' => 'nullable|string|max:255',
            'madinah_hotel'        => 'nullable|string|max:255',
            'madinah_rating'       => 'nullable|string|max:255',
            'madinah_reviews'      => 'nullable|string|max:255',
            'madinah_image'        => 'nullable|image|mimes:webp,jpeg,png,jpg,svg|max:2048',

            'status'               => 'required|in:Active,Inactive',
            'ordering'             => 'nullable|integer',
        ]);

        $validated['image'] = imageHandling($request, $record, 'image', $this->module);
        $validated['makkah_image'] = imageHandling($request, $record, 'makkah_image', $this->module);
        $validated['madinah_image'] = imageHandling($request, $record, 'madinah_image', $this->module);

        if ($request->filled('tour_type_id')) {
            $tt = TourType::find($request->tour_type_id);
            if ($tt) {
                $validated['tour_type'] = $tt->title;
            }
        }

        $record->update($validated);
        add_user_activity('Updated Umrah Air Package: ' . $record->title);

        notify_toastr('success', 'Umrah Air Package updated successfully.', 'Success');

        if ($action === 'save_stay') {
            return redirect()->route($this->module . '.edit', $id)->with('success', 'Umrah Air Package updated successfully.');
        }
        if ($action === 'save_new') {
            return redirect()->route($this->module . '.create')->with('success', 'Umrah Air Package updated successfully.');
        }

        return redirect()->route($this->module)->with('success', 'Umrah Air Package updated successfully.');
    }

    public function duplicate($id)
    {
        $existing = ($this->table)::findOrFail($id);

        $duplicate = $existing->replicate();
        $duplicate->title = $duplicate->title . ' (Copy)';
        $duplicate->created_by = $this->userId;

        $dir = public_path('assets/images/' . $this->module);

        if (!empty($existing->image) && File::exists($dir . '/' . $existing->image)) {
            $ext = pathinfo($existing->image, PATHINFO_EXTENSION);
            $newImg = uniqid('dup_', true) . ($ext ? '.' . $ext : '');
            File::copy($dir . '/' . $existing->image, $dir . '/' . $newImg);
            $duplicate->image = $newImg;
        }

        if (!empty($existing->makkah_image) && File::exists($dir . '/' . $existing->makkah_image)) {
            $ext = pathinfo($existing->makkah_image, PATHINFO_EXTENSION);
            $newImg = uniqid('dup_mak_', true) . ($ext ? '.' . $ext : '');
            File::copy($dir . '/' . $existing->makkah_image, $dir . '/' . $newImg);
            $duplicate->makkah_image = $newImg;
        }

        if (!empty($existing->madinah_image) && File::exists($dir . '/' . $existing->madinah_image)) {
            $ext = pathinfo($existing->madinah_image, PATHINFO_EXTENSION);
            $newImg = uniqid('dup_mad_', true) . ($ext ? '.' . $ext : '');
            File::copy($dir . '/' . $existing->madinah_image, $dir . '/' . $newImg);
            $duplicate->madinah_image = $newImg;
        }

        $duplicate->save();

        add_user_activity('Duplicated Umrah Air Package ID: ' . $id);
        notify_toastr('success', 'Umrah Air Package duplicated successfully.', 'Success');

        return redirect()->route($this->module . '.edit', $duplicate->id);
    }

    public function deleteAjax($id)
    {
        try {
            $record = ($this->table)::findOrFail($id);
            $record->delete();

            add_user_activity('Deleted Umrah Air Package: ' . $record->title);

            return response()->json([
                'success' => true,
                'message' => 'Umrah Air Package moved to trash successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting Umrah Air Package.',
            ], 500);
        }
    }

    public function updateStatusAjax(Request $request, $id)
    {
        try {
            $record = ($this->table)::findOrFail($id);
            $status = $request->input('status');

            if (in_array($status, ['Active', 'Inactive'])) {
                $record->status = $status;
                $record->save();

                add_user_activity('Updated Umrah Air Package status to ' . $status . ' for: ' . $record->title);

                return response()->json([
                    'success' => true,
                    'message' => 'Status updated successfully.',
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Invalid status value.',
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating status.',
            ], 500);
        }
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->input('ids');
        if (!empty($ids)) {
            ($this->table)::whereIn('id', $ids)->delete();
            add_user_activity('Bulk deleted Umrah Air Packages');
            notify_toastr('success', 'Selected Umrah Air Packages moved to trash.', 'Success');
        } else {
            notify_toastr('error', 'No Umrah Air Packages selected.', 'Error');
        }

        return redirect()->route($this->module);
    }

    public function trashed()
    {
        $getData = ($this->table)::onlyTrashed()->with('tourType')->get();

        return view('backend.' . $this->module . '.listing', [
            'title'            => 'Trashed Umrah Air Packages',
            'module'           => $this->module,
            'moduleName'       => $this->module,
            'getData'          => $getData,
            'columns'          => ['image', 'title', 'price', 'deleted_at'],
            'hiddenColumns'    => [],
            'isTrashed'        => true,
            'meta_title'       => 'Trashed | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function restore($id)
    {
        $record = ($this->table)::onlyTrashed()->findOrFail($id);
        $record->restore();

        add_user_activity('Restored Umrah Air Package: ' . $record->title);
        notify_toastr('success', 'Umrah Air Package restored successfully.', 'Success');

        return redirect()->route($this->module . '.trashed');
    }

    public function forceDelete($id)
    {
        $record = ($this->table)::onlyTrashed()->findOrFail($id);
        $record->forceDelete();

        add_user_activity('Permanently deleted Umrah Air Package: ' . $record->title);
        notify_toastr('success', 'Umrah Air Package permanently deleted.', 'Success');

        return redirect()->route($this->module . '.trashed');
    }

    public function modalView($id)
    {
        $data = ($this->table)::with('tourType')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data'    => $data,
            'image_url' => $data->imageUrl(),
            'makkah_image_url' => $data->makkahImageUrl(),
            'madinah_image_url' => $data->madinahImageUrl(),
        ]);
    }
}
