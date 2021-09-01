@php

    $site_profile=app('request')->get(HeaderKey::SITE_PROFILE);


@endphp


@extends('root.root')

@section('page_header')
    @include('root.page_header')
@endsection

@section('body')
    <body>
    <div class='loader'>
        <div class='spinner-grow text-primary' role='status'><span class='sr-only'>Loading...</span></div>
    </div>
    <div class="page-container" style="min-height: calc(100vh - 50px);">
        @yield("page_header")
        <div class="page-content">
            <div class="main-wrapper">
                @yield("page_content")
            </div>
        </div>
    </div>
    <footer style="text-align: center; height: 50px;">
        <div>
                {!! $site_profile[SiteProfileTypeEnum::WEB_FOOTER] !!}
        </div>
    </footer>
    </body>
@endsection

@section('description') UtopiaXC的个人开放平台 @endsection
@section('keywords') UtopiaXC,开放平台,api,开源 @endsection
@section('author') UtopiaXC @endsection
