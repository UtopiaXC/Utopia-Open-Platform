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
                    <li><a href="#"><i class="far fa-folder"></i>邮件推送</a></li>
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
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    邮件推送
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="open-email-content">
                                        <div class="mail-header">
                                            <div class="mail-title">
                                                <h4>邮件推送</h4>
                                            </div>
                                            <div class="mail-actions">
                                                <button type="button" class="btn btn-primary">Mock</button>
                                                <button type="button" class="btn btn-primary">接口状态</button>
                                            </div>
                                        </div>
                                        <div class="mail-text">
                                            <p>utopia.push.email<br><br>
                                                通过高效企业级邮箱服务，毫秒级迅速响应发送邮件。
                                                <br>
                                                <br>
                                            <h4>基本信息</h4>
                                            <table>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree"> 钉钉推送
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body"><strong>This is the third item's accordion body.</strong>It
                                    is hidden by default,until the collapse plugin adds the appropriate classes that we
                                    use to style each element. These classes control the overall appearance,as well as
                                    the showing and hiding via CSS transitions. You can modify any of this with custom
                                    CSS or overriding our default variables. It's also worth noting that just about any
                                    HTML can go within the <code>.accordion-body</code>, though the transition does
                                    limit overflow.
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
    <script>

    </script>


@endsection

@section('style')

@endsection
