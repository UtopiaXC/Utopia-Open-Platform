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
        <div class="col-sm-12 col-md-2">
            <div class="file-manager-menu"><span class="fmm-title">信息推送接口</span>
                <ul class="list-unstyled">
                    <li><a href="{{WebUrl::API_DETAIL."/utopia_mps_email"}}"><i class="far fa-folder"></i>邮件推送</a></li>
                    <li><a href="#"><i class="far fa-clock"></i>钉钉推送</a></li>
                    <li><a href="#"><i class="fas fa-tablet-alt"></i>QQ推送</a></li>
                    <li><a href="#"><i class="far fa-star"></i>微信推送</a></li>
                    <li><a href="#"><i class="far fa-trash-alt"></i>企业微信推送</a></li>
                    <li><a href="#"><i class="far fa-trash-alt"></i>Telegram推送</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-12 col-md-10">
            <div class="card">
                <div class="card-body" id="page_content">
                    <div class="open-email-content">
                        <div class="mail-header">
                            <div class="mail-title">
                                <h4>消息推送MPS</h4>
                            </div>
                        </div>
                        <div class="mail-text">
                            <p>
                                Utopia开放平台消息推送MPS（Message Push System）是一系列高效的聚合消息推送接口。
                                <br>组标识：utopia.mps
                            </p><br>

                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
@endsection



@section('script')
    <script>
    </script>


@endsection

@section('style')

@endsection
