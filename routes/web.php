<?php

use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\AccessoriesTypeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\FishController;
use App\Http\Controllers\PHController;
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
Route::get('/test', function () {
    return view('test');
});

Route::get('/', function () {
    return view('clients.homepage');
});

Route::get('/home', function () {
    return view('homepage');
})->name('home');

Route::get('/products_detail', function () {
    return view('products_detail');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/cart', function () {
    return view('clients/cart');
});

// Route::get('/layouts/header', function () {
//     return view('layouts.header');
// });

// Route::get('/layouts/footer', function () {
//     return view('layouts.footer');
// });

Route::get('/test', function () {
    return view('test');
});

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

    Route::get('accessories', [AdminController::class, 'accessories'])->name('admin-accessories');

    Route::get('fish', [AdminController::class, 'fish'])->name('admin-fish');

    Route::get('orders', [AdminController::class, 'order'])->name('admin-order');

    Route::get('categories', [AdminController::class, 'category'])->name('admin-categories');

    Route::get('users', [AdminController::class, 'users'])->name('admin-users');

    Route::get('profile', function () {
        return view('admin.profile');
    })->name('admin-profile');
    Route::post('profile', [UserController::class, 'editProfile'])->name('edit-profile');

    Route::get('change-password', function () {
        return view('admin.change-password');
    })->name('change-password');
    Route::post('change-password', [UserController::class, 'changePassword']);

    //  USER
    // new user
    Route::get('create-new-user', function() {
        return view('admin.new-user');
    })->name('new-user');
    Route::post('create-new-user', [UserController::class, 'createUser']);

    Route::get('users/{id}/edit', [UserController::class, 'editUser'])->name('edit-user');
    Route::post('users/{id}/edit', [UserController::class, 'updateUser']);

    Route::get('search-user', [UserController::class, 'searchByName'])->name('admin-search-user-by-name');

    Route::get('result-search-user', function() {
        return view('admin.result-search-user');
    });

    Route::post('delete-user', [UserController::class, 'delete'])->name('delete-user');

    // PRODUCT

    // accessories type
    Route::get('create-new-accessories-type', function() {
        return view('admin.new-accessories-type');
    })->name('new-accessories-type');
    Route::post('create-new-accessories-type', [AccessoriesTypeController::class, 'create']);

    // accessories
    Route::get('create-new-accessory', function() {
        return view('admin.new-accessory');
    })->name('new-accessory');
    Route::post('create-new-accessory', [AccessoriesController::class, 'create']);

    // new product
    Route::get('create-new-fish', function() {
        return view('admin.new-fish');
    })->name('new-fish');
    Route::post('create-new-fish', [FishController::class, 'create']);

    // new species
    Route::get('create-new-species', function() {
        return view('admin.new-species');
    })->name('new-species');
    Route::post('create-new-species', [SpeciesController::class, 'create']);

    // new ph
    Route::get('create-new-ph', function() {
        return view('admin.new-ph');
    })->name('new-ph');
    Route::post('create-new-ph', [PHController::class, 'create']);

    // new color
    Route::get('create-new-color', function() {
        return view('admin.new-color');
    })->name('new-color');
    Route::post('create-new-color', [ColorController::class, 'create']);


//  Statistics
    Route::get('/last-week', [StatisticsController::class, 'dataLastWeek']);
    Route::get('/last-seven-days', [StatisticsController::class, 'dataLastSevenDays']);
    Route::post('/period', [StatisticsController::class, 'dataPeriod']);
});

