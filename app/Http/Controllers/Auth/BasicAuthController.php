<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class BasicAuthController extends Controller
{
    protected $msg = [
        'required' => ':attribute tidak boleh kosong.',
        'alpha_dash' => ':attribute tidak valid.',
        'min' => ':attribute minimal :min karakter.',
        'max' => ':attribute maksimal :max karakter.',
        'unique' => ':attribute sudah terdaftar.',
        'email' => ':attribute tidak valid.',
        'captcha' => 'Kode captcha tidak valid.',
        'usernameEmail.required' => 'Username atau email tidak boleh kosong.'
    ];

    public function index()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registration(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|alpha_dash|min:4|max:20|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'captcha' => 'required|captcha'
        ], $this->msg);

        User::create([
            'username' => strtolower($validatedData['username']),
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ]);

        Alert::toast('Pendaftaran akun berhasil, silahkan masuk.', 'success');
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'usernameEmail' => 'required',
            'password' => 'required|min:6',
        ], $this->msg);

        unset($credentials['usernameEmail']);
        $credentials[$this->getField($request->usernameEmail)] = $request->usernameEmail;

        $remember = ($request->has('remember')) ? true : false;

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = User::where(
                ["email" => $request->usernameEmail]
            )->orWhere(
                ["username" => $request->usernameEmail]
            )->first();
            Auth::login($user, $remember);
            Auth::logoutOtherDevices($request->password);

            Alert::toast('Halo ' . $user->username . ', Anda berhasil masuk!', 'success');
            return redirect()->intended();
        }

        Alert::toast('Gagal masuk, silahkan coba lagi.', 'error');
        return redirect()->route('login');
    }

    private function getField($req)
    {
        $field = filter_var($req, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        return $field;
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        Alert::toast('Anda telah berhasil keluar.', 'success');

        return redirect()->route('login');
    }
}
