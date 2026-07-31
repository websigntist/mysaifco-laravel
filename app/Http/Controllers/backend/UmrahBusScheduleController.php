<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\UmrahBusSchedule;
use App\Models\backend\TourType;
use App\Models\backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UmrahBusScheduleController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId();
        $this->table = UmrahBusSchedule::class;
        $this->module = 'umrah-bus-schedules';
        $this->notify_title = 'Umrah Bus Schedule';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        $getData = ($this->table)::with('tourType')->orderBy('ordering', 'asc')->orderByDesc('id')->get();
        $columns = [
            'departure_date',
            'sharing_4_5_beds',
            'sharing_3_beds',
            'sharing_2_beds',
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

        $getStatus = getEnumValues('umrah_bus_schedules', 'status');

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
            Log::info('UmrahBusSchedule Request data:', $request->all());

            $validated = $request->validate([
                'departure_date'   => 'required|string|max:255',
                'sharing_4_5_beds' => 'nullable|string|max:255',
                'sharing_3_beds'   => 'nullable|string|max:255',
                'sharing_2_beds'   => 'nullable|string|max:255',
                'tour_type_id'     => 'nullable|integer',
                'status'           => 'required|in:Active,Inactive',
                'ordering'         => 'nullable|integer',
            ]);

            $validated['created_by'] = $this->userId;

            $inserted = ($this->table)::create($validated);

            $id = $inserted->id;
            add_user_activity('Added new Umrah Bus Schedule');

            notify_toastr('success', 'Umrah Bus Schedule created successfully.', 'Success');

            if ($action === 'save_stay') {
                return redirect()->route($this->module . '.edit', $id)->with('success', 'Umrah Bus Schedule created successfully.');
            }
            if ($action === 'save_new') {
                return redirect()->route($this->module . '.create')->with('success', 'Umrah Bus Schedule created successfully.');
            }

            return redirect()->route($this->module)->with('success', 'Umrah Bus Schedule created successfully.');
        }

        return redirect()->route($this->module);
    }

    public function editForm(Request $request, $id)
    {
        $data = ($this->table)::findOrFail($id);
        $getStatus = getEnumValues('umrah_bus_schedules', 'status');

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
            'departure_date'   => 'required|string|max:255',
            'sharing_4_5_beds' => 'nullable|string|max:255',
            'sharing_3_beds'   => 'nullable|string|max:255',
            'sharing_2_beds'   => 'nullable|string|max:255',
            'tour_type_id'     => 'nullable|integer',
            'status'           => 'required|in:Active,Inactive',
            'ordering'         => 'nullable|integer',
        ]);

        $record->update($validated);
        add_user_activity('Updated Umrah Bus Schedule: ' . $record->departure_date);

        notify_toastr('success', 'Umrah Bus Schedule updated successfully.', 'Success');

        if ($action === 'save_stay') {
            return redirect()->route($this->module . '.edit', $id)->with('success', 'Umrah Bus Schedule updated successfully.');
        }
        if ($action === 'save_new') {
            return redirect()->route($this->module . '.create')->with('success', 'Umrah Bus Schedule updated successfully.');
        }

        return redirect()->route($this->module)->with('success', 'Umrah Bus Schedule updated successfully.');
    }

    public function duplicate($id)
    {
        $existing = ($this->table)::findOrFail($id);

        $duplicate = $existing->replicate();
        $duplicate->departure_date = $duplicate->departure_date . ' (Copy)';
        $duplicate->created_by = $this->userId;
        $duplicate->save();

        add_user_activity('Duplicated Umrah Bus Schedule ID: ' . $id);
        notify_toastr('success', 'Umrah Bus Schedule duplicated successfully.', 'Success');

        return redirect()->route($this->module . '.edit', $duplicate->id)->with('success', 'Umrah Bus Schedule duplicated successfully.');
    }

    public function deleteAjax($id)
    {
        try {
            $record = ($this->table)::findOrFail($id);
            $record->delete();

            add_user_activity('Deleted Umrah Bus Schedule: ' . $record->departure_date);

            return response()->json([
                'success' => true,
                'message' => 'Umrah Bus Schedule moved to trash successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting Umrah Bus Schedule.',
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

                add_user_activity('Updated Umrah Bus Schedule status to ' . $status . ' for: ' . $record->departure_date);

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
            add_user_activity('Bulk deleted Umrah Bus Schedules');
            notify_toastr('success', 'Selected schedules moved to trash.', 'Success');
        } else {
            notify_toastr('error', 'No schedules selected.', 'Error');
        }

        return redirect()->route($this->module)->with('success', 'Selected schedules moved to trash.');
    }

    public function trashed()
    {
        $getData = ($this->table)::onlyTrashed()->with('tourType')->get();

        return view('backend.' . $this->module . '.listing', [
            'title'            => 'Trashed Umrah Bus Schedules',
            'module'           => $this->module,
            'moduleName'       => $this->module,
            'getData'          => $getData,
            'columns'          => ['departure_date', 'sharing_4_5_beds', 'deleted_at'],
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

        add_user_activity('Restored Umrah Bus Schedule: ' . $record->departure_date);
        notify_toastr('success', 'Umrah Bus Schedule restored successfully.', 'Success');

        return redirect()->route($this->module . '.trashed')->with('success', 'Umrah Bus Schedule restored successfully.');
    }

    public function forceDelete($id)
    {
        $record = ($this->table)::onlyTrashed()->findOrFail($id);
        $record->forceDelete();

        add_user_activity('Permanently deleted Umrah Bus Schedule: ' . $record->departure_date);
        notify_toastr('success', 'Umrah Bus Schedule permanently deleted.', 'Success');

        return redirect()->route($this->module . '.trashed')->with('success', 'Umrah Bus Schedule permanently deleted.');
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
