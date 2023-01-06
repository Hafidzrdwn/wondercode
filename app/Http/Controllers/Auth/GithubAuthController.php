<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class GithubAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {

        try {
            $user = Socialite::driver('github')->user();
        } catch (\Throwable $th) {
            dd('Something wrong' . $th->getMessage());
        }

        $social_service = new SocialAuthServiceController();
        return $social_service->findOrCreateAccount($user, 'github');
    }
}
