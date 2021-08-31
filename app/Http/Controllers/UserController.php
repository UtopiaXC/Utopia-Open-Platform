<?php

namespace App\Http\Controllers;

use App\Http\Utils\R;
use App\Models\Users\User;
use App\Models\Users\UserProfile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;

class UserController extends Controller
{
    function register(Request $request)
    {
        if (!CaptchaController::check_captcha($request->get("captcha"), $request->cookie(app()->getNamespace() . "session"))) {
            return R::error("403001","验证码错误");
        }
        try {
            $email = $request->get("email");
            $user_name=$request->get("user_name");
            $password=password_hash($request->get("password"),PASSWORD_DEFAULT);
            $user=User::query()
                ->where("user_name",$user_name)
                ->orWhere("user_name",$email)
                ->get();
            if (sizeof($user)!=0){
                return R::error("403002","该邮箱或用户名已被注册");
            }
            $user=new User();
            $user->id=Uuid::generate();
            $user->user_name=$user_name;
            $user->user_email=$email;
            $user->user_password=$password;
            $user->user_type=\UserTypeEnum::NORMAL;
            $user->user_status=\UserStatusEnum::NOT_VERITY;
            $user_profile=new UserProfile();
            $user_profile->id=Uuid::generate();
            $user_profile->user_id=$user->id;
            DB::beginTransaction();
            $user->save();
            $user_profile->save();
            DB::commit();
        }catch (Exception $e){
            DB::rollBack();
            return R::error("500001","用户数据保存错误");
        }
        return R::ok();
    }

}
