<?php

namespace Database\Seeders;

use App\Models\Users\User;
use App\Models\Users\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use UserStatusEnum;
use UserTypeEnum;
use Webpatser\Uuid\Uuid;

class AddAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Throwable
     */
    public function run()
    {
        DB::beginTransaction();
        try {
            //以下添加默认管理员账户
            $user = new User();
            $user->id = Uuid::generate();
            $user->user_name = "admin";
            $user->user_email = "admin@admin.com";
            //默认密码Admin12345678
            $user->user_password = '$2y$10$lb4WYqFMVtR7vlZMnTi7jO0ROBXzkSRGDK0vrnk965RfQAIsgSpO.';
            $user->user_type = UserTypeEnum::ADMIN;
            $user->user_status = UserStatusEnum::NORMAL;
            $user->save();

            $user_profile = new UserProfile();
            $user_profile->id = Uuid::generate();
            $user_profile->user_id = $user->id;
            $user_profile->save();
        }catch (\Exception $e){
            DB::rollBack();
        }
        DB::commit();
    }
}
