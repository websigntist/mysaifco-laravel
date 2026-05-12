<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckPermission
{
    public function handle(Request $request, Closure $next, $moduleSlug, $action = '')
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        // Super admins bypass all checks
        $userType = strtolower(optional($user->userType)->user_type);
        $adminRoles = ['admin', 'super admin', 'administrator'];

        if (in_array($userType, $adminRoles)) {
            return $next($request);
        }

        $userTypeId = $user->user_type_id;
        $module = DB::table('modules')->where('module_slug', $moduleSlug)->first();

        if (!$module) {
            abort(403, 'Module not found.');
        }

        $record = DB::table('user_type_modules_rel')
            ->where('user_type_id', $userTypeId)
            ->where('module_id', $module->id)
            ->first();

        $hasPermission = false;

        if ($record && !empty($record->actions)) {
            $allowedActions = array_map('trim', explode('|', strtolower($record->actions)));
            $hasPermission = in_array(strtolower($action), $allowedActions);
        }

        if (!$hasPermission) {
            if ($request->ajax()) {
                return response()->json(['error' => 'You don’t have permission for this action.'], 403);
            }

            return redirect()->back()->with('error', 'You don’t have permission for this action.');
        }

        return $next($request);
    }
}
