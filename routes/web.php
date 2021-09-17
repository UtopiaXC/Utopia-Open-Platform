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
    Route::get(WebUrl::INDEX, function () {
        return view('index');
    });
    Route::get(WebUrl::LOGIN, function () {
        return view('login');
    });
    Route::get(WebUrl::REGISTER, function () {
        return view('register');
    });
    Route::get(WebUrl::REGISTER_VERIFY . "/{code}", function ($code) {
        request()->attributes->add(["code" => $code]);
        return view('email.register_verify')->with("code", $code);
    });
    Route::get(WebUrl::ABOUT, function () {
        return view('about');
    });
    Route::get(WebUrl::PRIVACY_POLICY, function () {
        return view('privacy_policy');
    });
    Route::get(WebUrl::OPEN_SOURCE, function () {
        return view('open_source');
    });
    Route::get(WebUrl::OPEN_KEY, function () {
        return view('open_key');
    });
    Route::get(WebUrl::PREMIUM, function () {
        return view('premium');
    });
    Route::get(WebUrl::API_LIST . "/{group}", function ($group) {
        return view('api_list')->with($group);
    });
    Route::get(WebUrl::API_DETAIL."/{api_id}",function ($api_id){
        return view('api_detail')->with($api_id);
    });
});
