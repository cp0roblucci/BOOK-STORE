<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Auth\GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/home', function () {
    return view('homepage');
})->name('home');


// auth

// login
Route::get('login', [AuthController::class, 'getLogin'])->name('login');
Route::post('login', [AuthController::class, 'postLogin']);

// register
Route::get('register', [AuthController::class, 'getRegister'])->name('register');
Route::post('register', [AuthController::class, 'postRegister']);

// forgot password
Route::get('/forgot-password', [ResetPasswordController::class, 'getForgotPassword'])->name('forgot-password');

Route::post('/forgot-password', [ResetPasswordController::class, 'sendMail']);
Route::get('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset-password');
Route::post('/reset-password', [ResetPasswordController::class, 'reset']);


// logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// 403
Route::view('/403', '403')->name('403');


// google login
Route::get('/get-google-sign-in', [GoogleController::class, 'getGoogleSignIn'])->name('login-google');
Route::get('/callback', [GoogleController::class, 'loginCallback']);

// admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::post('logout', [AdminController::class, 'logout'])->name('admin-logout');

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');

    Route::post('profile', [AdminController::class, 'profile'])->name('admin-profile');

    Route::get('products', [AdminController::class, 'product'])->name('admin-product');

    Route::get('orders', [AdminController::class, 'order'])->name('admin-order');

    Route::get('categories', [AdminController::class, 'category'])->name('admin-categories');

    Route::get('users', [UserController::class, 'index'])->name('admin-index');
});

