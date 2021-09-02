@php
    $site_profile=app('request')->get(HeaderKey::SITE_PROFILE);
@endphp
@extends('root.app')
@section('title')- 主页 @endsection
@section("page_content")
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card stat-widget">
                <div class="card-body">
                    <h5 class="card-title">总接口数</h5>
                    <h2>15</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card stat-widget">
                <div class="card-body">
                    <h5 class="card-title">高级版功能</h5>
                    <h2>15</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card stat-widget">
                <div class="card-body">
                    <h5 class="card-title">今日调用数</h5>
                    <h2>287</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card stat-widget">
                <div class="card-body">
                    <h5 class="card-title">今日SDK调用</h5>
                    <h2>98</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">调用历史</h5>
                    <div id="apex1"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card stat-widget">
                <div class="card-body">
                    <h5 class="card-title">今日最多调用</h5>
                    <div class="transactions-list">
                        <div class="tr-item">
                            <div class="tr-company-name">
                                <div class="tr-icon tr-card-icon tr-card-bg-info text-info"><i
                                        data-feather="map"></i></div>
                                <div class="tr-text">
                                    <h4>地理信息逆编码</h4>
                                    <p><span>142</span> 次</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="transactions-list">
                        <div class="tr-item">
                            <div class="tr-company-name">
                                <div class="tr-icon tr-card-icon tr-card-bg-info text-info"><i
                                        data-feather="message-circle"></i></div>
                                <div class="tr-text">
                                    <h4>钉钉消息推送</h4>
                                    <p><span>51</span> 次</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="transactions-list">
                        <div class="tr-item">
                            <div class="tr-company-name">
                                <div class="tr-icon tr-card-icon tr-card-bg-info text-info"><i
                                        data-feather="mail"></i></div>
                                <div class="tr-text">
                                    <h4>邮件推送</h4>
                                    <p><span>23</span> 次</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="transactions-list">
                        <div class="tr-item">
                            <div class="tr-company-name">
                                <div class="tr-icon tr-card-icon tr-card-bg-info text-info"><i
                                        data-feather="send"></i></div>
                                <div class="tr-text">
                                    <h4>Telegram推送</h4>
                                    <p><span>13</span> 次</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('/js/pages/dashboard.js')}}"></script>
@endsection
