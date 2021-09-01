<?php

namespace Database\Seeders;

use App\Models\System\SiteProfile;
use DB;
use Illuminate\Database\Seeder;

class SiteProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Throwable
     */
    public function run()
    {
        DB:: beginTransaction();
        try {
            //网站标题
            $site_profile=new SiteProfile();
            $site_profile->id=\Uuid::generate();
            $site_profile->profile_type=\SiteProfileTypeEnum::WEB_TITLE;
            $site_profile->profile_description=trans('site_profile_description.'.\SiteProfileTypeEnum::WEB_TITLE);
            $site_profile->profile_content=\DefaultSiteProfile::WEB_TITLE;
            $site_profile->save();

            //网站地址
            $site_profile=new SiteProfile();
            $site_profile->id=\Uuid::generate();
            $site_profile->profile_type=\SiteProfileTypeEnum::SITE_URL;
            $site_profile->profile_description=trans('site_profile_description.'.\SiteProfileTypeEnum::SITE_URL);
            $site_profile->profile_content=\DefaultSiteProfile::SITE_URL;
            $site_profile->save();

            //网站注脚
            $site_profile=new SiteProfile();
            $site_profile->id=\Uuid::generate();
            $site_profile->profile_type=\SiteProfileTypeEnum::WEB_FOOTER;
            $site_profile->profile_description=trans('site_profile_description.'.\SiteProfileTypeEnum::WEB_FOOTER);
            $site_profile->profile_content=\DefaultSiteProfile::WEB_FOOTER;
            $site_profile->save();

        }catch (\Exception $e){
            DB::rollBack();
        }
        DB::commit();
    }
}
