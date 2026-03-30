<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')
            ->stateless()
            ->redirect();
    }

    public function handleGithubCallback()
    {
        try {
            $githubUser = Socialite::driver('github')->stateless()->user();

            $user = User::updateOrCreate(
                ['email' => $githubUser->getEmail()],
                [
                    'name'      => $githubUser->getName() ?? $githubUser->getNickname(),
                    'password'  => bcrypt(\Illuminate\Support\Str::random(32)),
                    'github_id' => $githubUser->getId(),
                    'avatar'    => $githubUser->getAvatar(),
                ]
            );

            Auth::login($user);

            return redirect()->route('dashboard');

        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Error al autenticar con GitHub.');
        }
    }
}