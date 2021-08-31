<?php

namespace App\Http\Controllers;

use App\Http\Utils\R;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function register(Request $request)
    {
        if (!CaptchaController::check_captcha($request->get("captcha"), $request->cookie(app()->getNamespace() . "session"))) {
            return R::error("403001","验证码错误");
        }


        return R::ok();
    }

}
