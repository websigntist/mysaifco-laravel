<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\ContactApiController;
use App\Http\Controllers\frontend\PagesApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// API v1 Routes
Route::prefix('v1')->group(function () {

    // Contact Form API - Rate limited to prevent abuse
    Route::middleware(['throttle:10,1'])->group(function () {
        // Test endpoint to verify API is working
        Route::get('/contact/test', [ContactApiController::class, 'test']);

        // Submit contact form
        Route::post('/contact/submit', [ContactApiController::class, 'store']);
    });

    // Pages API - Rate limited to 60 requests per minute
    Route::middleware(['throttle:60,1'])->group(function () {
        // Test endpoint
        Route::get('/pages/test', [PagesApiController::class, 'test']);

        // Get all published pages
        Route::get('/pages', [PagesApiController::class, 'index']);

        // Get menu pages only
        Route::get('/pages/menu', [PagesApiController::class, 'menu']);

        // Get single page by ID
        Route::get('/pages/{id}', [PagesApiController::class, 'show'])->where('id', '[0-9]+');

        // Get single page by friendly URL (slug)
        Route::get('/pages/slug/{slug}', [PagesApiController::class, 'showBySlug']);
    });

});


