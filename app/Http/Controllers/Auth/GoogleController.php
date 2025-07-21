<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // Make sure to import your User model
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite; // Make sure to import Socialite facade
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // For logging errors

class GoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the callback from Google authentication.
     */
    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            // Get user information from Google
            $googleUser = Socialite::driver('google')->user();

            // Find user by Google ID or email
            $user = User::where('google_id', $googleUser->id)
                        ->orWhere('email', $googleUser->email)
                        ->first();

            if ($user) {
                // If user exists, update their Google ID and avatar if necessary
                // This handles cases where a user might have registered with email
                // and then later tries to log in with Google using the same email.
                if (is_null($user->google_id)) {
                    $user->google_id = $googleUser->id;
                    $user->save();
                }
                if ($user->avatar !== $googleUser->avatar) {
                    $user->avatar = $googleUser->avatar;
                    $user->save();
                }
            } else {
                // If user does not exist, create a new user
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'password' => bcrypt(uniqid()), // Assign a random password, as they won't use it for Google login
                ]);
            }

            // Log in the user
            Auth::login($user);

            // Redirect to the dashboard or intended page
            return redirect()->intended('/dashboard'); // Change '/dashboard' to your desired redirect path

        } catch (\Exception $e) {
            Log::error('Google login failed: ' . $e->getMessage());
            // Redirect to login with an error message
            return redirect('/login')->with('error', 'Unable to login with Google. Please try again.');
        }
    }
}
