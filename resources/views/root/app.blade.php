@extends('root.root')

@section('page_header')
    @include('root.page_header')
@endsection

@section('body')
    <body>
    <div class='loader'>
        <div class='spinner-grow text-primary' role='status'><span class='sr-only'>Loading...</span></div>
    </div>
    <div class="page-container">
        @yield("page_header")
        <div class="page-content">
            <div class="main-wrapper">
                @yield("page_content")
            </div>
        </div>
    </div>
    </body>
@endsection

@section('description') UtopiaXC的个人开放平台 @endsection
@section('keywords') UtopiaXC,开放平台,api,开源 @endsection
@section('author') UtopiaXC @endsection
