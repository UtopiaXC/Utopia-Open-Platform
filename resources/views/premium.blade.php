@extends('root.app')
@section('title')- 高级版 @endsection
@section('page_content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">订阅模式</h5>
                    <div class="row">
                        <div class="col m-b-sm">
                            <ul class="list-group io-pricing-table">
                                <li class="list-group-item">
                                    <h3>免费版</h3>
                                </li>
                                <li class="list-group-item">免费版接口</li>
                                <li class="list-group-item">调用限制 1次/10秒/OpenKey</li>
                                <li class="list-group-item">1x OpenKey</li>
                                <li class="list-group-item">无SDK支持</li>
                                <li class="list-group-item">无人工服务</li>
                                <li class="list-group-item">
                                    <h3>￥0</h3>
                                    <span>无限制</span></li>
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-primary" disabled>无需购买</button>
                                </li>
                            </ul>
                        </div>
                        <div class="col m-b-sm">
                            <ul class="list-group io-pricing-table">
                                <li class="list-group-item">
                                    <h3>基础版</h3>
                                </li>
                                <li class="list-group-item">基础版接口</li>
                                <li class="list-group-item">1次/秒/OpenKey</li>
                                <li class="list-group-item">1x OpenKey</li>
                                <li class="list-group-item">无SDK支持</li>
                                <li class="list-group-item">无人工服务</li>
                                <li class="list-group-item">
                                    <h3 >￥30 / 年</h3>
                                    <span>年付</span></li>
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-primary">选购</button>
                                </li>
                            </ul>
                        </div>
                        <div class="col m-b-sm">
                            <ul class="list-group io-pricing-table">
                                <li class="list-group-item">
                                    <h3>高级版</h3>
                                </li>
                                <li class="list-group-item">高级版接口</li>
                                <li class="list-group-item">调用限制 60次/秒/OpenKey</li>
                                <li class="list-group-item">3x OpenKey</li>
                                <li class="list-group-item">基础SDK</li>
                                <li class="list-group-item">人工服务</li>
                                <li class="list-group-item">
                                    <h3>￥15 / 月</h3>
                                    <span>月付</span></li>
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-primary">选购</button>
                                </li>
                            </ul>
                        </div>
                        <div class="col m-b-sm">
                            <ul class="list-group io-pricing-table">
                                <li class="list-group-item">
                                    <h3>企业版</h3>
                                </li>
                                <li class="list-group-item">企业级接口</li>
                                <li class="list-group-item">无调用限制</li>
                                <li class="list-group-item">无限应用OpenKey</li>
                                <li class="list-group-item">全功能SDK</li>
                                <li class="list-group-item">企业专员</li>
                                <li class="list-group-item">
                                    <h3>面议</h3>
                                    <span>年付</span></li>
                                <li class="list-group-item">
                                    <button type="button" class="btn btn-primary">联系我们</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">按需模式</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
