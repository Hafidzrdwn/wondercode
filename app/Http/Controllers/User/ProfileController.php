<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function profile(User $user)
    {
        $user = $user->load('profile');
        return view('client.user.index', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $type = $request->query('type');

        if ($type == 'additional') {

            $user->profile()->update([
                'gender' => $request->gender,
                'instance' => $request->instance,
                'phone' => $request->phone,
                'link_web' => $request->link_web,
            ]);

            return response()->json([
                'status' => true,
                'data' => $user->profile
            ]);
        }
    }

    public function editCover(User $user, Request $request)
    {
        $storage_path = '/covers/' . $user->username;
        if (Storage::exists($storage_path)) {
            Storage::deleteDirectory($storage_path);
        }

        $path = $request->file('cover_image')->store('/covers/' . $user->username . '/');

        $user->profile()->update([
            'cover_image' => $path
        ]);

        Session::flash('success', 'Gambar Sampul Anda <strong>Berhasil diperbarui!</strong>');

        return response()->json([
            'path' => $path
        ]);
    }

    public function editProfileImage(User $user, Request $request)
    {
        $storage_path = 'profiles/' . $user->username . '/';
        $image_parts = explode(";base64,", $request->image);
        $image_type = explode("image/", $image_parts[0])[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imageName = Str::random(30) . date('Y-m-d') . ".{$image_type}";
        $imageFullPath = $storage_path . $imageName;

        if (Storage::exists($storage_path)) {
            Storage::deleteDirectory($storage_path);
        }

        mkdir(storage_path('app/public/' . $storage_path), 0777, true);
        file_put_contents(storage_path('app/public/' . $imageFullPath), $image_base64);

        $user->profile()->update([
            'avatar' => $imageFullPath,
        ]);

        Session::flash('success', 'Foto Profil Anda <strong>Berhasil diperbarui!</strong>');

        return response()->json([
            'path' => $imageFullPath
        ]);
    }
}
