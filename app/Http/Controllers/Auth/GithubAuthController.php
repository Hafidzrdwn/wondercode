<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;

class GithubAuthController extends Controller
{
    public function redirect(){

        return Socialite::driver('github')->redirect();

    }

    public function callback(){

        try {

            $github_user = Socialite::driver('github')->user();
            $checkEmail = User::where('email', $github_user->getEmail())->first();

            if($checkEmail) {
                User::find($checkEmail->id)->update(
                    [
                        'social_id'=> $github_user->getId(),
                        'auth_type'=>'github'
                    ]);
                Auth::login($checkEmail);

                Alert::toast('Anda Telah Login', 'success');
                return redirect()->route('home');
            } else {
                $new_user = User::create([
                    'username' => $github_user->getName(),
                    'email' => $github_user->getEmail(),
                    'password' => null,
                    'social_id' => $github_user->getId(),
                    'auth_type' => 'github'
                ]);

                Auth::login($new_user);
                
                Alert::toast('Anda Telah Login', 'success');
                return redirect()->route('home');
            }


        } catch (\Throwable $th) {
            dd('Something wrong' .$th->getMessage());
        }

    }
}
