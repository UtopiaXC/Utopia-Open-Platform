<?php

namespace App\Http\Middleware\View;

use Closure;
use HeaderKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Predis\Connection\ConnectionException;

class UserAuthMiddleware
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
        $token = $request->cookie(\CookieKey::USER_TOKEN);
        if (!$token) {
            $request->attributes->add([HeaderKey::LOGIN_STATUS => false]);
        }
        try {
            $user = json_decode(Redis::get(\RedisCacheKey::USER_TOKEN . $token), true);
        } catch (ConnectionException $e) {
            $user = json_decode(\Cache::get(\RedisCacheKey::USER_TOKEN . $token), true);
        }
        if (!$user)
            $request->attributes->add([HeaderKey::LOGIN_STATUS => false]);
        else
            $request->attributes->add([HeaderKey::LOGIN_STATUS => true, HeaderKey::USER_INFO=>$user]);
        return $next($request);
    }
}
