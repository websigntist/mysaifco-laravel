<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Review;
use App\Models\backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Response;

class ReviewController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId(); // global helper
        $this->table = Review::class;
        $this->module = 'reviews';
        $this->notify_title = 'Review';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular($moduleName);

        $getData = ($this->table)::latest()->get();
        $columns = [
            'name',
            'email',
            'phone',
            'rating',
            'designation',
            'company',
            'type',
            'status',
            'ordering',
        ];

        // columns to hide
        $hiddenColumns = [
            'email',
            'phone',
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
        $getType = getEnumValues($this->module, 'type');

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
                'name'        => 'required|string|max:255',
                'review'      => 'required|string|max:255',
            ]);

            // Insert into pages table
            $dataToStore = [
                'name'        => $request->name,
                'email'       => $request->email,
                'phone'       => $request->phone,
                'designation' => $request->designation,
                'company'     => $request->company,
                'review'      => $request->review,
                'rating'      => $request->rating,
                'type'        => $request->type,
                'status'      => $request->status,
                'ordering'    => $request->ordering ?? 0,
                'created_by'  => currentUserId(),
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

    public function editForm($id, Request $request)
    {
        $dbdata = ($this->table)::findOrFail($id);

        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular($moduleName);

        $getStatus = getEnumValues($this->module, 'status');
        $getType = getEnumValues($this->module, 'type');

        return view('backend.' . $this->module . '.edit', [
            'data'             => $dbdata,
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
            'gettype'          => $getType,
            'meta_title'       => "Edit | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;
        // Validate input
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'review'      => 'required|string|max:255',
        ]);

        try {
            // Find the slider
            $dbdata = ($this->table)::findOrFail($id);

            // Initialize data to update
            $dataToUpdate = [
                'name'        => $request->name,
                'email'       => $request->email,
                'phone'       => $request->phone,
                'designation' => $request->designation,
                'company'     => $request->company,
                'review'      => $request->review,
                'rating'      => $request->rating,
                'type'        => $request->type,
                'status'      => $request->status,
                'ordering'    => $request->ordering ?? 0,
                'created_by'  => currentUserId(),
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
            'name'            => $dbdata->name,
            'email'           => $dbdata->email,
            'phone'           => $dbdata->phone,
            'designation'     => $dbdata->designation,
            'company'         => $dbdata->company,
            'review'          => $dbdata->review,
            'rating'          => $dbdata->rating,
            'type'            => $dbdata->type,
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
            'name',
            'email',
            'phone',
            'rating',
            'designation',
            'company',
            'type',
            'status',
            'ordering',
            'created_by',
        ];

        // columns to hide
        $hiddenColumns = [
            'email',
            'type',
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
