@extends('root.root')

@section('title')- 注册 @endsection

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
                            <p>请输入注册信息</p>
                        </div>
                        <form>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="name@example.com">
                                    <label for="email">邮箱</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="user_name" name="username"
                                           placeholder="请输入用户名">
                                    <label for="user_name">用户名</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="密码">
                                    <label for="password">密码</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password_twice" name="password"
                                           placeholder="确认密码">
                                    <label for="password_twice">确认密码</label>
                                </div>
                            </div>
                            <div class="mb-3 form-check">
                                <p>当您注册时，我们默认您已经同意 <a target="_blank" href="{{WebUrl::PRIVACY_POLICY}}">隐私政策</a></p>
                            </div>
                            <div class="d-grid">
                                <button onclick="doRegister();" type="button" class="btn btn-primary m-b-xs">注册</button>
                            </div>
                        </form>
                        <div class="authent-login">
                            <p>已有账户？ <a href="{{WebUrl::LOGIN}}">登录</a></p>
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

    <div class="modal fade" id="register_success" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="register_success" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">成功</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">请前往登录，并查看自己的邮箱进行激活（可能在垃圾邮件中）</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                            onclick="window.location.href='{{WebUrl::LOGIN}}'"
                            data-bs-dismiss="modal">确认</button>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
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
        function doRegister() {
            let email = $("#email").val()
            let user_name = $("#user_name").val()
            let password = $("#password").val()
            let password_twice = $("#password_twice").val()

            if (email === "" || user_name === "" || password === "" || password_twice === "") {
                showAlert("警告", "您有未输入的部分")
                return
            }
            if (email.indexOf(" ") !== -1 || user_name.indexOf(" ") !== -1 || password.indexOf(" ") !== -1 || password_twice.indexOf(" ") !== -1) {
                showAlert("警告", "禁止输入空格")
                return
            }
            let pattern = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
            if (!pattern.test(email)) {
                showAlert("警告", "邮箱格式错误")
                return
            }
            pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9-_.]{8,32}$/
            if (!pattern.test(password)) {
                showAlert("警告", "密码要求为为8到32位长度，只包含大小写字母和数字以及“-”,“_”，“.”，且必须同时包含大小写字母和数字")
                return
            }

            if (password !== password_twice) {
                showAlert("警告", "两次密码输入不一致")
                return
            }

            $("#captcha_dialog").modal('show')

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
                        showAlert("抱歉", "服务器错误，未获取到验证码")
                    }
                },
                error: function () {
                    showAlert("抱歉", "服务器错误，未获取到验证码")
                }
            })
        }

        function doCaptcha() {
            let process = $("#captcha_process")
            process.show()
            $("#captcha_div").hide()

            let email = $("#email").val()
            let user_name = $("#user_name").val()
            let password = md5($("#password").val())
            let captcha = $("#captcha").val()

            $.ajax({
                url: '{{ApiUrl::API.ApiUrl::USER.ApiUrl::REGISTER}}',
                method: "post",
                dataType: "json",
                data: {
                    "email": email,
                    "user_name": user_name,
                    "password": password,
                    "captcha": captcha
                },
                success: function (result) {
                    $("#captcha_dialog").modal('hide')
                    if (result.code === 200) {
                        $("#register_success").modal('show')
                    } else {
                        showAlert("警告", result.message)
                    }
                },
                error: function () {
                    $("#captcha_dialog").modal('hide')
                    showAlert("抱歉", "服务器错误，注册失败")
                }
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
