<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;

//clients routes 

Route::get('/',function () {
   return view ('home');
});

//admin routes

Route::get('/admin/dashboard',function () {
   return view ('admin.dashboard');
});

//auth routes


//login

Route::get('login', [AuthController::class, 'getLogin'])->name('login');
//Route::post('login', [AuthController::class, 'postLogin']);

// register
Route::get('register', [AuthController::class, 'getRegister'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('post-register');