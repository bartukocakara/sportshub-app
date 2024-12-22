<?php

use App\Http\Controllers\CourtBusiness\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('court-business')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('court_business.login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('court_business.logout');

    Route::middleware('auth:court_business')->group(function () {
        Route::get('/dashboard', function () {
            return view('court-business.dashboard.index');
        })->name('court_business.dashboard');
    });
});
