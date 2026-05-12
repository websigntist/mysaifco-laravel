<?php

use App\Http\Middleware\CheckMaintenanceMode;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Router;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        // custom routes define if needed
        /*using: function(){
            Route::group([],base_path('routes/admin.php'));
        }*/
    )->withMiddleware(function (Middleware $middleware) {
        // Register an alias
        $middleware->alias([
            'maintenance' => CheckMaintenanceMode::class,
            'check.permission' => \App\Http\Middleware\CheckPermission::class,
            'cors' => \App\Http\Middleware\CorsMiddleware::class,
        ]);

        // If "frontend" is already a group, extend it
        $middleware->appendToGroup('frontend', CheckMaintenanceMode::class);
        
        // Add CORS to API middleware group
        $middleware->prependToGroup('api', \App\Http\Middleware\CorsMiddleware::class);
    })->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
