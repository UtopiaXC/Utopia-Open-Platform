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
                                <input type="email" class="form-control" id="email"
                                       placeholder="name@example.com">
                                <label for="email">邮箱</label>
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
                            <button class="btn btn-info m-b-xs">登录</button>
                            <button class="btn btn-primary" onclick="window.open('{{WebUrl::FIND_PASSWORD}}')">
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
</body>
@endsection

@section('script')
<script>
    function logon(){

    }
</script>
@endsection
