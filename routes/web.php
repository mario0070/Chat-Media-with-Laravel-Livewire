<?php

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

Route::get('/',[App\Http\Controllers\UsersController::class,"login"])->name("login")->middleware("isLogin");

Route::post('/',[App\Http\Controllers\UsersController::class,"loginUser"])->name("loginUser");

Route::get('/logout',[App\Http\Controllers\UsersController::class,"logout"])->name("logout");

Route::get('/register',[App\Http\Controllers\UsersController::class,"register"])->name("register")->middleware("isLogin");

Route::post('/registerUser',[App\Http\Controllers\UsersController::class,"registerUser"])->name("registerUser");

Route::get('/dashboard',[App\Http\Controllers\UsersController::class,"dashboard"])->name("dashboard")->middleware("notLogin");
