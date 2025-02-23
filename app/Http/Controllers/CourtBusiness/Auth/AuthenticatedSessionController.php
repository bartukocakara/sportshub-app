<?php

namespace App\Http\Controllers\CourtBusiness\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('court-business.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Use the court_business guard to authenticate the user
        if (Auth::guard('court_business')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            // Redirect to intended page or dashboard
            return redirect()->intended(route('court_business.courts.index', absolute: false));
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Logout using the court_business guard
        Auth::guard('court_business')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('court-business.login');
    }
}
