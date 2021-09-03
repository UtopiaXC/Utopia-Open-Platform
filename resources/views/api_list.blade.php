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
            <div class="file-manager-menu label-menu"><span class="fmm-title">Labels</span>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="bg-success"></i>企业版</a></li>
                    <li><a href="#"><i class="bg-warning"></i>高级版</a></li>
                    <li><a href="#"><i class="bg-primary"></i>基础版</a></li>
                    <li><a href="#"><i class="bg-dark"></i>免费版</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-12 col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Accordion Item #1 </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body"> <strong>This is the first item's accordion body.</strong>It is hidden by default,until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance,as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow. </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Accordion Item #2 </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body"> <strong>This is the second item's accordion body.</strong>It is hidden by default,until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance,as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow. </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Accordion Item #3 </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body"> <strong>This is the third item's accordion body.</strong>It is hidden by default,until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance,as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow. </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
