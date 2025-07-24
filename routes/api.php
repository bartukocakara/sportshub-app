<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Api\AnnouncementController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\CourtBusinessController;
use App\Http\Controllers\Api\DistrictController; // DistrictController might still be API specific
use App\Http\Controllers\Api\CourtReservationPricingController; // CourtReservationPricingController might still be API specific
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// All routes are now grouped under '/api' URL prefix, 'api.' name prefix, and 'auth:web' middleware.
Route::prefix('api')->middleware(['auth:web'])->name('api.')->group(function () {

    // District Routes (URL: /api/districts/cities/{id}, Name: api.districts.cities)
    Route::get('/districts/cities/{id}', [DistrictController::class, 'getByCityId'])->name('districts.cities');
    Route::get('/districts-with-courts/cities/{id}', [DistrictController::class, 'getWithCourtAssociations'])->name('districts-with-courts.cities');

    // Court Reservation Pricing Routes (URL: /api/court-reservation-pricings, Name: api.court-reservation-pricings.index)
    Route::get('/court-reservation-pricings', [CourtReservationPricingController::class, 'index'])->name('court-reservation-pricings.index');
    Route::get('/court-reservation-pricings/check-availability', [CourtReservationPricingController::class, 'checkAvailablitiy'])->name('court-reservation-pricings.check-availability');

    // Announcements Routes (URL: /api/announcements, Name: api.announcements.index)
    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::post('/announcements', [AnnouncementController::class, 'store'])->name('announcements.store');

    // User/Players Routes (URL: /api/users, Name: api.users.index)
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

    // Comments Resource Routes (URL: /api/comments, Name: api.comments.index, etc.)
    // Note: Removed 'api.' from individual names as the group handles it.
    Route::resource('comments', CommentController::class)->names([
        'index' => 'comments.index',
        'store' => 'comments.store',
        'show' => 'comments.show',
        'update' => 'comments.update',
        'destroy' => 'comments.destroy',
    ]);

    // Dashboard Route (URL: /api/dashboard, Name: api.dashboard)
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Court Businesses Resource Routes (URL: /api/court-businesses, Name: api.court-businesses.index, etc.)
    Route::apiResource('/court-businesses', CourtBusinessController::class);

    // Commissions Resource Routes (URL: /api/commissions, Name: api.commissions.index, etc.)
    Route::apiResource('/commissions', CommissionController::class);
});
