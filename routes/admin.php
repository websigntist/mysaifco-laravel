<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend;

Route::prefix('admin')->group(function () {
    Route::get('/login', [backend\UserController::class, 'index'])->name('login');
    Route::get('/dashboard', [backend\UserController::class, 'dashboard'])->name('dashboard');
});
