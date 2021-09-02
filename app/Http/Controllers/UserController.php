<?php

namespace App\Http\Controllers;

use App\Http\Utils\R;
use App\Http\Utils\RedisAndCache;
use App\Models\Users\User;
use App\Models\Users\UserProfile;
use Exception;
use HTTP_CODE;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use RedisCacheKey;
use Webpatser\Uuid\Uuid;

class UserController extends Controller {
    function register(Request $request) {
        if (!CaptchaController::check_captcha($request->get("captcha"), $request->cookie(app()->getNamespace() . "session"))) {
            return R::error(HTTP_CODE::UNAUTHORIZED_CAPTCHA);
        }
        try {
            if (!$request->get("email") || !$request->get("user_name") || !$request->get("password")) {
                return R::error(HTTP_CODE::NOT_ACCEPT_PARAMS_CONTENT_WRONG);
            }
            $email = $request->get("email");
            $user_name = $request->get("user_name");
            $password = password_hash($request->get("password"), PASSWORD_DEFAULT);
            $user = User::query()
                ->where("user_name", $user_name)
                ->orWhere("user_name", $email)
                ->get();
            if (sizeof($user) != 0) {
                return R::error(HTTP_CODE::REFUSED_REGISTER_EXISTS);
            }
            $user = new User();
            $user->id = Uuid::generate();
            $user->user_name = $user_name;
            $user->user_email = $email;
            $user->user_password = $password;
            $user->user_type = \UserTypeEnum::NORMAL;
            $user->user_status = \UserStatusEnum::NOT_VERITY;
            $user_profile = new UserProfile();
            $user_profile->id = Uuid::generate();
            $user_profile->user_id = $user->id;
            DB::beginTransaction();
            $user->save();
            $user_profile->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return R::error(HTTP_CODE::INTERNAL_SERVER_ERROR);
        }
        return R::ok();
    }

    function login(Request $request) {
        if (!CaptchaController::check_captcha($request->get("captcha"), $request->cookie(app()->getNamespace() . "session"))) {
            return R::error(HTTP_CODE::UNAUTHORIZED_CAPTCHA);
        }
        $username = $request->get("user");
        $password = $request->get("password");
        if (!$username || !$password) {
            return R::error(HTTP_CODE::NOT_ACCEPT_PARAMS_CONTENT_WRONG);
        }
        $user = User::query()
            ->where("user_name", $username)
            ->orWhere("user_email", $username)
            ->get();
        if (sizeof($user) == 0) {
            return R::error(HTTP_CODE::REFUSED_LOGIN_NO_REGISTER);
        }
        if (!password_verify($password, $user[0]->user_password)) {
            return R::error(HTTP_CODE::REFUSED_LOGIN_WRONG, $user[0]->user_password);
        }
        $token = md5($user[0]->id . md5(microtime(true)));
        $cookie = Cookie::make(\CookieKey::USER_TOKEN, $token, 60 * 24 * 30);
        $expiredMinutes = 60 * 24 * 30;
        RedisAndCache::setWithExpire(RedisCacheKey::USER_TOKEN . $token, $user[0], $expiredMinutes);
        return R::ok()->withCookie($cookie);
    }
}
