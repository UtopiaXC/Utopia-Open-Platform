<?php

namespace App\Http\Middleware\View;

use App\Http\Utils\RedisAndCache;
use Closure;
use CookieKey;
use HeaderKey;
use Illuminate\Http\Request;
use RedisCacheKey;

class UserAuthMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        $token = $request->cookie(CookieKey::USER_TOKEN);
        if (!$token) {
            $request->attributes->add([HeaderKey::LOGIN_STATUS => false]);
        }
        $user = RedisAndCache::get(RedisCacheKey::USER_TOKEN . $token);
        if (!$user)
            $request->attributes->add([HeaderKey::LOGIN_STATUS => false]);
        else
            $request->attributes->add([HeaderKey::LOGIN_STATUS => true, HeaderKey::USER_INFO => $user]);
        return $next($request);
    }
}
