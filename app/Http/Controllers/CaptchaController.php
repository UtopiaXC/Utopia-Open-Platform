<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Utils\CustomCaptcha;
use App\Http\Utils\R;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Mews\Captcha\Captcha;

class CaptchaController extends Controller{
    function getCaptcha(Request $request, Captcha $captchaBuilder)
    {
        //获取laravel的session token，这里的思想是通过缓存token与验证码值来验证以避免重复提交同一hash问题
        $key = $request->cookie(app()->getNamespace() . "session");
        //创建自定义验证码对象，需要将构建器传入
        $captcha = new CustomCaptcha($captchaBuilder);
        //设置过期时间。我设置了两分钟
        $expiredAt = now()->addMinute(2);
        //将验证码值，session token放入缓存并设置过期时间
        Cache::put($key, ['captcha' => $captcha->getCode()], $expiredAt);
        //构建返回数组，包括有效期截止时间和BASE64格式图片
        $result = [
            'expired_at' => $expiredAt->toDateTimeString(),
            'captcha_img' => $captcha->getImg()
        ];
        //返回201 Created
        return R::ok($result);
    }

    //验证用户提交的验证码，返回值bool（私有方法）
    static function check_captcha($captcha,$session):bool{
        //通过传入的session获取缓存中的验证码对象，不存在则返回验证失败
        $captchaData = Cache::get($session);
        Cache::forget($session);
        if ($captchaData == null) {
            return false;
        }
        //判断传入的验证码与缓存是否相等
        if ($captcha == $captchaData['captcha']){
            return true;
        }else{
            return false;
        }
    }
}
