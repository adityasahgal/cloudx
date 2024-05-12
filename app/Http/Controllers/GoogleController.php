<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
            $finduser = User::where('email', $user->email)->first();
            if (!$finduser){
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => encrypt
                    ('123456dummy')
                ]);

                Auth::login($newUser);
                return redirect('/dashboard');
            }else{
                Auth::login($finduser);
                return redirect('/dashboard');
                
            }
        } catch (\Exception $e) {
            return redirect('/auth/google');
        }
    }
}
