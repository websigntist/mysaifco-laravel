<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMaintenanceMode
{
    public function handle(Request $request, Closure $next)
    {
        // Check if maintenance mode is active
        if (get_setting('maintenance_mode') === 'Active') {
            // Only allow access to the maintenance page itself
            if (!$request->is('under-maintenance')) {
                //return redirect()->route('under.maintenance');
                return response()->view('frontend.pages.under_maintenance');
            }
        } else {
            // If not in maintenance mode, prevent access to maintenance page
            if ($request->is('under-maintenance')) {
                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}
