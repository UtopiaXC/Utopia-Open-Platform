@php
    use App\Http\Utils\RedisAndCache;
    $user=RedisAndCache::get(RedisCacheKey::REGISTER_VERIFY . request()->get("code"));
    if (!$user){

    }
@endphp
@extends('root.root')

@section('title') - 注册验证 @endsection

@section('body')

@endsection
