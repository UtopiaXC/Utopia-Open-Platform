<?php

use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get(ApiUrl::CAPTCHA,[CaptchaController::class,"getCaptcha"]);
Route::post(ApiUrl::USER.ApiUrl::REGISTER, [UserController::class,"register"]);
Route::post(ApiUrl::USER.ApiUrl::LOGIN,[UserController::class,"login"]);
