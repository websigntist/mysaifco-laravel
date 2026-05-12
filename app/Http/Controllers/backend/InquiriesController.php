<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Inquiry;
use App\Models\backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Response;

class InquiriesController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId(); // global helper
        $this->table = Inquiry::class;
        $this->module = 'inquiries';
        $this->notify_title = 'Inquiry';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular($moduleName);

        $getData = ($this->table)::latest()->get();
        $columns = [
            'first_name',
            'last_name',
            'subject',
            'email',
            'phone',
            'status',
            'new',
        ];

        // columns to hide
        $hiddenColumns = [
            'new',
            'last_name',
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

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
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
                'first_name' => 'required|string|max:255',
                'email'      => 'required|string|max:255',
                'phone'      => 'required|string|max:255',
                'document'   => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx|max:2048',
            ]);

            // Handle file upload
            $fileName = null;
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $path = getPublicAssetPath('assets/documents');

                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }

                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
                Log::info('File uploaded successfully: ' . $fileName);
            }

            // Insert into pages table
            $dataToStore = [
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'subject'    => $request->subject,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'message'    => $request->message,
                'status'     => $request->status,
                'created_by' => currentUserId(),
                'document'   => $fileName,
            ];

            $dbdata = ($this->table)::create($dataToStore);
            if (!$dbdata) {
                Log::error('Failed to create', $dataToStore);
                return back()->with('error', 'Failed to create.');
            }

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' created successfully.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $dbdata->id)->with('success', $this->notify_title . ' created successfully.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' created successfully.');
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

        return view('backend.' . $this->module . '.edit', [
            'data'             => $dbdata,
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
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
            'first_name' => 'required|string|max:255',
            'email'      => 'required|string|max:255',
            'phone'      => 'required|string|max:255',
            'document'   => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx|max:2048',
        ]);

        try {
            // Find the slider
            $dbdata = ($this->table)::findOrFail($id);

            // Handle file upload
            $fileName = null;
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $path = getPublicAssetPath('assets/documents');

                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }

                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
                Log::info('File uploaded successfully: ' . $fileName);
            }

            // Initialize data to update
            $dataToUpdate = [
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'subject'    => $request->subject,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'message'    => $request->message,
                'status'     => $request->status,
                'created_by' => currentUserId(),
                'document'   => $fileName,
            ];

            // Update slider
            $dbdata->update($dataToUpdate);

            if ($action === 'save_new') {
                return to_route($this->module.'.create')->with('success', $this->notify_title . ' updated! Ready to add another.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module.'.edit', $dbdata->id)->with('success', $this->notify_title . ' updated! You can continue editing.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' updated successfully.');
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
                return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . ' permanently deleted!');
            }

            ($this->table)::whereIn('id', $selectedIds)->delete();
            return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . ' deleted successfully.');
        }

        return redirect()->route($this->module)->with('error', $this->notify_title . ' not selected.');
    }

    public function updateStatusAjax(Request $request, $id)
    {
        $dbdata = ($this->table)::findOrFail($id);

        // Toggle or set status
        $newStatus = $request->status === 'Replied' ? 'Pending' : 'Replied';
        $dbdata->status = $newStatus;
        $dbdata->save();

        return response()->json([
            'success' => true,
            'status'  => $newStatus,
            'message' => $this->notify_title .  " status updated to {$newStatus}"
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
                'message' => $this->notify_title . ' deleted successfully.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $this->notify_title . ' failed to delete: ' . $e->getMessage()
            ], 500);
        }
    }

    public function modalView($id)
    {
        // Load the slider with its parent and creator relationships
        $dbdata = ($this->table)::with(['creator'])->findOrFail($id);

        return response()->json([
            'id'         => $dbdata->id,
            'subject'         => $dbdata->subject,
            'first_name' => $dbdata->first_name,
            'last_name'  => $dbdata->last_name,
            'email'      => $dbdata->email,
            'phone'      => $dbdata->phone,
            'message'    => $dbdata->message,
            'status'     => $dbdata->status,
            'document'   => $dbdata->document ?? null,
            'created_at' => $dbdata->created_at ? $dbdata->created_at->format('M d, Y') : null,
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
            'first_name',
            'last_name',
            'subject',
            'email',
            'phone',
            'message',
            'image',
            'status',
        ];

        // columns to hide
        $hiddenColumns = [
            'message',
            'last_name',
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
