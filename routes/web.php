<?php

use App\Http\Controllers\Admin\Auth\AuthAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Master\BlogController;
use App\Http\Controllers\Admin\Master\JawabanController;
use App\Http\Controllers\Admin\Master\PertanyaanController;
use App\Http\Controllers\Admin\Master\ProjectController;
use App\Http\Controllers\Admin\Master\UserController;
use App\Http\Controllers\Admin\master\UserMedsosController;
use App\Http\Controllers\Admin\master\UserProfileController;
use App\Http\Controllers\Auth\BasicAuthController;
use App\Http\Controllers\Auth\GithubAuthController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\SocialAuthServiceController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/forum', [ForumController::class, 'index'])->name('forum');

// AUTHENTICATION
Route::controller(BasicAuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::get('/register', 'register')->name('register');
        Route::post('/login', 'login')->name('login.auth');
        Route::post('/registration', 'registration')->name('registration');
        Route::get('/reload-captcha', 'reloadCaptcha')->name('reload-captcha');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });
});
Route::middleware('guest')->prefix('auth')->group(function () {
    // Google
    Route::get('/google/redirect', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
    Route::get('/google/callback', [GoogleAuthController::class, 'callback']);
    // Github
    Route::get('/github/redirect', [GithubAuthController::class, 'redirect'])->name('github.redirect');
    Route::get('/github/callback', [GithubAuthController::class, 'callback']);
    // Check and Add username
    Route::get('/social/question', [SocialAuthServiceController::class, 'question'])->name('social.question');
    Route::post('/social/question', [SocialAuthServiceController::class, 'questionStore'])->name('social.question.store');
});


Route::middleware('auth')->group(function () {

    // CLIENT
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');

    Route::get('/{user:username}', [ProfileController::class, 'profile'])->name('user.profile');
    Route::put('/{user:username}', [ProfileController::class, 'update'])->name('user.profile.update');
    Route::post('/{user:username}/editcover', [ProfileController::class, 'editCover'])->name('user.profile.editcover');
    Route::post('/{user:username}/editprofileimage', [ProfileController::class, 'editProfileImage'])->name('user.profile.editprofileimage');
    // END CLIENT

    // ADMIN
    Route::get('/{user:username}', [ProfileController::class, 'profile'])->name('user.profile');
    // Auth Admin 
    Route::post('/admin', [AuthAdminController::class, "login"])->name('auth.admin.login');

    // Admin Pages
    Route::prefix('admin')->group(function () {

        Route::resource('dashboard', DashboardController::class);
        Route::resource('user', UserController::class);
        Route::resource('user-profile', UserProfileController::class);
        Route::resource('user-medsos', UserMedsosController::class);
    });
    // END ADMIN

});
// Route::get('/admin', [AuthAdminController::class, "index"])->name('auth.admin')->middleware('guest');

// Admin Pages
// Route::prefix('admin')->group(function () {

//     Route::resource('dashboard', DashboardController::class);
//     Route::resource('user', UserController::class);
//     Route::resource('user-profile', UserProfileController::class);
//     Route::resource('user-medsos', UserMedsosController::class);
//     Route::resource('jawaban', JawabanController::class);
//     Route::resource('pertanyaan', PertanyaanController::class);
//     Route::resource('blog', BlogController::class);
//     Route::resource('project', ProjectController::class);
// });
