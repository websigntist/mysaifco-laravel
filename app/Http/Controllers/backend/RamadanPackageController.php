<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\RamadanPackage;
use App\Models\backend\TourType;
use App\Models\backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RamadanPackageController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId();
        $this->table = RamadanPackage::class;
        $this->module = 'ramadan-packages';
        $this->notify_title = 'Ramadan Package';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        $getData = ($this->table)::with('tourType')->orderBy('ordering', 'asc')->orderByDesc('id')->get();
        $columns = [
            'month',
            'departure_day',
            'arrival_day',
            'tour_type',
            'status',
            'ordering',
            'created_by',
        ];

        $hiddenColumns = [
            'created_by',
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

        $getStatus = getEnumValues('ramadan_packages', 'status');

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
            Log::info('RamadanPackage Request data:', $request->all());

            $validated = $request->validate([
                'month'           => 'required|string|max:255',
                'departure_day'   => 'nullable|string|max:255',
                'departure_dates' => 'nullable|string',
                'arrival_day'     => 'nullable|string|max:255',
                'arrival_dates'   => 'nullable|string',
                'tour_type_id'     => 'nullable|integer',
                'status'           => 'required|in:Active,Inactive',
                'ordering'         => 'nullable|integer',
            ]);

            $validated['created_by'] = $this->userId;

            $inserted = ($this->table)::create($validated);

            $id = $inserted->id;
            add_user_activity('Added new Ramadan Package');

            notify_toastr('success', 'Ramadan Package created successfully.', 'Success');

            if ($action === 'save_stay') {
                return redirect()->route($this->module . '.edit', $id)->with('success', 'Ramadan Package created successfully.');
            }
            if ($action === 'save_new') {
                return redirect()->route($this->module . '.create')->with('success', 'Ramadan Package created successfully.');
            }

            return redirect()->route($this->module)->with('success', 'Ramadan Package created successfully.');
        }

        return redirect()->route($this->module);
    }

    public function editForm(Request $request, $id)
    {
        $data = ($this->table)::findOrFail($id);
        $getStatus = getEnumValues('ramadan_packages', 'status');

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
            'month'           => 'required|string|max:255',
            'departure_day'   => 'nullable|string|max:255',
            'departure_dates' => 'nullable|string',
            'arrival_day'     => 'nullable|string|max:255',
            'arrival_dates'   => 'nullable|string',
            'tour_type_id'     => 'nullable|integer',
            'status'           => 'required|in:Active,Inactive',
            'ordering'         => 'nullable|integer',
        ]);

        $record->update($validated);
        add_user_activity('Updated Ramadan Package: ' . $record->month);

        notify_toastr('success', 'Ramadan Package updated successfully.', 'Success');

        if ($action === 'save_stay') {
            return redirect()->route($this->module . '.edit', $id)->with('success', 'Ramadan Package updated successfully.');
        }
        if ($action === 'save_new') {
            return redirect()->route($this->module . '.create')->with('success', 'Ramadan Package updated successfully.');
        }

        return redirect()->route($this->module)->with('success', 'Ramadan Package updated successfully.');
    }

    public function duplicate($id)
    {
        $existing = ($this->table)::findOrFail($id);

        $duplicate = $existing->replicate();
        $duplicate->month = $duplicate->month . ' (Copy)';
        $duplicate->created_by = $this->userId;
        $duplicate->save();

        add_user_activity('Duplicated Ramadan Package ID: ' . $id);
        notify_toastr('success', 'Ramadan Package duplicated successfully.', 'Success');

        return redirect()->route($this->module . '.edit', $duplicate->id)->with('success', 'Ramadan Package duplicated successfully.');
    }

    public function deleteAjax($id)
    {
        try {
            $record = ($this->table)::findOrFail($id);
            $record->delete();

            add_user_activity('Deleted Ramadan Package: ' . $record->month);

            return response()->json([
                'success' => true,
                'message' => 'Ramadan Package moved to trash successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting Ramadan Package.',
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

                add_user_activity('Updated Ramadan Package status to ' . $status . ' for: ' . $record->month);

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
            add_user_activity('Bulk deleted Ramadan Packages');
            notify_toastr('success', 'Selected packages moved to trash.', 'Success');
        } else {
            notify_toastr('error', 'No packages selected.', 'Error');
        }

        return redirect()->route($this->module)->with('success', 'Selected packages moved to trash.');
    }

    public function trashed()
    {
        $getData = ($this->table)::onlyTrashed()->with('tourType')->get();

        return view('backend.' . $this->module . '.listing', [
            'title'            => 'Trashed Ramadan Packages',
            'module'           => $this->module,
            'moduleName'       => $this->module,
            'getData'          => $getData,
            'columns'          => ['month', 'departure_day', 'deleted_at'],
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

        add_user_activity('Restored Ramadan Package: ' . $record->month);
        notify_toastr('success', 'Ramadan Package restored successfully.', 'Success');

        return redirect()->route($this->module . '.trashed')->with('success', 'Ramadan Package restored successfully.');
    }

    public function forceDelete($id)
    {
        $record = ($this->table)::onlyTrashed()->findOrFail($id);
        $record->forceDelete();

        add_user_activity('Permanently deleted Ramadan Package: ' . $record->month);
        notify_toastr('success', 'Ramadan Package permanently deleted.', 'Success');

        return redirect()->route($this->module . '.trashed')->with('success', 'Ramadan Package permanently deleted.');
    }

    public function modalView($id)
    {
        $data = ($this->table)::with('tourType')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);
    }
}
