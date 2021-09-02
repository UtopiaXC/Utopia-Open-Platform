<body style="
            box-sizing: border-box;
            min-height: 100vh;
            display: flex;
            background-color: #eaeaea;
            font-family: Open Sans, sans-serif;
            font-weight: 300;
            line-height: 1.8;
            background-size: cover;
            background-repeat: no-repeat;">
<div style="
            box-sizing: border-box;
            margin: auto;
            background: #fefefe;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1), 3px 5px 20px rgba(0, 0, 0, 0.2);
            width: 768px;
            height: 550px;
            position: relative;
            display: flex;
            align-items: flex-end;
            padding: 30px;" class="cards">
    <div style="
                box-sizing: border-box;
                display: inline-block;
                margin-right: 20px;">
        <div style="
                    box-sizing: border-box;
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    left: 0;
                    top: 0;
                    transition: -webkit-clip-path 1s ease;
                    padding: 100px 0 0;
                    overflow: hidden;
                    border-radius: 5px;">
            <div style="
                box-sizing: border-box;
                display: table;
                width: 100%;
                height: 100%;">
                <div style="
                    box-sizing: border-box;
                    transform: translate3d(0, 0, 0);
                    padding-left: 50px;
                    opacity: 1;">
                    <h2 style="
                        box-sizing: border-box;
                        font-weight: 300;
                        font-size: 3em;
                        line-height: 1;
                        margin: 0 0 30px;">欢迎注册<br>{{env('APP_SHOW_NAME','Utopia Open Platform')}}</h2>
                    <p style="width: 70%">亲爱的 {{$user}}<br>您已成功注册 {{env('APP_SHOW_NAME','Utopia Open Platform')}}
                        的账户，请点击<a target="_blank" href="{{$link}}">验证链接</a>来激活您的账户功能。验证有效期十五分钟。 <br/><em>如果您点击链接后未跳转，请将以下链接复制到浏览器访问：<br>{{$link}}
                        </em></p>
                </div>
                <div style="
                        text-align: right;
                        padding-right: 100px">
                    <p>
                        <a target="_blank"
                           href="{{env('APP_URL',"")}}">{{env('APP_SHOW_NAME','Utopia Open Platform')}}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
