<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{

    /**
     * Redirect to google login.
     *
     * @return void
     */

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Get google callback.
     *
     * @return void
     */

    public function handleGoogleCallback()
    {
        $googleLogin = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'google_id' => $googleLogin->id,
        ], [
            'name' => $googleLogin->name,
            'email' => $googleLogin->email,
            'github_token' => $googleLogin->token,
            'github_refresh_token' => $googleLogin->refreshToken,
        ]);

        Auth::login($user);
        return redirect('/home');
    }
}
