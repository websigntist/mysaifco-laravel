<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Module;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\backend\User;
use App\Models\backend\UserType;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserTypeController extends Controller
{
    protected $userId;
    protected $table;
    protected $module;
    protected $db;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId(); // global helper
        $this->table = UserType::class;
        $this->module = 'user-types';
        $this->db = 'user_types';
        $this->notify_title = 'User Type';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular($moduleName);

        $query = ($this->table)::latest();
        if (function_exists('isSuperAdmin') && !isSuperAdmin()) {
            $query->where('user_type', '!=', 'Super Admin')->where('id', '!=', 1);
        }
        $getData = $query->get();

        $columns = [
            'user_type',
            'login_type',
            'status',
            'created_at',
            'updated_at'
        ];

        // columns to hide
        $hiddenColumns = [
            'updated_at'
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

    public function create(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = Str::singular($moduleName);

        $modules = Module::where('status', 'Active')->orderBy('ordering')->get([
            'id',
            'parent_id',
            'module_slug',
            'module_title',
            'actions'
        ]);

        $menu = [
            'items'   => $modules->keyBy('id')->toArray(),
            'parents' => []
        ];

        foreach ($modules as $item) {
            $menu['parents'][$item->parent_id][] = $item->id;
        }

        // For "create", nothing is assigned yet
        $assignedModules = [];
        $selectedActions = [];

        // get enum values of login_type column
        $loginTypes = getEnumValues($this->db, 'login_type');
        $getStatus = getEnumValues($this->db, 'status');

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'menu'             => $menu,
            'assignedModules'  => $assignedModules,
            'selectedActions'  => $selectedActions,
            'loginTypes'       => $loginTypes,
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
            // Log request data for debugging
            Log::info('Request data:', $request->all());

            // Validate data
            $validated = $request->validate([
                'user_type'  => 'required',
                'login_type' => 'required',
            ]);

            // Insert into table
            $userType = UserType::create([
                'user_type'  => $request->user_type,
                'login_type' => $request->login_type,
            ]);

            if (!$userType) {
                Log::error('Failed to create', $validated);
                return back()->with('error', 'Failed to create.');
            }

            // Save permissions into user_type_modules_rel
            $modules = (array) $request->input('modules', []);   // selected modules
            $actions = (array) $request->input('actions', []);   // actions by module
            $allModuleIds = array_unique(array_merge(array_map('intval', $modules), array_map('intval', array_keys($actions))));

            foreach ($allModuleIds as $moduleId) {
                if ($moduleId <= 0) continue;
                $actList = [];
                if (isset($actions[$moduleId])) {
                    if (is_array($actions[$moduleId])) {
                        $actList = array_values(array_unique(array_filter(array_map('trim', $actions[$moduleId]))));
                    } elseif (is_string($actions[$moduleId]) && trim($actions[$moduleId]) !== '') {
                        $actList = array_values(array_unique(array_filter(array_map('trim', preg_split('/[|,]/', $actions[$moduleId])))));
                    }
                }
                if (empty($actList) && in_array($moduleId, array_map('intval', $modules))) {
                    $actList = ['view'];
                }
                if (!empty($actList)) {
                    \DB::table('user_type_modules_rel')->insert([
                        'user_type_id' => $userType->id,
                        'module_id'    => $moduleId,
                        'actions'      => implode('|', $actList),
                        'created_at'   => now(),
                        'updated_at'   => now(),
                    ]);
                }
            }

            if ($action === 'save_new') {
                return to_route($this->module.'.create')->with('success', $this->notify_title . ' Saved! Ready to add another.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module.'.edit', $userType->id)->with('success', $this->notify_title . ' Saved! You can continue editing.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' Created successfully with permissions.');
            }
        }

        return back()->with('error', 'Invalid request method.');
    }

    public function duplicate($id)
    {
        $source = ($this->table)::withTrashed()->findOrFail($id);

        $baseName = $source->user_type;
        $candidateName = '';
        for ($i = 0; $i < 50; $i++) {
            $candidateName = $baseName . ' (Copy ' . Str::lower(Str::random(4)) . ')';
            if (!($this->table)::where('user_type', $candidateName)->exists()) {
                break;
            }
        }

        if (($this->table)::where('user_type', $candidateName)->exists()) {
            return redirect()->route($this->module)->with('error', 'Could not generate a unique role name for the duplicate.');
        }

        $newUserType = null;
        \DB::transaction(function () use ($source, $candidateName, &$newUserType) {
            $newUserType = ($this->table)::create([
                'user_type'  => $candidateName,
                'login_type' => $source->login_type,
                'status'     => $source->status,
            ]);

            $rels = \DB::table('user_type_modules_rel')->where('user_type_id', $source->id)->get();
            foreach ($rels as $rel) {
                \DB::table('user_type_modules_rel')->insert([
                    'user_type_id' => $newUserType->id,
                    'module_id'    => $rel->module_id,
                    'actions'      => $rel->actions,
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]);
            }
        });

        return redirect()
            ->route($this->module . '.edit', $newUserType->id)
            ->with('success', $this->notify_title . ' duplicated. Review name and permissions.');
    }

    // store data in database.
    public function edit(Request $request, $id)
    {
        $userType = ($this->table)::findOrFail($id);

        if (($userType->id == 1 || strtolower($userType->user_type) === 'super admin') && function_exists('isSuperAdmin') && !isSuperAdmin()) {
            return redirect()->route($this->module)->with('error', 'Only Super Admin can edit the Super Admin role.');
        }

        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular($moduleName);

        // fetch modules
        $modules = Module::where('status', 'Active')->orderBy('ordering')->get([
            'id',
            'parent_id',
            'module_slug',
            'module_title',
            'actions'
        ]);

        $menu = [
            'items'   => $modules->keyBy('id')->toArray(),
            'parents' => []
        ];

        foreach ($modules as $item) {
            $menu['parents'][$item->parent_id][] = $item->id;
        }

        // Fetch assigned modules + actions from your correct table
        $records = \DB::table('user_type_modules_rel')->where('user_type_id', $id)->get();

        $assignedModules = $records->pluck('module_id')->toArray();

        $selectedActions = [];
        foreach ($records as $record) {
            if (!empty($record->actions)) {
                $selectedActions[$record->module_id] = array_map('trim', preg_split('/\||,/', $record->actions));
            } else {
                $selectedActions[$record->module_id] = ['view'];
            }
        }

        $loginTypes = getEnumValues($this->db, 'login_type');
        $getStatus = getEnumValues($this->db, 'status');

        return view('backend.' . $this->module . '.edit', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'menu'             => $menu,
            'assignedModules'  => $assignedModules,
            'selectedActions'  => $selectedActions,
            'getStatus'        => $getStatus,
            'data'             => $userType,
            'loginTypes'       => $loginTypes,
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
            'user_type'  => 'required',
            'login_type' => 'required',
        ]);

        try {
            // Find user type
            $userType = ($this->table)::findOrFail($id);

            if (($userType->id == 1 || strtolower($userType->user_type) === 'super admin') && function_exists('isSuperAdmin') && !isSuperAdmin()) {
                return redirect()->route($this->module)->with('error', 'Only Super Admin can update the Super Admin role.');
            }

            // Update table
            $userType->update([
                'user_type'  => $request->user_type,
                'login_type' => $request->login_type,
            ]);

            // Handle modules + actions
            $modules = (array) $request->input('modules', []);
            $actions = (array) $request->input('actions', []);
            $allModuleIds = array_unique(array_merge(array_map('intval', $modules), array_map('intval', array_keys($actions))));

            // Remove old permissions
            \DB::table('user_type_modules_rel')->where('user_type_id', $id)->delete();

            // Insert new permissions
            foreach ($allModuleIds as $moduleId) {
                if ($moduleId <= 0) continue;
                $actList = [];
                if (isset($actions[$moduleId])) {
                    if (is_array($actions[$moduleId])) {
                        $actList = array_values(array_unique(array_filter(array_map('trim', $actions[$moduleId]))));
                    } elseif (is_string($actions[$moduleId]) && trim($actions[$moduleId]) !== '') {
                        $actList = array_values(array_unique(array_filter(array_map('trim', preg_split('/[|,]/', $actions[$moduleId])))));
                    }
                }
                if (empty($actList) && in_array($moduleId, array_map('intval', $modules))) {
                    $actList = ['view'];
                }
                if (!empty($actList)) {
                    \DB::table('user_type_modules_rel')->insert([
                        'user_type_id' => $id,
                        'module_id'    => $moduleId,
                        'actions'      => implode('|', $actList),
                        'created_at'   => now(),
                        'updated_at'   => now(),
                    ]);
                }
            }

            if ($action === 'save_new') {
                return to_route($this->module.'.create')->with('success', $this->notify_title . ' Updated! Ready to add another.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module.'.edit', $userType->id)->with('success', $this->notify_title . ' Updated! You can continue editing.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' Updated successfully with permissions.');
            }

        } catch (\Exception $e) {
            \Log::error('Update failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating: ' . $e->getMessage());
        }
    }

    // Remove the specified resource from storage.
    public function delete($id)
    {
        try {
            $userType = ($this->table)::findOrFail($id);
            if (($userType->id == 1 || strtolower($userType->user_type) === 'super admin') && function_exists('isSuperAdmin') && !isSuperAdmin()) {
                return redirect()->route($this->module)->with('error', 'Only Super Admin can delete the Super Admin role.');
            }
            $userType->delete();

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
                return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . ' permanently deleted!');
            }

            ($this->table)::whereIn('id', $selectedIds)->delete();
            return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . ' deleted successfully.');
        }

        return redirect()->route($this->module)->with('error', $this->notify_title . ' not selected.');
    }


    public function editPermissions($id)
    {
        // Fetch active modules
        $modules = Module::where('status', 'Active')->orderBy('ordering')->get([
            'id',
            'parent_id',
            'module_title',
            'module_slug',
            'actions'
        ]);

        // Modules already assigned to this user/role
        $assignedModules = [
            1,
            2
        ]; // Example: load from your pivot table
        $selectedActions = [
            1 => [
                'add',
                'edit'
            ],
            // Example: load from your permissions table
            2 => ['view']
        ];

        // Build tree arrays
        $menu = [
            'items'   => $modules->keyBy('id')->toArray(),
            'parents' => []
        ];

        foreach ($modules as $item) {
            $menu['parents'][$item->parent_id][] = $item->id;
        }

        return view('backend.users.permissions', compact('menu', 'assignedModules', 'selectedActions'));
    }


    public function deleteAjax($id)
    {
        try {
            $userType = ($this->table)::findOrFail($id);
            $userType->delete();

            return response()->json([
                'success' => true,
                'message' => 'Deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateStatusAjax(Request $request, $id)
    {
        $userType = ($this->table)::findOrFail($id);

        // Toggle or set status
        $newStatus = $request->status === 'Active' ? 'Inactive' : 'Active';
        $userType->status = $newStatus;
        $userType->save();

        return response()->json([
            'success' => true,
            'status'  => $newStatus,
            'message' => "Status updated to {$newStatus}"
        ]);
    }

    // show only trashed items
    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $trashed = collect($segments)->last();
        $moduleTitle = Str::singular($trashed);
        $moduleName = $segments[count($segments) - 2] ?? null;

        $getData = ($this->table)::onlyTrashed()->latest()->get();

        $columns = [
            'user_type',
            'login_type',
            'status',
            'created_at',
            'updated_at'
        ];

        // columns to hide
        $hiddenColumns = [
            'updated_at'
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
