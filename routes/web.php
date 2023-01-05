<?php

use App\Http\Controllers\Auth\BasicAuthController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomeController;
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

Route::controller(BasicAuthController::class)->group(function () {

    Route::middleware('auth')->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });

    Route::middleware('guest')->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::get('/register', 'register')->name('register');
        Route::post('/registration', 'registration')->name('registration');
        Route::post('/login', 'login')->name('login.auth');
        Route::get('/reload-captcha', 'reloadCaptcha')->name('reload-captcha');
    });
});
