<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\UmrahPackage;
use App\Models\backend\TourType;
use App\Models\backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UmrahPackageController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId();
        $this->table = UmrahPackage::class;
        $this->module = 'umrah-packages';
        $this->notify_title = 'Umrah Package';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        $getData = ($this->table)::with('tourType')->orderBy('ordering', 'asc')->orderByDesc('id')->get();
        $columns = [
            'title',
            'tour_type',
            'price',
            'badge',
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

        $getStatus = getEnumValues('umrah_packages', 'status');

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
            Log::info('UmrahPackage Request data:', $request->all());

            $validated = $request->validate([
                'title'        => 'required|string|max:255',
                'subtitle'     => 'nullable|string|max:255',
                'price'        => 'nullable|string|max:255',
                'currency'     => 'nullable|string|max:50',
                'badge'        => 'nullable|string|max:255',
                'header_color' => 'nullable|string|max:50',
                'features'     => 'nullable|string',
                'button_title' => 'nullable|string|max:255',
                'button_url'   => 'nullable|string|max:1000',
                'tour_type_id' => 'nullable|integer',
                'status'       => 'required|in:Active,Inactive',
                'ordering'     => 'nullable|integer',
            ]);

            $validated['created_by'] = $this->userId;

            $inserted = ($this->table)::create($validated);

            $id = $inserted->id;
            add_user_activity('Added new Umrah Package');

            notify_toastr('success', 'Umrah Package created successfully.', 'Success');

            if ($action === 'save_stay') {
                return redirect()->route($this->module . '.edit', $id)->with('success', 'Umrah Package created successfully.');
            }
            if ($action === 'save_new') {
                return redirect()->route($this->module . '.create')->with('success', 'Umrah Package created successfully.');
            }

            return redirect()->route($this->module)->with('success', 'Umrah Package created successfully.');
        }

        return redirect()->route($this->module);
    }

    public function editForm(Request $request, $id)
    {
        $data = ($this->table)::findOrFail($id);
        $getStatus = getEnumValues('umrah_packages', 'status');

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
            'title'        => 'required|string|max:255',
            'subtitle'     => 'nullable|string|max:255',
            'price'        => 'nullable|string|max:255',
            'currency'     => 'nullable|string|max:50',
            'badge'        => 'nullable|string|max:255',
            'header_color' => 'nullable|string|max:50',
            'features'     => 'nullable|string',
            'button_title' => 'nullable|string|max:255',
            'button_url'   => 'nullable|string|max:1000',
            'tour_type_id' => 'nullable|integer',
            'status'       => 'required|in:Active,Inactive',
            'ordering'     => 'nullable|integer',
        ]);

        $record->update($validated);
        add_user_activity('Updated Umrah Package: ' . $record->title);

        notify_toastr('success', 'Umrah Package updated successfully.', 'Success');

        if ($action === 'save_stay') {
            return redirect()->route($this->module . '.edit', $id)->with('success', 'Umrah Package updated successfully.');
        }
        if ($action === 'save_new') {
            return redirect()->route($this->module . '.create')->with('success', 'Umrah Package updated successfully.');
        }

        return redirect()->route($this->module)->with('success', 'Umrah Package updated successfully.');
    }

    public function duplicate($id)
    {
        $existing = ($this->table)::findOrFail($id);

        $duplicate = $existing->replicate();
        $duplicate->title = $duplicate->title . ' (Copy)';
        $duplicate->created_by = $this->userId;
        $duplicate->save();

        add_user_activity('Duplicated Umrah Package ID: ' . $id);
        notify_toastr('success', 'Umrah Package duplicated successfully.', 'Success');

        return redirect()->route($this->module . '.edit', $duplicate->id);
    }

    public function deleteAjax($id)
    {
        try {
            $record = ($this->table)::findOrFail($id);
            $record->delete();

            add_user_activity('Deleted Umrah Package: ' . $record->title);

            return response()->json([
                'success' => true,
                'message' => 'Umrah Package moved to trash successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting Umrah Package.',
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

                add_user_activity('Updated Umrah Package status to ' . $status . ' for: ' . $record->title);

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
            add_user_activity('Bulk deleted Umrah Packages');
            notify_toastr('success', 'Selected Umrah Packages moved to trash.', 'Success');
        } else {
            notify_toastr('error', 'No Umrah Packages selected.', 'Error');
        }

        return redirect()->route($this->module);
    }

    public function trashed()
    {
        $getData = ($this->table)::onlyTrashed()->with('tourType')->get();

        return view('backend.' . $this->module . '.listing', [
            'title'            => 'Trashed Umrah Packages',
            'module'           => $this->module,
            'moduleName'       => $this->module,
            'getData'          => $getData,
            'columns'          => ['title', 'tour_type', 'deleted_at'],
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

        add_user_activity('Restored Umrah Package: ' . $record->title);
        notify_toastr('success', 'Umrah Package restored successfully.', 'Success');

        return redirect()->route($this->module . '.trashed');
    }

    public function forceDelete($id)
    {
        $record = ($this->table)::onlyTrashed()->findOrFail($id);
        $record->forceDelete();

        add_user_activity('Permanently deleted Umrah Package: ' . $record->title);
        notify_toastr('success', 'Umrah Package permanently deleted.', 'Success');

        return redirect()->route($this->module . '.trashed');
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
