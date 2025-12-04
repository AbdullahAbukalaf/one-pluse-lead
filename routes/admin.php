<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::middleware(['web','auth','role:admin'])
    ->prefix('admin')->name('admin.')
    ->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');
        // Example resource:
        // Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);
    });
