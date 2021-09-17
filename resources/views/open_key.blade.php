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
                    <button type="button" class="btn btn-primary m-b-xs" onclick="create_open_id()">新增应用</button>
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
                            <td><a href="javascript:show_open_key()">点击查看</a></td>
                            <td>
                                <a href="#"><i data-feather="x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>通知推送</td>
                            <td><a href="javascript:show_open_key()">点击查看</a></td>
                            <td>
                                <a href="#"><i data-feather="x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>测试接口</td>
                            <td><a href="javascript:show_open_key()">点击查看</a></td>
                            <td>
                                <a href="#"><i data-feather="x"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="add_key_dialog" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
         aria-labelledby="add_key" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">新建应用</h5>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="add_app_name" class="form-label">应用名</label>
                        <input type="text" class="form-control" id="add_app_name" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="modal-footer" style="display: flex;justify-content: flex-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary">新建</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="key_detail_dialog" tabindex="-1"
         aria-labelledby="key_detail" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Open Key</h5>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="show_name" class="form-label">应用名</label>
                        <input type="text" id="show_name" class="form-control" placeholder="测试应用" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="show_key" class="form-label">Open Key</label>
                        <input type="text" id="show_key" class="form-control" placeholder="f9b32683c80676a977cdbf62933eadba" disabled>
                    </div>
                </div>
                <div class="modal-footer" style="display: flex;justify-content: flex-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary">复制</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        function create_open_id(){
            $("#add_key_dialog").modal('show')
        }
        function show_open_key(){
            $("#key_detail_dialog").modal('show')
        }
    </script>
@endsection
