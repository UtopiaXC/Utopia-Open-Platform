@php
    $user_logged=app('request')->get(HeaderKey::LOGIN_STATUS);
    if (!$user_logged){
        redirect(WebUrl::LOGIN);
    }
@endphp
@extends('root.app')
@section('title')- Open Key @endsection
@section('page_content')
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Open Key</h5>
                    <button type="button" class="btn btn-primary m-b-xs">新增应用</button>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">应用名</th>
                            <th scope="col">OpenKey</th>
                            <th scope="col">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>个人地图</td>
                            <td><a href="#">点击查看</a></td>
                            <td>
                                <a href="#"><i data-feather="x"></i></a>&nbsp;&nbsp;
                                <a href="#"><i data-feather="info"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>通知推送</td>
                            <td><a href="#">点击查看</a></td>
                            <td>
                                <a href="#"><i data-feather="x"></i></a>&nbsp;&nbsp;
                                <a href="#"><i data-feather="info"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>测试接口</td>
                            <td><a href="#">点击查看</a></td>
                            <td>
                                <a href="#"><i data-feather="x"></i></a>&nbsp;&nbsp;
                                <a href="#"><i data-feather="info"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
