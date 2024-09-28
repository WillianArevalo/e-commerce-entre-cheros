<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();
            if ($findUser) {
                Auth::login($findUser);
                return redirect('/');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'username' => $user->name,
                    'last_name' => $user->name,
                    "google_profile" => $user->avatar,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => Hash::make('password')
                ]);
                Auth::login($newUser);
                return redirect('/');
            }
        } catch (\Exception $e) {
            return redirect("/login")->with("error", "Google login failed. Error: " . $e->getMessage());
        }
    }
}
