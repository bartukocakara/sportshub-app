<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CourtBusiness\LoginController;
use App\Http\Controllers\CourtController;
use Illuminate\Support\Facades\Route;

Route::prefix('court-business')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('court_business.login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('court_business.logout');

    Route::middleware('auth:court_business')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('court_business.dashboard');
        Route::resource('/courts', CourtController::class);
    });
});
