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

Route::group(['prefix' => '/', 'middleware' => [Middleware::SITE_PROFILE_MIDDLEWARE, Middleware::AUTH_MIDDLEWARE]], function () {
    Route::get('/', function () {
        return view('index');
    });
    Route::get("/login", function () {
        return view('login');
    });
    Route::get("/register", function () {
        return view('register');
    });
    Route::get("/register_verify/{code}", function ($code) {
        return view('email.register_verify')->with("code",$code);
    });
});
