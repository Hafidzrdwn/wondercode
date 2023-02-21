<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(User $user)
    {
        $user = $user->load('profile');
        return view('client.user.index', compact('user'));
    }
}
