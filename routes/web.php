<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/signin', function () {
    return view('signin');
});
Route::get('/signup', function () {
    return view('signup');
});


Route::prefix('admin')->group(function() {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::post('account', [AdminController::class, 'account'])->name('admin-account');
    Route::get('products', [AdminController::class, 'product'])->name('admin-product');
    Route::get('users', [AdminController::class, 'user'])->name('admin-user');
});
