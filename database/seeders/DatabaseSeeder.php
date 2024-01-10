<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->delete();
        DB::table('user_profiles')->delete();

        $users = [
            ['id' => 1, 'username' => 'Admin_1', 'email' => 'admin1@admin.com', 'password' => Hash::make('admin123'), 'is_admin' => 1],
            ['id' => 2, 'username' => 'Admin_2', 'email' => 'admin2@admin.com', 'password' => Hash::make('admin123'), 'is_admin' => 1],
            ['id' => 3, 'username' => 'Dhamar Adhi', 'email' => 'dhamar@gmail.com', 'password' => Hash::make('12345678'), 'is_admin' => 0],
            ['id' => 4, 'username' => 'Hafidz Ridwan', 'email' => 'haped@gmail.com', 'password' => Hash::make('12345678'), 'is_admin' => 0],
            ['id' => 5, 'username' => 'Firta Arie', 'email' => 'firta@gmail.com', 'password' => Hash::make('12345678'), 'is_admin' => 0],
        ];

        User::insert($users);

        $profiles = [
            ['id' => 1, 'user_id' => 1, 'name' => null, 'instance' => null, 'job' => null, 'address' => null, 'phone' => null, 'avatar' => 'profiles/default.jpg', 'cover_image' => 'cover.webp', 'link_web' => null, 'bio' => null, 'viewers' => 0],
            ['id' => 2, 'user_id' => 2, 'name' => null, 'instance' => null, 'job' => null, 'address' => null, 'phone' => null, 'avatar' => 'profiles/default.jpg', 'cover_image' => 'cover.webp', 'link_web' => null, 'bio' => null, 'viewers' => 0],
            ['id' => 3, 'user_id' => 3, 'name' => null, 'instance' => null, 'job' => null, 'address' => null, 'phone' => null, 'avatar' => 'profiles/default.jpg', 'cover_image' => 'cover.webp', 'link_web' => null, 'bio' => null, 'viewers' => 0],
            ['id' => 4, 'user_id' => 4, 'name' => null, 'instance' => null, 'job' => null, 'address' => null, 'phone' => null, 'avatar' => 'profiles/default.jpg', 'cover_image' => 'cover.webp', 'link_web' => null, 'bio' => null, 'viewers' => 0],
            ['id' => 5, 'user_id' => 5, 'name' => null, 'instance' => null, 'job' => null, 'address' => null, 'phone' => null, 'avatar' => 'profiles/default.jpg', 'cover_image' => 'cover.webp', 'link_web' => null, 'bio' => null, 'viewers' => 0],
        ];

        UserProfile::insert($profiles);
    }
}
