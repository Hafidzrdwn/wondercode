<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthAdminController extends Controller
{
    public function index(){
        return view('admin.auth.login');
    }

    public function login(Request $request){
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        if(Auth::attempt($validatedData)){
            $request->session()->regenerate();
            
            $user = User::where(["email" => $request->email])->first();
            Auth::login($user, true);
            Auth::logoutOtherDevices($request->password);

            if($user->is_admin) {
                Alert::toast('Halo ' . $user->username . ', Anda berhasil masuk!', 'success');
                return redirect()->route('dashboard.index');
            } else {
                return redirect()->route('login');
            }

        }

        return redirect()->route('login')->with('error', '<strong>Gagal masuk</strong>, silahkan coba lagi.');
    }
}
