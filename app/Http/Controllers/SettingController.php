<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->with('profile')->first();
        return view('client.settings.index', compact('user'));
    }
}
