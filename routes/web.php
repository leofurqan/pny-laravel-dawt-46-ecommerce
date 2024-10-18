<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

    //Routes after login
    Route::middleware(['auth'])->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard'); 
        Route::resource('categories', CategoryController::class);
    });
});

