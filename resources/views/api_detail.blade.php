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
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">

                    <div class="mail-header">
                        <div class="mail-title">
                            <h4>邮件推送</h4>
                        </div>
                        <div class="mail-actions">
                            <button type="button" class="btn btn-primary">Mock</button>
                            <button type="button" class="btn btn-primary">接口状态</button>
                        </div>
                    </div>

                    <p>utopia.push.email<br><br>
                        通过高效企业级邮箱服务，毫秒级迅速响应发送邮件。
                        <br>
                        <br>
                    <h4>请求参数</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">名称</th>
                            <th scope="col">类型</th>
                            <th scope="col">是否必填</th>
                            <th scope="col">描述</th>
                            <th scope="col">示例值</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>secure_key</td>
                            <td>字符串</td>
                            <td>是</td>
                            <td>动态生成的安全密钥，根据您的Open Key算出，请参考<a href="#">SK计算方法</a></td>
                            <td>b66dab580b71a7559f36eda8546c80e8</td>
                        </tr>
                        <tr>
                            <td>smtp_server</td>
                            <td>字符串</td>
                            <td>是</td>
                            <td>发信所用SMTP服务器</td>
                            <td>smtp.demo.com</td>
                        </tr>
                        <tr>
                            <td>email_user</td>
                            <td>字符串</td>
                            <td>是</td>
                            <td>您的邮箱账号</td>
                            <td>demo@demo.com</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <h4>请求示例</h4>
                    <pre lang="json">
{
    "secure_key":"b66dab580b71a7559f36eda8546c80e8",
    "smtp_server":"smtp.demo.com",
    "email_user":"demo@demo.com"
}
                            </pre>
                    <br>
                    <h4>返回参数</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">名称</th>
                            <th scope="col">类型</th>
                            <th scope="col">描述</th>
                            <th scope="col">示例值</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>code</td>
                            <td>整型</td>
                            <td>状态码：<br>
                                200：正常<br>
                                400001：参数非法或不全<br>
                                403001：SK不存在或不正确
                            </td>
                            <td>200</td>
                        </tr>
                        <tr>
                            <td>status</td>
                            <td>字符串</td>
                            <td>状态描述</td>
                            <td>success</td>
                        </tr>
                        <tr>
                            <td>data</td>
                            <td>JSON对象</td>
                            <td>返回实体，一般为空</td>
                            <td> </td>
                        </tr>
                        </tbody>
                    </table><br>
                    <h4>返回示例</h4>
                    <pre lang="json">
{
    "code":200,
    "status":"success",
    "data":{}
}
                            </pre>
                </div>
            </div>
        </div>
    </div>

@endsection

