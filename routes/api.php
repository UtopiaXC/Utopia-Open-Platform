<?php

use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\UserController;
use App\Http\Utils\R;
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

Route::get(ApiUrl::CAPTCHA, [CaptchaController::class, "getCaptcha"]);
Route::post(ApiUrl::USER . ApiUrl::REGISTER, [UserController::class, "register"]);
Route::post(ApiUrl::USER . ApiUrl::LOGIN, [UserController::class, "login"]);
Route::put(ApiUrl::USER . ApiUrl::LOGOUT, [UserController::class, "logout"]);

//暂时使用 用于Telegram消息推送
Route::group(['prefix' => '/', 'middleware' => [Middleware::AUTH_MIDDLEWARE]], function () {
    Route::post("/send_telegram", function (Request $request) {
        if (@!$request->get("token") || @!$request->get("message") || @!$request->get("bot_id") || @!$request->get("chat_id")) {
            return R::error(HTTP_CODE::NOT_ACCEPT_PARAMS_CONTENT_WRONG);
        }
        $disable_notification = false;
        if (@$request->get('$disable_notification') == true) {
            $disable_notification = true;
        }
        $response=Http::post('https://api.utopiaxc.com/sendTelegramMessage.php', [
            'token' => $request->get("token"),
            'message' => $request->get("message"),
            'bot_id' => $request->get("bot_id"),
            'chat_id' =>$request->get("chat_id"),
            'disable_notification' =>$disable_notification
        ]);
        return R::ok();
    });
});
