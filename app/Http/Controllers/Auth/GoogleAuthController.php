<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;

class GoogleAuthController extends Controller
{
    public function redirect(){

        return Socialite::driver('google')->redirect();

    }

    public function callback(){

        try {
            $google_user = Socialite::driver('google')->user();
            $checkEmail = User::where('email', $google_user->getEmail())->first();

            if($checkEmail) {
                User::find($checkEmail->id)->update(
                    [
                        'social_id'=> $google_user->getId(),
                        'auth_type'=>'google'
                    ]);
                Auth::login($checkEmail);
                
                Alert::toast('Anda Telah Login', 'success');    
                return redirect()->route('home');
            } else {
                $new_user = User::create([
                    'username' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'password' => null,
                    'social_id' => $google_user->getId(),
                    'auth_type' => 'google'
                ]);

                Auth::login($new_user);

                Alert::toast('Anda Telah Login', 'success');
                return redirect()->route('home');
            }

        } catch (\Throwable $th) {
            dd('Something Wrong'. $th->getMessage());
        }

    }
}
