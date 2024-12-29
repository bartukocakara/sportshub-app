<?php

use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\CourtBusiness\LoginController;
use App\Http\Controllers\CourtBusinessController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');


// Google Login
Route::get('auth/google', [SocialLoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialLoginController::class, 'handleGoogleCallback']);

// Facebook Login
Route::get('auth/facebook', [SocialLoginController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('auth/facebook/callback', [SocialLoginController::class, 'handleFacebookCallback']);
Route::get('courts/{id}', [CourtController::class, 'show'])->name('courts.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('court-businesses', CourtBusinessController::class);
    Route::resource('courts', CourtController::class);
    Route::resource('reservations', ReservationController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('refunds', RefundController::class);
    Route::resource('commissions', CommissionController::class);
});


require __DIR__.'/auth.php';
