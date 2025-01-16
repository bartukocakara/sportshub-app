<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\CourtBusinessController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

// Google Login
Route::get('auth/google', [SocialLoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialLoginController::class, 'handleGoogleCallback']);

// Facebook Login
Route::get('auth/facebook', [SocialLoginController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('auth/facebook/callback', [SocialLoginController::class, 'handleFacebookCallback']);

Route::resource('announcements', AnnouncementController::class);
Route::get('courts', [CourtController::class, 'index'])->name('courts.index');
Route::get('courts/{id}', [CourtController::class, 'show'])->name('courts.show');

Route::post('checkout/guest', [CheckoutController::class, 'guestIndex'])->name('checkout.guest.index');
Route::get('checkout/guest/reservation', [CheckoutController::class, 'guestReservation'])->name('checkout.guest.reservation');

Route::post('reservation/customer', [CheckoutController::class, 'guestSaveCustomer'])->name('guest.save.customer');
Route::get('reservation/guest/payment', [CheckoutController::class, 'guestPaymentIndex'])->name('reservation.guest.payment.index');
Route::post('reservation/guest/payment', [CheckoutController::class, 'guestMakePayment'])->name('reservation.guest.make.payment');
Route::get('reservation/payment/completed', [CheckoutController::class, 'paymentComplted'])->name('reservation.payment.completed');

Route::middleware('auth')->group(function () {
    Route::post('checkout/user', [CheckoutController::class, 'userIndex'])->name('checkout.user.index');
    Route::get('checkout/user/reservation', [CheckoutController::class, 'userReservation'])->name('reservation.user.index');

    Route::get('reservation/user/payment', [CheckoutController::class, 'userPaymentIndex'])->name('reservation.user.payment.index');
    Route::post('reservation/user/payment', [CheckoutController::class, 'userMakePayment'])->name('reservation.user.make.payment');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('court-businesses', CourtBusinessController::class);
    Route::resource('courts', CourtController::class)->except(['index', 'show']);
    Route::resource('reservations', ReservationController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('refunds', RefundController::class);
    Route::resource('commissions', CommissionController::class);
});


require __DIR__.'/auth.php';
