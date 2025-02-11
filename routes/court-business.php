<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CourtBusiness\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CourtController;
use Illuminate\Support\Facades\Route;

Route::prefix('court-business')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('court-business.auth.login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('court-business.auth.login.store');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('court-business.auth.logout');

    Route::middleware('auth:court_business')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('court_business.dashboard');
        Route::resource('/courts', CourtController::class)->names('court_business.courts')->parameters([
            'courts' => 'id'
        ]);
    });
});
