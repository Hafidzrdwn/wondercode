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
        'unique' => ':attribute sudah terdaftar. Coba :attribute lain.',
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
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6',
            'captcha' => 'required|captcha'
        ], $this->msg);

        User::create([
            'username' => strtolower($validatedData['username']),
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ]);

        return redirect()->route('login')->with('success', '<strong>Pendaftaran akun berhasil!</strong> silahkan masuk.');
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
        if ($this->checkSocialAccounts($credentials) > 0) {
            return redirect()->back()->with('error', 'Sepertinya anda sign up menggunakan <strong>Social Login</strong>. Harap login menggunakan <strong>Social Login</strong> dimana akun anda dibuat.');
        }

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
            return redirect()->intended('forum');
        }

        return redirect()->route('login')->with('error', '<strong>Gagal masuk</strong>, silahkan coba lagi.');
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

        return redirect()->route('login')->with('success', '<strong>Sampai jumpa</strong>, Anda telah keluar.');
    }

    private function checkSocialAccounts($user)
    {
        $param = (array_key_exists('email', $user)) ? 'email' : 'username';
        $user = User::where($param, $user[$param])->first();

        return $user->socialAccounts->count();
    }
}
