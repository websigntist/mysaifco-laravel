<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Coupon;
use App\Models\backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class CouponsController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId(); // global helper
        $this->table = Coupon::class;
        $this->module = 'coupons';
        $this->notify_title = 'Coupon';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular($moduleName);

        $getData = ($this->table)::latest()->get();
        $columns = [
            'coupon_title',
            'coupon_code',
            'discount_value',
            'discount_type',
            'usage_limit',
            'min_order_value',
            'status',
            'created_by',
        ];

        // columns to hide
        $hiddenColumns = [
            'created_by',
            'has_used',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => "Listing | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function create(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = Str::singular($moduleName);

        $getStatus = getEnumValues($this->module, 'status');
        $getType = getEnumValues($this->module, 'discount_type');

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
            'gettype'          => $getType,
            'meta_title'       => "Create | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function store(Request $request)
    {
        $action = $request->submitBtn;

        if ($request->isMethod('post')) {
            // Log request data for debugging
            Log::info('Request data:', $request->all());

            // Validate input
            $validated = $request->validate([
                'coupon_title'    => 'required|string|max:255',
                'coupon_code'     => 'required|string|unique:coupons,coupon_code|max:255',
                'discount_value'  => 'required|string|max:255',
                'discount_type'   => 'required|string|max:255',
                'start_date'      => 'required|string|max:255',
                'end_date'        => 'required|string|max:255',
                'usage_limit'     => 'required|string|max:255',
                'min_order_value' => 'required|string|max:255',
            ]);

            // Insert into pages table
            $dataToStore = [
                'coupon_title'    => $request->coupon_title,
                'coupon_code'     => $request->coupon_code,
                'discount_value'  => $request->discount_value,
                'discount_type'   => $request->discount_type,
                'start_date'      => $request->start_date,
                'end_date'        => $request->end_date,
                'usage_limit'     => $request->usage_limit,
                'min_order_value' => $request->min_order_value,
                'status'          => $request->status,
                'ordering'        => $request->ordering ?? 0,
                'created_by'      => currentUserId(),
            ];

            $dbdata = ($this->table)::create($dataToStore);
            if (!$dbdata) {
                Log::error('Failed to create', $dataToStore);
                return back()->with('error', 'Failed to create.');
            }

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' Created Successfully.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $dbdata->id)->with('success', $this->notify_title . ' Created Successfully.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' Created Successfully.');
            }
        }
        return back()->with('error', 'Invalid request method.');
    }

    public function duplicate($id)
    {
        $source = ($this->table)::withTrashed()->findOrFail($id);

        $dbdata = ($this->table)::create([
            'coupon_title'    => $source->coupon_title . ' (Copy)',
            'coupon_code'     => $source->coupon_code,
            'discount_value'  => $source->discount_value,
            'discount_type'   => $source->discount_type,
            'start_date'      => $source->start_date,
            'end_date'        => $source->end_date,
            'usage_limit'     => $source->usage_limit,
            'min_order_value' => $source->min_order_value,
            'status'          => $source->status,
            'ordering'        => $source->ordering,
            'created_by'      => currentUserId(),
        ]);

        return redirect()
            ->route($this->module . '.edit', $dbdata->id)
            ->with('success', $this->notify_title . ' duplicated. Update name or content if needed.');
    }

    public function editForm($id, Request $request)
    {
        $dbdata = ($this->table)::findOrFail($id);

        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular($moduleName);

        $getStatus = getEnumValues($this->module, 'status');
        $getType = getEnumValues($this->module, 'discount_type');

        return view('backend.' . $this->module . '.edit', [
            'data'             => $dbdata,
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
            'gettype'          => $getType,
            'meta_title'       => $moduleTitle . "Edit | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;
        // Validate input
        $validated = $request->validate([
           'coupon_title'    => 'required|string|max:255',
           'coupon_code'     => ['required', 'string', 'max:255', Rule::unique('coupons', 'coupon_code')->ignore($id)],
           'discount_value'  => 'required|string|max:255',
           'discount_type'   => 'required|string|max:255',
           'start_date'      => 'required|string|max:255',
           'end_date'        => 'required|string|max:255',
           'usage_limit'     => 'required|string|max:255',
           'min_order_value' => 'required|string|max:255',
       ]);

        try {
            // Find the slider
            $dbdata = ($this->table)::findOrFail($id);

            // Initialize data to update
            $dataToUpdate = [
                'coupon_title'    => $request->coupon_title,
                'coupon_code'     => $request->coupon_code,
                'discount_value'  => $request->discount_value,
                'discount_type'   => $request->discount_type,
                'start_date'      => $request->start_date,
                'end_date'        => $request->end_date,
                'usage_limit'     => $request->usage_limit,
                'min_order_value' => $request->min_order_value,
                'status'          => $request->status,
                'ordering'        => $request->ordering ?? 0,
                'created_by'      => currentUserId(),
            ];

            // Update slider
            $dbdata->update($dataToUpdate);

            if ($action === 'save_new') {
                return to_route($this->module.'.create')->with('success', $this->notify_title . ' Updated! Ready to add another.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module.'.edit', $dbdata->id)->with('success', $this->notify_title . ' Updated! Ready to add another.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' Updated Successfully.');
            }

        } catch (\Exception $e) {
            Log::error('Update failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating: ' . $e->getMessage());
        }
    }

    public function deleteAll(Request $request)
    {
        $selectedIds = $request->ids; // array of IDs
        $trashed = $request->trashed;

        if (is_array($selectedIds) && count($selectedIds)) {
            if ($trashed === 'trashed') {
                ($this->table)::withTrashed()->whereIn('id', $request->ids)->forceDelete();
                return redirect()->route($this->module)->with('success', 'Selected ' .$this->notify_title . '  permanently deleted!');
            }

            ($this->table)::whereIn('id', $selectedIds)->delete();
            return redirect()->route($this->module)->with('success', 'Selected ' .$this->notify_title . '  deleted successfully.');
        }

        return redirect()->route($this->module)->with('error', $this->notify_title . ' not selected.');
    }

    public function updateStatusAjax(Request $request, $id)
    {
        $dbdata = ($this->table)::findOrFail($id);

        // Toggle or set status
        $newStatus = $request->status === 'Active' ? 'Inactive' : 'Active';
        $dbdata->status = $newStatus;
        $dbdata->save();

        return response()->json([
            'success' => true,
            'status'  => $newStatus,
            'message' => $this->notify_title . " status updated to {$newStatus}"
        ]);
    }

    public function deleteAjax($id)
    {
        try {
            // Find the slider
            $dbdata = ($this->table)::findOrFail($id);

            // Delete the slider itself
            $dbdata->delete();

            return response()->json([
                'success' => true,
                'message' => 'Deleted successfully.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete: ' . $e->getMessage()
            ], 500);
        }
    }

    public function modalView($id)
    {
        // Load the slider with its parent and creator relationships
        $dbdata = ($this->table)::with(['creator'])->findOrFail($id);

        return response()->json([
            'id'              => $dbdata->id,
            'coupon_title'    => $dbdata->coupon_title,
            'coupon_code'     => $dbdata->coupon_code,
            'discount_value'  => $dbdata->discount_value,
            'discount_type'   => $dbdata->discount_type,
            'start_date'      => $dbdata->start_date,
            'end_date'        => $dbdata->end_date,
            'usage_limit'     => $dbdata->usage_limit,
            'min_order_value' => $dbdata->min_order_value,
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
        $moduleTitle = Str::singular($trashed);
        $moduleName = $segments[count($segments) - 2] ?? null;

        $getData = ($this->table)::onlyTrashed()->latest()->get();

        $columns = [
            'coupon_title',
            'coupon_code',
            'discount_value',
            'discount_type',
            'usage_limit',
            'min_order_value',
            'status',
            'created_by',
        ];

        // columns to hide
        $hiddenColumns = [
            'created_by',
            'has_used',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $trashed,
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

        return redirect()->route($this->module)->with('success', $this->notify_title . ' restored successfully!');
    }

    public function forceDelete($id)
    {
        $forcedelete = ($this->table)::withTrashed()->findOrFail($id);
        $forcedelete->forceDelete();

        return redirect()->route($this->module)->with('success', $this->notify_title . ' permanently deleted!');
    }

}
