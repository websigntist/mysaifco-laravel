<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Module;
use App\Models\backend\BlogTag;
use App\Models\backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Response;

class BlogTagController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $db;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId(); // global helper
        $this->table = BlogTag::class;
        $this->module = 'blog-tags';
        $this->db = 'blog_tags';
        $this->notify_title = 'Blog Tags';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $_moduleName = collect($segments)->last();
        $moduleName = Str::singular($_moduleName);

        $getData = ($this->table)::latest()->get();

        $columns = [
            'title',
            'status',
            'ordering',
            'created_by',
            'created_at'
        ];

        // columns to hide
        $hiddenColumns = [
            'ordering',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleName,
            'module'           => $moduleName,
            '_module'          => $_moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => "List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    // open form
    public function create(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = Str::singular($moduleName);
        $tags = Str::plural($moduleName);

        $getStatus = getEnumValues($this->db, 'status');

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            '_module'          => $tags,
            'getStatus'        => $getStatus,
            'meta_title'       => "Create New | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    // store data in database.
    public function store(Request $request)
    {
        $action = $request->submitBtn;

        if ($request->isMethod('post')) {
            Log::info('Request data:', $request->all());

            // Validate input
            $validated = $request->validate([
                'title' => 'required|string|max:255',
            ]);

            // Insert into BlogTag table
            $dataToStore = [
                'title'      => $request->title,
                'status'     => $request->status,
                'ordering'   => $request->ordering ?? 0,
                'created_by' => currentUserId()
            ];

            $blogTag = ($this->table)::create($dataToStore);

            if ($blogTag) {
                $blogTag->blogtags()->sync($request->blog_tags);

                if ($action === 'save_new') {
                    return to_route($this->module . '.create')->with('success', $this->notify_title . ' created successfully.');
                } elseif ($action === 'save_stay') {
                    return to_route($this->module . '.edit', $blogCat->id)->with('success', $this->notify_title . ' created successfully.');
                } else {
                    return redirect()->route($this->module)->with('success', $this->notify_title . ' created successfully.');
                }
            }

            Log::error('Failed to create', $dataToStore);
            return back()->with('error', 'Failed to create.');
        }

        return back()->with('error', 'Invalid request method.');
    }

    // store data in database.
    public function editForm(Request $request, $id)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular($moduleName);
        $_tags = Str::plural($moduleName);

        // Load the blog with its categories
        $blogTag = ($this->table)::findOrFail($id);
        $getStatus = getEnumValues($this->db, 'status');

        return view('backend.' . $this->module . '.edit', [
            'data'             => $blogTag,
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'tags'             => $_tags,
            'getStatus'        => $getStatus,
            'meta_title'       => "Edit | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    // update data in database
    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;

        // Validate input
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        try {
            // Find the blog category
            $blogTag = ($this->table)::findOrFail($id);

            // Initialize data to update
            $dataToUpdate = [
                'title'      => $request->title,
                'status'     => $request->status,
                'ordering'   => $request->ordering ?? 0,
                'created_by' => currentUserId(),
            ];

            // Update category
            $blogTag->update($dataToUpdate);

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' updated successfully.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $blogCat->id)->with('success', $this->notify_title . ' updated successfully.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' updated successfully.');
            }

        } catch (\Exception $e) {
            \Log::error('Update failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating: ' . $e->getMessage());
        }
    }

    public function status($id)
    {
        $blogTag = ($this->table)::findOrFail($id);

        // Toggle status
        $newStatus = $blogTag->status === 'Active' ? 'Inactive' : 'Active';

        $blogTag->update(['status' => $newStatus]);

        return redirect()->route($this->module)->with('success', $this->notify_title . ' status updated to ' . ucfirst($newStatus) . '.');
    }

    public function updateStatusAjax(Request $request, $id)
    {
        $blogTag = ($this->table)::findOrFail($id);

        // Toggle or set status
        $newStatus = $request->status === 'Active' ? 'Inactive' : 'Active';
        $blogTag->status = $newStatus;
        $blogTag->save();

        return response()->json([
            'success' => true,
            'status'  => $newStatus,
            'message' => $this->notify_title . " Status Updated to {$newStatus}"
        ]);
    }

    public function deleteAjax($id)
    {
        try {
            $blogTag = ($this->table)::findOrFail($id);
            $blogTag->delete();

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

    public function delete($id)
    {
        try {
            $blogTag = ($this->table)::findOrFail($id);      // Find the blog
            $blogTag->delete();                              // Delete it

            return redirect()->route($this->module)->with('success', $this->notify_title . ' deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function deleteAll(Request $request)
    {
        $selectedIds = $request->ids; // array of IDs
        $trashed = $request->trashed;

        if (is_array($selectedIds) && count($selectedIds)) {

            if ($trashed === 'trashed') {
                ($this->table)::withTrashed()->whereIn('id', $request->ids)->forceDelete();
                return redirect()->route('blog-categories')->with('success', 'Selected ' . $this->notify_title . ' permanently deleted!');
            }

            ($this->table)::whereIn('id', $selectedIds)->delete();
            return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . ' deleted successfully.');
        }

        return redirect()->route($this->module)->with('error', $this->notify_title . ' not selected.');
    }

    // show only trashed items
    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $_moduleName = collect($segments)->last();
        $moduleName = Str::singular($_moduleName);
        $moduleName = $segments[count($segments) - 2] ?? null;

        $getData = ($this->table)::onlyTrashed()->latest()->get();

        $columns = [
            'title',
            'status',
            'ordering',
            'created_by',
            'created_at'
        ];

        // columns to hide
        $hiddenColumns = [
            'created_by',
            'menu_title',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleName,
            'module'           => $moduleName,
            '_module'          => $_moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => "Trashed List | Admin Panel",
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
