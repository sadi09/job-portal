<?php

namespace App\Http\Controllers;

use App\Helper\JwtToken;
use App\Models\Employer;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Obtain the user information from Google
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Check if the user already exists
        $existingUser = Employer::where('email', $googleUser->email)->first();


        if ($existingUser) {
            $token = JwtToken::CreateToken($existingUser->email, $existingUser->id, "employer");
        } else {
            // Create a new user
            $user = new Employer();
            $user->company_name = $googleUser->name;
            $user->email = $googleUser->email;
            // Additional fields as needed
            $user->save();

            $token = JwtToken::CreateToken($googleUser->email, $user->id, "employer");
        }

        return redirect(route('employer-profile'))->cookie('token', $token, time() + 60 * 24 * 30);
    }
}
