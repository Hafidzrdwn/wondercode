<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSocialAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SocialAuthServiceController extends Controller
{
    public function findOrCreateAccount($socialUser, $provider)
    {
        $social_account = UserSocialAccount::where('auth_type', $provider)
            ->where('social_id', $socialUser->getId())
            ->first();

        if ($social_account) {
            $user = $social_account->user;
        } else {
            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'username' => null,
                    'email' => $socialUser->getEmail(),
                    'password' => null,
                ]);
            }

            $user->socialAccounts()->create([
                'social_id' => $socialUser->getId(),
                'auth_type' => $provider,
            ]);
        }

        if (is_null($user->username)) {
            return redirect()->route('social.question', ['name' => $socialUser->getName(), 'email' => $socialUser->getEmail()]);
        } else {
            Auth::login($user, true);

            Alert::toast('Halo ' . $user->username . ', Anda berhasil masuk!', 'success');
            return redirect()->route('forum');
        }
    }

    public function question(Request $request)
    {

        if (!$request->query('email') || !$request->query('name')) {
            return redirect()->back();
        } else {
            $user = User::where('email', $request->query('email'))->first();

            if (!$user || $user->username) {
                return redirect()->back();
            }
        }

        return view('auth.question', [
            'name' => $request->query('name'),
            'email' => $request->query('email'),
        ]);
    }

    public function questionStore(Request $request)
    {
        $request->validate([
            'username' => 'required|alpha_dash|min:4|max:20|unique:users',
        ], [
            'required' => ':attribute tidak boleh kosong.',
            'alpha_dash' => ':attribute tidak valid.',
            'min' => ':attribute minimal :min karakter.',
            'max' => ':attribute maksimal :max karakter.',
            'unique' => ':attribute sudah terdaftar. Coba :attribute lain.'
        ]);

        $user = User::where('email', $request->query('email'))->first();
        $user->username = strtolower($request->username);
        $user->save();

        Auth::login($user, true);

        Alert::toast('Halo ' . $user->username . ', Anda berhasil masuk!', 'success');
        return redirect()->route('forum');
    }
}
