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

        // Only Super Admins bypass all checks
        if (function_exists('isSuperAdmin') && isSuperAdmin($user)) {
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

        if ($record) {
            $reqAction = strtolower(trim($action));

            // Normalized action mapping
            $normalizedAction = match ($reqAction) {
                'index', 'listing', 'modal-view', 'modalview' => 'view',
                'create', 'store' => 'add',
                'editform', 'edit-form', 'update', 'update-title', 'update-ordering', 'status' => 'edit',
                default => $reqAction
            };

            if (empty($record->actions)) {
                if ($normalizedAction === 'view' || $reqAction === 'view') {
                    $hasPermission = true;
                }
            } else {
                $allowedActions = array_map(fn($a) => strtolower(trim($a)), explode('|', $record->actions));
                if ($normalizedAction === 'view' || in_array($normalizedAction, $allowedActions) || in_array($reqAction, $allowedActions)) {
                    $hasPermission = true;
                }
            }
        }

        if (!$hasPermission) {
            if ($request->ajax()) {
                return response()->json(['error' => 'You don’t have permission for this action.'], 403);
            }

            if ($request->header('referer') && str_contains($request->header('referer'), $request->getHost())) {
                return redirect()->back()->with('error', 'You don’t have permission to access this module or action.');
            }

            return redirect()->route('admin.dashboard')->with('error', 'You don’t have permission to access this module or action.');
        }

        return $next($request);
    }
}
