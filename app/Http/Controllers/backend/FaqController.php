<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Faq;
use App\Models\backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Response;

class FaqController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId(); // global helper
        $this->table = Faq::class;
        $this->module = 'faqs';
        $this->notify_title = 'FAQs';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular($moduleName);

        $getData = ($this->table)::latest()->get();
        $columns = [
            'image',
            'title',
            'description',
            'status',
            'ordering',
            'created_by',
        ];

        // columns to hide
        $hiddenColumns = [
            'image',
            'description',
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
            'title'            => $moduleName,
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
                'title'        => 'required|string|max:255',
                'description' => 'required|string|max:255',
            ]);

            $uploadImage = imageHandling($request, null, 'image', $this->module);

            // Insert into pages table
            $dataToStore = [
                'title'       => $request->title,
                'description' => $request->description,
                'type'        => $request->type,
                'status'      => $request->status,
                'ordering'    => $request->ordering ?? 0,
                'created_by'  => currentUserId(),
                'image'       => $uploadImage,
            ];

            $dbdata = ($this->table)::create($dataToStore);
            if (!$dbdata) {
                Log::error('Failed to create', $dataToStore);
                return back()->with('error', 'Failed to create.');
            }

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . 'Created Successfully.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $dbdata->id)->with('success', $this->notify_title . 'Created Successfully.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . 'Created Successfully.');
            }
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
            'title'       => $source->title . ' (Copy)',
            'description' => $source->description,
            'type'        => $source->type,
            'status'      => $source->status,
            'ordering'    => $source->ordering,
            'created_by'  => currentUserId(),
            'image'       => $newImage,
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
        $moduleTitle = Str::singular($moduleName);

        $getStatus = getEnumValues($this->module, 'status');
        $getType = getEnumValues($this->module, 'type');

        return view('backend.' . $this->module . '.edit', [
            'data'             => $dbdata,
            'title'            => $moduleName,
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
            'title'        => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        try {
            // Find the slider
            $dbdata = ($this->table)::findOrFail($id);

            // Initialize data to update
            $dataToUpdate = [
                'title'       => $request->title,
                'description' => $request->description,
                'company'     => $request->company,
                'review'      => $request->review,
                'type'        => $request->type,
                'status'      => $request->status,
                'ordering'    => $request->ordering ?? 0,
                'created_by'  => currentUserId(),
            ];

            // Handle image update or deletion
            $dataToUpdate['image'] = imageHandling($request, $dbdata, 'image', $this->module);

            // Update slider
            $dbdata->update($dataToUpdate);

            if ($action === 'save_new') {
                return to_route($this->module.'.create')->with('success', $this->notify_title . ' Updated! Ready to add another.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module.'.edit', $dbdata->id)->with('success', $this->notify_title . ' Updated! You can continue editing.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' Successfully data updated.');
            }

        } catch (\Exception $e) {
            Log::error('Update failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating the:  ' . $this->notify_title . $e->getMessage());
        }
    }

    public function deleteAll(Request $request)
    {
        $selectedIds = $request->ids; // array of IDs
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

        // Toggle or set status
        $newStatus = $request->status === 'Active' ? 'Inactive' : 'Active';
        $dbdata->status = $newStatus;
        $dbdata->save();

        return response()->json([
            'success' => true,
            'status'  => $newStatus,
            'message' => $this->notify_title . " Status Updated to {$newStatus}"
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
                'message' => $this->notify_title . 'Deleted Successfully.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $this->notify_title . 'Failed to Delete: ' . $e->getMessage()
            ], 500);
        }
    }

    public function modalView($id)
    {
        // Load the slider with its parent and creator relationships
        $dbdata = ($this->table)::with(['creator'])->findOrFail($id);

        return response()->json([
            'id'              => $dbdata->id,
            'title'            => $dbdata->title,
            'description'     => $dbdata->description,
            'type'            => $dbdata->type,
            'status'          => $dbdata->status,
            'ordering'        => $dbdata->ordering,
            'image'           => $dbdata->image ?? null,
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
            'image',
            'title',
            'description',
            'status',
            'ordering',
            'created_by',
        ];

        // columns to hide
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
            'meta_title'       => "Trashed List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function restore($id)
    {
        $restore = ($this->table)::withTrashed()->findOrFail($id);
        $restore->restore();

        return redirect()->route($this->module)->with('success', $this->notify_title . 'Restored Successfully!');
    }

    public function forceDelete($id)
    {
        $forcedelete = ($this->table)::withTrashed()->findOrFail($id);
        $forcedelete->forceDelete();

        return redirect()->route($this->module)->with('success', $this->notify_title . 'Permanently Deleted!');
    }

}
