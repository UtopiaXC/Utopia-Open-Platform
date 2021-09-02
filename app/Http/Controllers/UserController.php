<?php

namespace App\Http\Controllers;

use App\Http\Utils\R;
use App\Http\Utils\RedisAndCache;
use App\Mail\RegisterVerifyLinkMail;
use App\Models\Users\User;
use App\Models\Users\UserProfile;
use Exception;
use HTTP_CODE;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Mail;
use RedisCacheKey;
use Webpatser\Uuid\Uuid;

class UserController extends Controller {
    /**
     * @throws \Throwable
     */
    function register(Request $request) {
        if (!CaptchaController::check_captcha($request)) {
            return R::error(HTTP_CODE::UNAUTHORIZED_CAPTCHA);
        }
        try {
            if (!$request->get(\FormKey::EMAIL) || !$request->get(\FormKey::EMAIL) || !$request->get(\FormKey::PASSWORD)) {
                return R::error(HTTP_CODE::NOT_ACCEPT_PARAMS_CONTENT_WRONG);
            }
            $email = $request->get(\FormKey::EMAIL);
            $user_name = $request->get(\FormKey::USER_NAME);
            $password = password_hash($request->get(\FormKey::PASSWORD), PASSWORD_DEFAULT);
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
            $code = md5(Uuid::generate());
            $link = env("APP_URL") . \WebUrl::REGISTER_VERIFY . "/" . $code;
            R::ok(RedisAndCache::setWithExpire(RedisCacheKey::REGISTER_VERIFY . $code, $user->id, 15));
            Mail::to($email)->send(new RegisterVerifyLinkMail($link, $user_name));
        } catch (Exception $e) {
            DB::rollBack();
            return R::error(HTTP_CODE::INTERNAL_SERVER_ERROR);
        }
        return R::ok();
    }

    function login(Request $request) {
        if (!CaptchaController::check_captcha($request)) {
            return R::error(HTTP_CODE::UNAUTHORIZED_CAPTCHA);
        }
        $username = $request->get(\FormKey::USER);
        $password = $request->get(\FormKey::PASSWORD);
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
        $user_profile = UserProfile::query()->where("user_id", $user[0]->id)->get()[0];
        $token = md5($user[0]->id . md5(microtime(true)));
        $cookie = Cookie::make(env("APP_NAME") . \CookieKey::USER_TOKEN, $token, 60 * 24 * 30);
        $expiredMinutes = 60 * 24 * 30;
        RedisAndCache::setWithExpire(RedisCacheKey::USER_TOKEN . $token, $user[0], $expiredMinutes);
        RedisAndCache::setWithExpire(RedisCacheKey::USER_PROFILE . $token, $user_profile, $expiredMinutes);
        return R::ok()->withCookie($cookie);
    }

    function logout(Request $request) {
        $token = $request->cookie(env("APP_NAME").\CookieKey::USER_TOKEN);
        $cookie = Cookie::forget(env("APP_NAME") . \CookieKey::USER_TOKEN);
        if (!$token) {
            return R::ok()->withCookie($cookie);
        }
        if (RedisAndCache::forget(RedisCacheKey::USER_TOKEN . $token) && RedisAndCache::forget(RedisCacheKey::USER_PROFILE . $token,)) {
            return R::ok()->withCookie($cookie);
        } else {
            return R::error(HTTP_CODE::INTERNAL_SERVER_ERROR);
        }
    }
}
