<?php

namespace App\Http\Utils;

use EnvKey;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Predis\Connection\ConnectionException;

class RedisAndCache {
    public static function set($key, $value) {
        try {
            if (env(EnvKey::REDIS_USE, false) == true) {
                try {
                    Redis::set($key, $value);
                } catch (ConnectionException $e) {
                    Cache::put($key, $value);
                }
            } else {
                Cache::put($key, $value);
            }
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public static function setWithExpire($key, $value, $expireInMinutes) {
        try {
            $expiredAt = now()->addMinutes($expireInMinutes);
            if (env(EnvKey::REDIS_USE, false) == true) {
                try {
                    Redis::setex($key, $expireInMinutes * 60, $value);
                } catch (ConnectionException $e) {
                    Cache::put($key, $value, $expiredAt);
                }
            } else {
                Cache::put($key, $value, $expiredAt);
            }
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public static function get($key) {
        try {
            if (env(EnvKey::REDIS_USE, false) == true) {
                try {
                    $value = Redis::get($key);
                } catch (ConnectionException $e) {
                    $value = Cache::get($key);
                }
            } else {
                $value = Cache::get($key);
            }
        } catch (Exception $e) {
            return null;
        }
        return $value;
    }

    public static function getWithJson($key) {
        try {
            if (env(EnvKey::REDIS_USE, false) == true) {
                try {
                    $value = json_decode(Redis::get($key), true);
                } catch (ConnectionException $e) {
                    $value = json_decode(Cache::get($key), true);
                }
            } else {
                $value = json_decode(Cache::get($key), true);
            }
        } catch (Exception $e) {
            return null;
        }
        return $value;
    }

    public static function forget($key) {
        try {
            if (env(EnvKey::REDIS_USE, false) == true) {
                try {
                    Redis::del($key);
                } catch (ConnectionException $e) {
                    Cache::forget($key);
                }
            } else {
                Cache::forget($key);
            }
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
}
