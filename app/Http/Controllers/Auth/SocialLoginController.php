<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google Callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->loginOrCreateUser($user, 'google');
    }

    // Redirect to Facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Handle Facebook Callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $this->loginOrCreateUser($user, 'facebook');
    }

    // Login or Create User
    private function loginOrCreateUser($socialUser, $provider)
    {
        $user = User::updateOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'first_name' => $socialUser->getName(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'email_verified_at' => now(),
            ]
        );

        Auth::login($user);

        return redirect()->route('home');
    }
}
