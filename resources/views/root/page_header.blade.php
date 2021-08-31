{{--@php--}}

{{--    use App\Models\System\SiteProfile;--}}
{{--    use Illuminate\Support\Facades\Redis;--}}

{{--    //通过Redis获取网站配置信息，如果没有则存入Redis--}}
{{--    $site_profile=json_decode(Redis::get(RedisKey::SITE_PROFILE),true);--}}
{{--    if($site_profile==null){--}}
{{--        $site_profile=SiteProfile::all();--}}
{{--        Redis::set(RedisKey::SITE_PROFILE,$site_profile);--}}
{{--    }--}}
{{--    $profiles=[];--}}
{{--    foreach($site_profile as $profile){--}}
{{--        $profiles+=[$profile['type']=>$profile['content']];--}}
{{--    }--}}

{{--    //侧边栏渲染--}}
{{--    $side_slider='';--}}
{{--    if (app('request')->get("user_login")==UserLoginEnum::LOGIN){--}}
{{--        $side_slider='<a href='.WebUrls::USER_CENTER.' class="mdui-list-item mdui-ripple ">'.trans("app.user_center").'</a>';--}}
{{--        $side_slider.='<a href='.WebUrls::USER_CENTER.' class="mdui-list-item mdui-ripple ">'.trans("app.account").'</a>';--}}
{{--        $side_slider.='<a href="javascript:logout();" class="mdui-list-item mdui-ripple ">'.trans("app.logout").'</a>';--}}
{{--    }else{--}}
{{--       $side_slider='<a href='.WebUrls::LOGIN.' class="mdui-list-item mdui-ripple ">'.trans("app.login").'</a>';--}}
{{--       $side_slider.='<a href='.WebUrls::REGISTER.' class="mdui-list-item mdui-ripple ">'.trans("app.register").'</a>';--}}
{{--       $side_slider.='<a href='.WebUrls::FIND_PASSWORD.' class="mdui-list-item mdui-ripple ">'.trans("app.find_password").'</a>';--}}
{{--    }--}}

{{--@endphp--}}



{{--顶部工具栏--}}
<div class="page-header">
    <nav class="navbar navbar-expand-lg d-flex justify-content-between">
        <div class="" id="navbarNav">
            <ul class="navbar-nav" id="leftNav">
                <li class="nav-item"><a class="nav-link" id="sidebar-toggle" href="#"><i
                            data-feather="menu"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="/">主页</a></li>
                <li class="nav-item"><a class="nav-link" href="#">API</a></li>
                <li class="nav-item"><a class="nav-link" href="#">关于</a></li>
            </ul>
        </div>
        <div><a href="/" style="font-size: larger;color: gray">UtopiaXC开放平台</a></div>
        <div class="" id="headerNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown"><a class="nav-link search-dropdown" href="#" id="searchDropDown"
                                                 role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                            data-feather="search"></i></a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg search-drop-menu"
                         aria-labelledby="searchDropDown">
                        <form>
                            <input class="form-control" type="text" placeholder="Type something.."
                                   aria-label="Search">
                        </form>
                    </div>
                </li>
                <li class="nav-item dropdown"><a class="nav-link profile-dropdown" href="#" id="profileDropDown"
                                                 role="button" data-bs-toggle="dropdown" aria-expanded="false"><img
                            src="{{asset('/images/avatars/profile-image.png')}}" alt=""></a>
                    <div class="dropdown-menu dropdown-menu-end profile-drop-menu"
                         aria-labelledby="profileDropDown">
                        <a class="dropdown-item" href="#"><i data-feather="user"></i>用户中心</a>
                        <a class="dropdown-item" href="#"><i data-feather="key"></i>OpenKey</a>
                        <a class="dropdown-item" href="#"><i data-feather="sliders"></i>系统后台</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i data-feather="settings"></i>用户设置</a>
                        <a class="dropdown-item" href="#"><i data-feather="log-out"></i>退出</a></div>
                </li>
            </ul>
        </div>
    </nav>
</div>


{{--侧边栏--}}
<div class="page-sidebar">
    <ul class="list-unstyled accordion-menu">
        <li class="sidebar-title">主页</li>
        <li class="active-page"><a href="/"><i data-feather="home"></i>主页</a></li>
        <li class="sidebar-title">个人</li>
        <li><a href=""><i data-feather="key"></i>OpenKey</a></li>
        <li><a href=""><i data-feather="pie-chart"></i>接口用量</a></li>
        <li><a href=""><i data-feather="clipboard"></i>调用历史</a></li>
        <li><a href=""><i data-feather="coffee"></i>高级版</a></li>
        <li class="sidebar-title">开放平台</li>
        <li><a href=""><i data-feather="code"></i>API接口<i class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul class="">
                <li><a href=""><i class="far fa-circle"></i>钉钉推送</a></li>
                <li><a href=""><i class="far fa-circle"></i>邮件推送</a></li>
                <li><a href=""><i class="far fa-circle"></i>Telegram推送</a></li>
                <li><a href=""><i class="far fa-circle"></i>地理信息</a></li>
            </ul>
        </li>
        <li><a href=""><i data-feather="book"></i>开发文档<i class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul class="">
                <li><a href=""><i class="far fa-circle"></i>接口说明</a></li>
                <li><a href=""><i class="far fa-circle"></i>SDK使用文档</a></li>
            </ul>
        </li>
        <li><a href=""><i data-feather="tool"></i>SDK<i class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul class="">
                <li><a href=""><i class="far fa-circle"></i>Java</a></li>
                <li><a href=""><i class="far fa-circle"></i>Python</a></li>
                <li><a href=""><i class="far fa-circle"></i>PHP</a></li>
                <li><a href=""><i class="far fa-circle"></i>.Net</a></li>
            </ul>
        </li>
        <li class="sidebar-title">关于</li>
        <li><a href=""><i data-feather="star"></i>关于本站</a></li>
        <li><a href=""><i data-feather="shield"></i>隐私权</a></li>
        <li><a href=""><i data-feather="git-commit"></i>开放源代码</a></li>
    </ul>
</div>
