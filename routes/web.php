<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Admin\AdminController;

//clients routes 

Route::get('/',function () {
   return view ('home');
});
Route::view('/403', '403')->name('403');
//admin routes



// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
//    Route::get('admin/adminhome',[AdminController::class,'getAdminPage'])->name('adminhome');
// });
//auth routes
Route::group(['middleware' => 'admin'], function () {
   Route::get('adminhome',[AdminController::class,'getAdminPage'])->name('adminhome');
});

//login

Route::get('login', [AuthController::class, 'getLogin'])->name('login');
Route::post('login', [AuthController::class, 'postLogin']);

// register
Route::get('register', [AuthController::class, 'getRegister'])->name('register');
Route::post('register', [AuthController::class, 'postRegister']);