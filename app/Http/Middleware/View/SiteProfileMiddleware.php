<?php

namespace App\Http\Middleware\View;

use App\Models\System\SiteProfile;
use Cache;
use Closure;
use HeaderKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Predis\Connection\ConnectionException;
use RedisCacheKey;

class SiteProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        //通过Redis获取网站配置信息，如果没有则存入Redis
        try {
            $site_profile = json_decode(Redis::get(RedisCacheKey::SITE_PROFILE), true);
        } catch (ConnectionException $e) {
            $site_profile = json_decode(Cache::get(RedisCacheKey::SITE_PROFILE), true);
        }
        if (!$site_profile) {
            $site_profile = SiteProfile::all();
            try {
                Redis::set(RedisCacheKey::SITE_PROFILE, $site_profile);
            } catch (ConnectionException $e) {
                Cache::put(RedisCacheKey::SITE_PROFILE, $site_profile);
            }
        }
        $profiles = [];
        foreach ($site_profile as $profile) {
            $profiles += [$profile['profile_type'] => $profile['profile_content']];
        }
        $request->attributes->add([HeaderKey::SITE_PROFILE => $profiles]);
        return $next($request);
    }
}
