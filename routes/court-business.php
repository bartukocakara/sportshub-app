<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CourtBusiness\AccountController;
use App\Http\Controllers\CourtBusiness\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CourtBusiness\CourtController;
use Illuminate\Support\Facades\Route;

Route::prefix('court-business')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('court-business.auth.login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('court-business.auth.login.store');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('court-business.auth.logout');

    Route::middleware('auth:court_business')->group(function () {
        Route::get('/account-settings', [AccountController::class, 'index'])->name('court_business.account.settings');
        Route::get('/account-settings/personal-info', [AccountController::class, 'personalInfo'])->name('court_business.account.personal-info');
        Route::get('/account-settings/security', [AccountController::class, 'security'])->name('court_business.account.security');
        Route::get('/account-settings/payments', [AccountController::class, 'payments'])->name('court_business.account.payments');
        Route::get('/account-settings/notifications', [AccountController::class, 'notifications'])->name('court_business.account.notifications');
        Route::get('/account-settings/privacy', [AccountController::class, 'privacy'])->name('court_business.account.privacy');
        Route::get('/account-settings/taxes', [AccountController::class, 'taxes'])->name('court_business.account.taxes');
        Route::get('/account-settings/travel-preferences', [AccountController::class, 'travelPreferences'])->name('court_business.account.travel-preferences');
        Route::get('/account-settings/credits-coupons', [AccountController::class, 'creditsCoupons'])->name('court_business.account.credits-coupons');
        Route::get('/account-settings/professional-tools', [AccountController::class, 'professionalTools'])->name('court_business.account.professional-tools');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('court_business.dashboard');
        Route::resource('/courts', CourtController::class)->names('court_business.courts')->parameters([
            'courts' => 'id'
        ]);
    });
});
