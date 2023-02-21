<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSocialAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
                    'password' => Hash::make(env('PASSWORD_GENERATE_SOCIAL')),
                ]);
            } else {
                return redirect()->route('login')->with('error', 'Anda sudah pernah membuat akun dengan <strong>Email / Username</strong> tersebut. <br>Harap <strong>login</strong> kembali!');
            }

            $user->socialAccounts()->create([
                'social_id' => $socialUser->getId(),
                'auth_type' => $provider,
            ]);
        }

        if (!$user->profile) {
            $user->profile()->create([
                'name' => $socialUser->getName(),
                'avatar' => $socialUser->getAvatar(),
            ]);
        }

        if (is_null($user->username)) {
            return redirect()->route('social.question', ['name' => $socialUser->getName(), 'email' => $socialUser->getEmail()]);
        } else {
            return $this->login_process($user);
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
            'lokasi' => 'required',
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

        $user->profile()->update([
            'address' => $request->lokasi
        ]);

        return $this->login_process($user);
    }

    public function login_process($data)
    {
        request()->session()->regenerate();

        Auth::login($data, true);
        Auth::logoutOtherDevices(env('PASSWORD_GENERATE_SOCIAL'));

        Alert::toast('Halo ' . $data->username . ', Anda berhasil masuk!', 'success');
        return redirect()->route('forum');
    }
}
