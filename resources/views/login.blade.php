@extends('root.root')

@section('title')- 登录 @endsection

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
                                    <input type="text" class="form-control" id="user"
                                           placeholder="邮箱或用户名">
                                    <label for="user">邮箱或用户名</label>
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
                                <div id="login_process" style="display: none;" class="progress m-b-xs">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                         aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                </div>
                                <button id="login_button" type="button" onclick="doLogin()" class="btn btn-info m-b-xs">登录</button>
                                <button type="button" class="btn btn-primary"
                                        onclick="window.location.href='{{WebUrl::FIND_PASSWORD}}'">
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
    <div class="modal fade" id="captcha_dialog" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
         aria-labelledby="captcha" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="captcha_title">CAPTCHA 验证码</h5>
                   </div>
                <div class="modal-body" id="captcha_content">
                    <div id="captcha_process" class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                             aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                    </div>

                    <div class="input-group mb-3" id="captcha_div" style="display: none">
                        <span class="input-group-text"><img id="captcha_img" style="display: none;" src=""
                                                            alt="captcha"></span>
                        <label for="captcha"></label>
                        <input type="text" class="form-control" id="captcha" aria-describedby="basic-addon3"
                               placeholder="验证码">
                    </div>

                    <div class="modal-footer" style="display: flex;justify-content: flex-end">
                        <button type="button" onclick="$('#login_process').hide();$('#login_button').show()" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                        <button type="button" onclick="doCaptcha();" class="btn btn-primary">验证</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection

@section('script')
    <script src="https://cdn.bootcdn.net/ajax/libs/blueimp-md5/2.18.0/js/md5.js"></script>
    <script>
        function doLogin() {
            let user = $("#user").val()
            let password = $("#password").val()
            if (user === "" || password === "") {
                showAlert("警告", "您有未输入的部分")
                return
            }

            $("#captcha_dialog").modal('show')
            $("#login_process").show()
            $("#login_button").hide()

            $.ajax({
                url: '{{ApiUrl::API.ApiUrl::CAPTCHA}}',
                method: "get",
                dataType: "json",
                success: function (result) {
                    if (result.code === 200) {
                        $("#captcha_process").hide()
                        let captcha_img = $("#captcha_img")
                        captcha_img.attr("src", result.data.captcha_img)
                        captcha_img.show()
                        $("#captcha_div").show()
                    } else {
                        $("#login_process").hide()
                        $("#login_button").show()
                        showAlert("抱歉", "服务器错误，未获取到验证码")
                    }
                },
                error: function () {
                    $("#login_process").hide()
                    $("#login_button").show()
                    showAlert("抱歉", "服务器错误，未获取到验证码")
                }
            })
        }

        function doCaptcha(){
            let process = $("#captcha_process")
            process.show()
            $("#captcha_div").hide()
            let user = $("#user").val()
            let password = $("#password").val()
            let captcha = $("#captcha").val()

            $.ajax({
                url: '{{ApiUrl::API.ApiUrl::USER.ApiUrl::LOGIN}}',
                dataType: "json",
                type:'post',
                data: {
                    "user": user,
                    "password": md5(password),
                    "captcha":captcha
                },
                success: function (result) {
                    $("#captcha_dialog").modal('hide')
                    $("#login_process").hide()
                    $("#login_button").show()
                    if(result.code===200){
                        window.location.href="/";
                    }else{
                        showAlert("抱歉",result.message)
                    }
                },
                error: function () {
                    $("#login_process").hide()
                    $("#login_button").show()
                    $("#captcha_dialog").modal('hide')
                    showAlert("抱歉","服务器错误")
                }
            })
        }
    </script>
@endsection
