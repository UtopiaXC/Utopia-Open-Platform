<?php

namespace App\Http\Middleware\View;

use App\Http\Utils\RedisAndCache;
use App\Models\System\SiteProfile;
use Closure;
use HeaderKey;
use Illuminate\Http\Request;
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

        $site_profile=RedisAndCache::getWithJson(RedisCacheKey::SITE_PROFILE);
        if (!$site_profile) {
            $site_profile = SiteProfile::all();
            RedisAndCache::set(RedisCacheKey::SITE_PROFILE,$site_profile);
        }
        $profiles = [];
        foreach ($site_profile as $profile) {
            $profiles += [$profile['profile_type'] => $profile['profile_content']];
        }
        $request->attributes->add([HeaderKey::SITE_PROFILE => $profiles]);
        return $next($request);
    }
}
