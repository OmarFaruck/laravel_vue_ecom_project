<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
           $githubUser = Socialite::driver($provider)->user(); // ✅ FIX

    $user = User::updateOrCreate([
        'email' => $githubUser->email,
    ], [
        'name' => $githubUser->name ?? $githubUser->nickname ?? 'User',
        'password' => bcrypt(Str::random(24)),
    ]);

    Auth::login($user);

    return redirect('/');
    }
}
