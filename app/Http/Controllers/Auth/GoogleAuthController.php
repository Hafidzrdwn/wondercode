<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Auth\SocialAuthServiceController;

use function PHPUnit\Framework\isNull;

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
