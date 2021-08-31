@extends('root.root')

@section('title') - 登录 @endsection

@section('body')
<body class="login-page">
<div class='loader'>
    <div class='spinner-grow text-primary' role='status'><span class='sr-only'>Loading...</span></div>
</div>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-12 col-lg-4">
            <div class="card login-box-container">
                <div class="card-body">
                    <div class="authent-text">
                        <p>请登录您的账户</p>
                    </div>
                    <form>
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="email"
                                       placeholder="邮箱或用户名">
                                <label for="email">邮箱或用户名</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password"
                                       placeholder="输入您的密码">
                                <label for="password">密码</label>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="button" onclick="doLogin()" class="btn btn-info m-b-xs">登录</button>
                            <button type="button"  class="btn btn-primary" onclick="window.location.href='{{WebUrl::FIND_PASSWORD}}'">
                                找回密码
                            </button>
                        </div>
                    </form>
                    <div class="authent-reg">
                        <p>还没注册？ <a href="{{WebUrl::REGISTER}}">前往注册</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="alert" tabindex="-1" aria-labelledby="alert" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alert_title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="alert_content"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">确认</button>
            </div>
        </div>
    </div>
</div>
</body>
@endsection

@section('script')
<script>
    function doLogin(){
        let email=$("#email").val()
        let password=$("#password").val()
        if (email===""||password===""){
            showAlert("警告","您有未输入的部分")
            return
        }
        let pattern = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
        if (!pattern.test(email)) {
            showAlert("警告", "邮箱格式错误")
            return
        }
        $.ajax({

        })

    }
    function showAlert(title, content) {
        let alert = $("#alert")
        let title_elem = $("#alert_title")
        let content_elem = $("#alert_content")
        title_elem.html(title)
        content_elem.html(content)
        alert.modal('show')
    }
</script>
@endsection
