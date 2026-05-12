<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\EmailTemplates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class EmailTemplateController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $db;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId();
        $this->table = EmailTemplates::class;
        $this->module = 'email-templates';
        $this->db = 'email_templates';
        $this->notify_title = 'Email Templates';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular($moduleName);

        $getData = ($this->table)::with('creator')->latest()->get();

        $columns = [
            'title',
            'slug',
            'description',
            'status',
            'created_by',
        ];

        // columns to hide
        $hiddenColumns = [
            'description',
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

        $getStatus = getEnumValues($this->db, 'status');

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
            'meta_title'       => "Create | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);

    }

    public function duplicate($id)
    {
        $source = ($this->table)::withTrashed()->findOrFail($id);

        $baseSlug = $source->slug ?: 'template';
        $candidateSlug = '';
        for ($i = 0; $i < 50; $i++) {
            $candidateSlug = $baseSlug . '-copy-' . Str::lower(Str::random(6));
            if (strlen($candidateSlug) > 255) {
                $candidateSlug = Str::limit($baseSlug, 220, '') . '-' . Str::lower(Str::random(6));
            }
            if (!($this->table)::where('slug', $candidateSlug)->exists()) {
                break;
            }
        }

        if (($this->table)::where('slug', $candidateSlug)->exists()) {
            return redirect()->route($this->module)->with('error', 'Could not generate a unique slug for the duplicate.');
        }

        $newDocument = null;
        if (!empty($source->document)) {
            $dir = getPublicAssetPath('assets/documents');
            $srcPath = $dir . DIRECTORY_SEPARATOR . $source->document;
            if (File::exists($srcPath)) {
                $ext = pathinfo($source->document, PATHINFO_EXTENSION);
                $newDocument = uniqid('dup_', true) . ($ext !== '' ? '.' . $ext : '');
                File::copy($srcPath, $dir . DIRECTORY_SEPARATOR . $newDocument);
            }
        }

        $dbdata = ($this->table)::create([
            'title'       => $source->title . ' (Copy)',
            'slug'        => $candidateSlug,
            'description' => $source->description,
            'status'      => $source->status,
            'created_by'  => currentUserId(),
            'document'    => $newDocument,
        ]);

        return redirect()
            ->route($this->module . '.edit', $dbdata->id)
            ->with('success', $this->notify_title . ' duplicated. Update title or slug if needed.');
    }

    // store data in database.
    public function store(Request $request)
    {
        $action = $request->submitBtn;

        $userId = currentUserId();
        // Validate input
        $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|max:255',
            'description' => 'required|string',
            'document'   => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx|max:2048',
        ]);

        try {

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

            // Create
            $dataToStore = [
                'title'       => $request->title,
                'slug'        => $request->slug,
                'description' => $request->description,
                'status'      => $request->status,
                'created_by'  => $userId,
                'document'    => $fileName,
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

        } catch (\Exception $e) {
            Log::error('Creation failed: ' . $e->getMessage(), [
                'request_data' => $request->except('image'),
            ]);
            return back()->with('error', 'Failed to create: ' . $e->getMessage());
        }
    }

    // store data in database.
    public function editForm(Request $request, $id)
    {
        $dbdata = ($this->table)::findOrFail($id);

        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular($moduleName);

        $getStatus = getEnumValues($this->db, 'status');

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

    // update data in database
    public function update(Request $request, $id)
    {
        $userId = currentUserId();
        $action = $request->submitBtn;

        // Validate input
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|max:255',
            'description' => 'required|string',
            'document'   => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx|max:2048',
        ]);

        try {
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
                'title'       => $request->title,
                'slug'        => $request->slug,
                'description' => $request->description,
                'status'      => $request->status,
                'created_by'  => $userId,
                'document'  => $fileName,
            ];

            // Update
            $dbdata->update($dataToUpdate);

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' updated successfully.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $dbdata->id)->with('success', $this->notify_title . ' updated successfully.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' updated successfully.');
            }

        } catch (\Exception $e) {
            Log::error('Update failed: ' . $e->getMessage(), [
                'request_data'    => $request->except('image'),
                'static_block_id' => $id,
            ]);
            return back()->with('error', 'An error occurred while updating: ' . $e->getMessage());
        }
    }

    public function deleteAll(Request $request)
    {
        $selectedIds = $request->ids; // array of IDs

        if (is_array($selectedIds) && count($selectedIds)) {
            ($this->table)::whereIn('id', $selectedIds)->delete();
            return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . ' deleted successfully.');
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
            $dbdata = ($this->table)::findOrFail($id);
            $dbdata->delete();

            return response()->json([
                'success' => true,
                'message' => $this->notify_title . ' deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $this->notify_title . ' failed to delete: ' . $e->getMessage()
            ], 500);
        }
    }

    // show only trashed items
    public function trashed()
    {
        $segments = $request->segments();
        $trashed = collect($segments)->last();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular($moduleName);

        $getData = ($this->table)::with('creator')->onlyTrashed()->latest()->get();

        $columns = [
            'title',
            'slug',
            'description',
            'status',
            'created_by',
        ];

        // columns to hide
        $hiddenColumns = [
            'description',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $moduleName,
            'moduleName'       => $trashed,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => "Listing | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    // restore a deleted item
    public function restore($id)
    {
        $restore = ($this->table)::withTrashed()->findOrFail($id);
        $restore->restore();

        return redirect()->route($this->module)->with('success', $this->notify_title . ' restored successfully!');
    }

    // permanently delete
    public function forceDelete($id)
    {
        $forcedelete = ($this->table)::withTrashed()->findOrFail($id);
        $forcedelete->forceDelete();

        return redirect()->route($this->module)->with('success', $this->notify_title . ' permanently deleted!');
    }
}
