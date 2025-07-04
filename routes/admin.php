<?php

use App\Http\Controllers\Admin\CourtController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\CommissionController;
use App\Http\Controllers\Admin\CourtBusinessController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

    // Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('court-businesses', CourtBusinessController::class)->names('admin.court-businesses');
        Route::resource('commissions', CommissionController::class)->names('admin.commissions');
        Route::resource('courts', CourtController::class)->names('admin.courts');
    // });
});
