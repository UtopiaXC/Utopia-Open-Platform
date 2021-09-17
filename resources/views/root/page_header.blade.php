@php
    $site_profile=app('request')->get(HeaderKey::SITE_PROFILE);
    $user_logged=app('request')->get(HeaderKey::LOGIN_STATUS);
    $user=app('request')->get(HeaderKey::USER_INFO);
    $user_profile=app('request')->get(HeaderKey::USER_PROFILE);

    if ($user_logged){
        $user_avatar='<li class="nav-item dropdown"><a class="nav-link profile-dropdown" href="#" id="profileDropDown"
                                                     role="button" data-bs-toggle="dropdown" aria-expanded="false"><img
                                src="'.$user_profile["user_avatar"].'" alt=""></a>
                        <div class="dropdown-menu dropdown-menu-end profile-drop-menu"
                             aria-labelledby="profileDropDown">
                            <a class="dropdown-item" href="#"><i data-feather="user"></i>用户中心</a>
                            <a class="dropdown-item" href="#"><i data-feather="key"></i>OpenKey</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i data-feather="settings"></i>用户设置</a>
                            <a class="dropdown-item" href="javascript:logout();"><i data-feather="log-out"></i>退出</a></div>
                    </li>';
    }else{
         $user_avatar='<li class="nav-item dropdown"><a class="nav-link profile-dropdown" href="#" id="profileDropDown"
                                                     role="button" data-bs-toggle="dropdown" aria-expanded="false"><img
                                src="'.asset(DatabaseDefault::NO_LOGIN_AVATAR).'" alt=""></a>
                        <div class="dropdown-menu dropdown-menu-end profile-drop-menu"
                             aria-labelledby="profileDropDown">

                            <a class="dropdown-item" href="'.WebUrl::LOGIN.'"><i data-feather="key"></i>登录</a>
                            <a class="dropdown-item" href="'.WebUrl::REGISTER.'"><i data-feather="user"></i>注册</a>
                            <a class="dropdown-item" href="'.WebUrl::FIND_PASSWORD.'"><i data-feather="key"></i>忘记密码</a>
                    </li>';
    }

@endphp


{{--顶部工具栏--}}
<div class="page-header">
    <nav class="navbar navbar-expand-lg d-flex justify-content-between">
        <div class="" id="navbarNav">
            <ul class="navbar-nav" id="leftNav">
                <li class="nav-item"><a class="nav-link" id="sidebar-toggle" href="#"><i
                            data-feather="menu"></i></a></li>
            </ul>
        </div>
        <div><a href="{{WebUrl::INDEX}}"
                style="font-size: larger;color: gray">{{$site_profile[SiteProfileTypeEnum::WEB_TITLE]}}</a></div>
        <div class="" id="headerNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown"><a class="nav-link search-dropdown" href="#" id="searchDropDown"
                                                 role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                            data-feather="search"></i></a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg search-drop-menu"
                         aria-labelledby="searchDropDown">
                        <form>
                            <input class="form-control" type="text" placeholder=""
                                   aria-label="Search">
                        </form>
                    </div>
                </li>
                {!! $user_avatar !!}
            </ul>
        </div>
    </nav>
</div>


{{--侧边栏--}}
<div class="page-sidebar">
    <ul class="list-unstyled accordion-menu">
        <li class="sidebar-title">主页</li>
        <li><a href="/"><i data-feather="home"></i>主页</a></li>
        <li class="sidebar-title">个人</li>
        <li><a href="{{WebUrl::OPEN_KEY}}"><i data-feather="key"></i>OpenKey</a></li>
        <li><a href=""><i data-feather="pie-chart"></i>接口用量</a></li>
        <li><a href=""><i data-feather="clipboard"></i>调用历史</a></li>
        <li><a href="{{WebUrl::PREMIUM}}"><i data-feather="coffee"></i>高级版</a></li>
        <li class="sidebar-title">开放平台</li>
        <li><a href=""><i data-feather="code"></i>API接口<i class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul class="">
                <li><a href="{{WebUrl::API_LIST."/utopia_mps"}}"><i class="far fa-circle"></i>推送接口</a></li>
                <li><a href="{{WebUrl::API_LIST."/utopia_gis"}}"><i class="far fa-circle"></i>地图接口</a></li>
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
        <li><a href="{{WebUrl::ABOUT}}"><i data-feather="star"></i>关于本站</a></li>
        <li><a href="{{WebUrl::PRIVACY_POLICY}}"><i data-feather="shield"></i>隐私权</a></li>
        <li><a href="{{WebUrl::OPEN_SOURCE}}"><i data-feather="git-commit"></i>开放源代码</a></li>
    </ul>
</div>
