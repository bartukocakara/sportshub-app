<?php

namespace App\Http\Controllers\CourtBusiness;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('court_business.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('court_business')->attempt($credentials)) {
            return redirect()->intended('/court-business/dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function logout()
    {
        Auth::guard('court_business')->logout();
        return redirect()->route('court_business.login');
    }
}
