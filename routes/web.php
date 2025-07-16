<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\CourtBusinessController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\MatchDetailController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SubscriptionPlanController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamDetailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/subscription-plans', [SubscriptionPlanController::class, 'index']);

// Google Login
Route::get('auth/google', [SocialLoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialLoginController::class, 'handleGoogleCallback']);

// Facebook Login
Route::get('auth/facebook', [SocialLoginController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('auth/facebook/callback', [SocialLoginController::class, 'handleFacebookCallback']);

Route::resource('announcements', AnnouncementController::class);
Route::resource('activities', ActivityController::class);
Route::get('courts', [CourtController::class, 'index'])->name('courts.index');
Route::get('courts/{id}', [CourtController::class, 'show'])->name('courts.show');

Route::post('checkout/guest', [CheckoutController::class, 'guestIndex'])->name('checkout.guest.index');
Route::get('checkout/guest/reservation', [CheckoutController::class, 'guestReservation'])->name('checkout.guest.reservation');

Route::post('reservation/customer', [CheckoutController::class, 'guestSaveCustomer'])->name('guest.save.customer');
Route::get('reservation/guest/payment', [CheckoutController::class, 'guestPaymentIndex'])->name('reservation.guest.payment.index');
Route::post('reservation/guest/payment', [CheckoutController::class, 'guestMakePayment'])->name('reservation.guest.make.payment');
Route::get('reservation/payment/completed', [CheckoutController::class, 'paymentComplted'])->name('reservation.payment.completed');
Route::get('reservation/payment/failed', function(){
    return view('checkout.payment.failed');
})->name('reservation.payment.failed');

Route::resource('teams', TeamController::class);
Route::resource('users', UserController::class);
Route::resource('matches', MatchController::class);

Route::prefix('users/{id}')->name('users.')->group(function () {
    Route::get('profile', [UserDetailController::class, 'profile'])->name('profile');
    Route::get('teams', [UserDetailController::class, 'teams'])->name('teams');
    Route::get('matches', [UserDetailController::class, 'matches'])->name('matches');
    Route::get('activities', [UserDetailController::class, 'activities'])->name('activities');
    Route::get('announcements', [UserDetailController::class, 'announcements'])->name('announcements');
});

Route::prefix('matches/{id}')->name('matches.')->group(function () {
    Route::get('activities', [MatchDetailController::class, 'activities'])->name('activities');
    Route::get('announcements', [MatchDetailController::class, 'announcements'])->name('announcements');
    Route::get('profile', [MatchDetailController::class, 'profile'])->name('profile');
    Route::get('teams', [MatchDetailController::class, 'teams'])->name('teams');
});

Route::prefix('teams/{id}')->name('teams.')->group(function () {
    Route::get('activities', [TeamDetailController::class, 'activities'])->name('activities');
    Route::get('announcements', [TeamDetailController::class, 'announcements'])->name('announcements');
    Route::get('profile', [TeamDetailController::class, 'profile'])->name('profile');
    Route::get('players', [TeamDetailController::class, 'players'])->name('players');
    Route::get('matches', [TeamDetailController::class, 'matches'])->name('matches');

});

Route::resource('/courts', CourtController::class)->names('courts')->parameters([
    'courts' => 'id'
])->except(['store', 'update', 'destroy']);
Route::middleware('auth')->group(function () {
    Route::post('/teams/selected-players', [TeamController::class, 'updateSelectedPlayers'])->name('teams.selected-players');

    Route::post('checkout/user', [CheckoutController::class, 'userIndex'])->name('checkout.user.index');
    Route::get('checkout/user/reservation', [CheckoutController::class, 'userReservation'])->name('reservation.user.index');

    Route::get('reservation/user/payment', [CheckoutController::class, 'userPaymentIndex'])->name('reservation.user.payment.index');
    Route::post('reservation/user/payment', [CheckoutController::class, 'userMakePayment'])->name('reservation.user.make.payment');

    Route::prefix('me')->name('me.')->group(function () {
        Route::get('profile', [MeController::class, 'profile'])->name('profile');
        Route::get('teams', [MeController::class, 'teams'])->name('teams');
        Route::get('matches', [MeController::class, 'matches'])->name('matches');
        Route::get('activities', [MeController::class, 'activities'])->name('activities');
        Route::get('announcements', [MeController::class, 'announcements'])->name('announcements');
    });

    Route::resource('court-businesses', CourtBusinessController::class);
    Route::resource('/courts', CourtController::class)->names('courts')->parameters([
        'courts' => 'id'
    ])->except(['index', 'show']);

    Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('reservations/me', [ReservationController::class, 'me'])->name('reservations.me');
    Route::get('reservations/{id}', [ReservationController::class, 'show'])->name('reservation.show');
    Route::post('reservations', [ReservationController::class, 'store']);
    Route::resource('payments', PaymentController::class);
    Route::resource('refunds', RefundController::class);
    Route::resource('commissions', CommissionController::class);

});


require __DIR__.'/auth.php';
