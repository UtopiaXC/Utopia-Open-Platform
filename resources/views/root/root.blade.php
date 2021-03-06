@php
    $site_profile=app('request')->get(HeaderKey::SITE_PROFILE);
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{$site_profile[SiteProfileTypeEnum::WEB_TITLE]}} @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="@yield('author')">
    @include('style.style')
    @yield('style')
</head>
@yield('body')
@include('script.scripts')
@yield('script')
</html>
