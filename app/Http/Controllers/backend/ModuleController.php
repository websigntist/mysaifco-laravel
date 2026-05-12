<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Module;
use App\Models\backend\MaintenanceMode;
use App\Models\backend\Page;
use App\Models\backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Termwind\Components\Dd;

class ModuleController
{
    protected $userId;
    protected $table;
    protected $module;

    public function __construct()
    {
        $this->userId = currentUserId(); // global helper
        $this->table = Module::class;
        $this->module = 'modules';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular($moduleName);

        $getData = ($this->table)::with('parentModule')->orderBy('ordering', 'asc')->latest()->get();
        $columns = [
            'icon',
            'module_title',
            'parent_id',
            'status',
            'ordering',
            'created_at',
            'created_by'
        ];

        // columns to hide
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
            'meta_title'       => "List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    // create new
    public function create(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = Str::singular($moduleName);

        $modules = ($this->table)::where('parent_id', 0)
            ->orderBy('id', 'desc')
            ->pluck('module_title', 'id');

        $getStatus = getEnumValues($this->module, 'status');
        $getShowinmenu = getEnumValues($this->module, 'show_in_menu');

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'modules'          => $modules,
            'getStatus'        => $getStatus,
            'getShowinmenu'    => $getShowinmenu,
            'meta_title'       => "Create New Module | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    // store data in database.
    public function store(Request $request)
    {
        $userId = currentUserId();
        $action = $request->submitBtn;

        if ($request->isMethod('post')) {
            // Log request data for debugging
            Log::info('Request data:', $request->all());

            // Validate input
            $validated = $request->validate([
                //'icon'         => 'required',
                'parent_id'    => 'required',
                'module_title' => 'required',
                'module_slug'  => 'required|string|unique:modules,module_slug',
                'show_in_menu' => 'required',
                'actions'      => 'required_unless:parent_id,0',
                'status'       => 'required',
            ]);

            // Insert data to the table
            $moduleData = [
                'parent_id'    => (int)($request->parent_id ?? 0),
                'module_title' => $request->module_title,
                'module_slug'  => $request->module_slug,
                'show_on_menu' => $request->show_on_menu,
                'actions'      => $request->actions,
                'ordering'     => (int)($request->ordering ?? 0),
                'status'       => $request->status,
                'created_by'   => $userId ?? 0,
                'icon'         => $request->icon,
            ];

            $module = ($this->table)::create($moduleData);
            if (!$module) {
                Log::error('Failed to create', $moduleData);
                return back()->with('error', 'Failed to create.');
            }

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', 'Created successfully.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $module->id)->with('success', 'Created successfully.');
            } else {
                return redirect()->route($this->module)->with('success', 'Created successfully.');
            }
        }

        return back()->with('error', 'Invalid request method.');
    }

    public function duplicate($id)
    {
        $source = ($this->table)::withTrashed()->findOrFail($id);

        $baseSlug = $source->module_slug;
        $candidateSlug = '';
        for ($i = 0; $i < 50; $i++) {
            $candidateSlug = $baseSlug . '-copy-' . Str::lower(Str::random(6));
            if (strlen($candidateSlug) > 255) {
                $candidateSlug = Str::limit($baseSlug, 200, '') . '-' . Str::lower(Str::random(6));
            }
            if (!($this->table)::where('module_slug', $candidateSlug)->exists()) {
                break;
            }
        }

        if (($this->table)::where('module_slug', $candidateSlug)->exists()) {
            return redirect()->route($this->module)->with('error', 'Could not generate a unique slug for the duplicate.');
        }

        $newModule = ($this->table)::create([
            'parent_id'    => $source->parent_id,
            'module_title' => $source->module_title . ' (Copy)',
            'module_slug'  => $candidateSlug,
            'icon'         => $source->icon,
            'show_in_menu' => $source->show_in_menu,
            'actions'      => $source->actions,
            'ordering'     => $source->ordering,
            'status'       => $source->status,
            'created_by'   => $this->userId ?? 0,
        ]);

        return redirect()
            ->route($this->module . '.edit', $newModule->id)
            ->with('success', 'Module duplicated. Update title, slug, or parent as needed.');
    }

    // store data in database.
    public function editForm(Request $request, $id)
    {
        $module = ($this->table)::findOrFail($id);

        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular($moduleName);

        $parent_id = ($this->table)::where('parent_id', 0)->orderBy('id', 'desc')->get([
            'id',
            'module_title',
            'parent_id',
            'status'
        ]);

        $getStatus = getEnumValues($this->module, 'status');
        $getShowinmenu = getEnumValues($this->module, 'show_in_menu');

        return view('backend.' . $this->module . '.edit', [
            'data'             => $module,
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'parent_ids'       => $parent_id,
            'getStatus'        => $getStatus,
            'getShowinmenu'    => $getShowinmenu,
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
        $request->validate([
            'parent_id'    => 'required',
            'module_title' => 'required',
            'module_slug'  => 'required',
            'show_in_menu' => 'required',
            'actions'      => 'required',
            'status'       => 'required',
        ]);

        try {
            // Find the page
            $module = ($this->table)::findOrFail($id);

            // Initialize data to update
            $dataToUpdate = [
                'parent_id'    => (int)($request->parent_id ?? 0),
                'module_title' => $request->module_title,
                'module_slug'  => $request->module_slug,
                'show_in_menu' => $request->show_in_menu,
                'actions'      => $request->actions,
                'ordering'     => (int)($request->ordering ?? 0),
                'status'       => $request->status,
                'icon'         => $request->icon,
                //'created_by'   => (int)($request->$userId ?? 0),
            ];

            // Update page
            $module->update($dataToUpdate);

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', 'Updated successfully.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $module->id)->with('success', 'Updated successfully.');
            } else {
                return redirect()->route($this->module)->with('success', 'Updated successfully.');
            }


        } catch (\Exception $e) {
            Log::error('Update failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating: ' . $e->getMessage());
        }
    }

    public function status($id)
    {
        $module = ($this->table)::findOrFail($id);

        // Toggle status
        $newStatus = $module->status === 'Active' ? 'Inactive' : 'Active';

        $module->update(['status' => $newStatus]);

        return redirect()->route($this->module)->with('success', 'Status updated to ' . ucfirst($newStatus) . '.');
    }

    public function delete($id)
    {
        try {
            $module = ($this->table)::findOrFail($id);      // Find the page
            $module->delete();                              // Delete it

            return redirect()->route($this->module)->with('success', 'Deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function deleteAll(Request $request)
    {
        $selectedIds = $request->ids; // array of IDs

        if (is_array($selectedIds) && count($selectedIds)) {
            ($this->table)::whereIn('id', $selectedIds)->delete();
            return redirect()->route($this->module)->with('success', 'Selected items deleted successfully.');
        }

        return redirect()->route($this->module)->with('error', 'No item selected.');
    }

    public function modalView($id)
    {
        // Load the page with its parent and creator relationships
        $data = ($this->table)::with([
            'parentModule',
            'creator'
        ])->findOrFail($id);

        return response()->json([
            'id'              => $data->id,
            'icon'            => $data->icon,
            'module_title'    => $data->module_title,
            'module_slug'     => $data->module_slug,
            'parent_id'       => $data->parent_id,
            'actions'         => $data->actions,
            'parent_module'   => $data->parentModule->module_title ?? '/Parent',
            'ordering'        => $data->ordering,
            'show_in_menu'    => $data->show_in_menu,
            'status'          => $data->status,
            'created_at'      => $data->created_at ? $data->created_at->format('M d, Y') : null,
            'created_by_name' => trim(($data->creator->first_name ?? '') . ' ' . ($data->creator->last_name ?? '')),
        ]);
    }

    public function updateTitleAjax(Request $request)
    {
        try {
            $validated = $request->validate([
                'id'           => 'required|integer|exists:modules,id',
                'module_title' => 'required|string|max:255',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'errors'  => $e->errors(),
            ], 422);
        }

        $module = ($this->table)::findOrFail($validated['id']);
        $module->module_title = $validated['module_title'];
        $module->save();

        return response()->json([
            'success'      => true,
            'message'      => 'Title updated successfully',
            'id'           => $module->id,
            'module_title' => $module->module_title,
        ]);
    }

    public function updateStatusAjax(Request $request, $id)
    {
        $module = ($this->table)::findOrFail($id);

        // Toggle or set status
        $newStatus = $request->status === 'Active' ? 'Inactive' : 'Active';
        $module->status = $newStatus;
        $module->save();

        return response()->json([
            'success' => true,
            'status'  => $newStatus,
            'message' => "Status updated to {$newStatus}"
        ]);
    }

    public function updateOrderingAjax(Request $request)
    {
        $request->validate([
            'id'       => 'required|integer|exists:modules,id',
            'ordering' => 'required|integer|min:0',
        ]);

        $module = ($this->table)::findOrFail($request->id);
        $module->ordering = $request->ordering;
        $module->save();

        return response()->json([
            'success'  => true,
            'message'  => 'Ordering updated successfully',
            'id'       => $module->id,
            'ordering' => $module->ordering,
        ]);
    }

    public function deleteAjax($id)
    {
        try {
            $module = ($this->table)::findOrFail($id);
            $module->delete();

            return response()->json([
                'success' => true,
                'message' => 'Deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete module: ' . $e->getMessage()
            ], 500);
        }
    }

    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $trashed = collect($segments)->last();
        $moduleTitle = Str::singular($trashed);
        $moduleName = $segments[count($segments) - 2] ?? null;

        $getData = ($this->table)::with('parentModule')->onlyTrashed()->orderBy('ordering', 'asc')->latest()->get();
        $columns = [
            'icon',
            'module_title',
            'parent_id',
            'status',
            'ordering',
            'created_at',
            'created_by'
        ];

        // columns to hide
        $hiddenColumns = [
            'created_by',
            'ordering',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $trashed,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => "List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function restore($id)
    {
        $restore = ($this->table)::withTrashed()->findOrFail($id);
        $restore->restore();

        return redirect()->route($this->module)->with('success', 'Item restored successfully!');
    }

    public function forceDelete($id)
    {
        $forcedelete = ($this->table)::withTrashed()->findOrFail($id);
        $forcedelete->forceDelete();

        return redirect()->route($this->module)->with('success', 'Item permanently deleted!');
    }
}
