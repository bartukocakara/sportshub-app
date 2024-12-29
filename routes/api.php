<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\CourtBusinessController;
use App\Http\Controllers\CourtController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::middleware('auth:web')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('/courts', CourtController::class);
        Route::resource('/court-businesses', CourtBusinessController::class);
        Route::resource('/commissions', CommissionController::class);

    });
});
