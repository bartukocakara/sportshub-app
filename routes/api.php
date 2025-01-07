<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\CourtBusinessController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\Api\DistrictController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::get('/districts/cities/{id}', [DistrictController::class, 'getByCityId'])->name('districts.cities');
    Route::get('/districts-with-courts/cities/{id}', [DistrictController::class, 'getWithCourtAssociations'])->name('districts-with-courts.cities', );
    Route::middleware('auth:web')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('/court-businesses', CourtBusinessController::class);
        Route::resource('/commissions', CommissionController::class);
    });
});
