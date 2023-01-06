<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {

        try {
            $user = Socialite::driver('google')->user();
        } catch (\Throwable $th) {
            dd('Something Wrong' . $th->getMessage());
        }

        $social_service = new SocialAuthServiceController();
        return $social_service->findOrCreateAccount($user, 'google');
    }
}
