<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\CourtBusinessController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\CourtReservationPricingController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::get('/districts/cities/{id}', [DistrictController::class, 'getByCityId'])->name('districts.cities');
    Route::get('/districts-with-courts/cities/{id}', [DistrictController::class, 'getWithCourtAssociations'])->name('districts-with-courts.cities');

    Route::get('/court-reservation-pricings', [CourtReservationPricingController::class, 'index'])->name('api.court-reservation-pricings.index');
    Route::get('/court-reservation-pricings/check-availability', [CourtReservationPricingController::class, 'checkAvailablitiy'])->name('api.court-reservation-pricings.check-availability');
    Route::middleware('auth:web')->group(function () {
        Route::resource('comments', CommentController::class)->names([
            'index' => 'api.comments.index',
            'store' => 'api.comments.store',
            'show' => 'api.comments.show',
            'update' => 'api.comments.update',
            'destroy' => 'api.comments.destroy',
        ]);

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('web.dashboard');
        Route::apiResource('/court-businesses', CourtBusinessController::class);
        Route::apiResource('/commissions', CommissionController::class);
    });
});
