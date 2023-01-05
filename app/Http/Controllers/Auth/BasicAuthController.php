<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
        'captcha' => 'Kode captcha tidak valid.'
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

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
