<?php
return ["code" => [
    //2xx
    HTTP_CODE::SUCCESS => "成功",

    //3xx

    //4xx

    //400xxx
    HTTP_CODE::BAD_REQUEST => "错误的请求",
    HTTP_CODE::NOT_ACCEPT_SQL => '请求由于SQL注入被拒绝',
    HTTP_CODE::NOT_ACCEPT_PARAMS_TOO_LONG => '请求由于参数过长被拒绝',
    HTTP_CODE::NOT_ACCEPT_PARAMS_TYPE_WRONG => '请求由于参数类型错误被拒绝',
    HTTP_CODE::NOT_ACCEPT_PARAMS_CONTENT_WRONG => '请求由于参数内容错误被拒绝',
    HTTP_CODE::NOT_ACCEPT_SYNTAX_WRONG => '请求由于请求语法错误被拒绝',
    HTTP_CODE::NOT_ACCEPT_NOT_BLANK=>'参数不能存在空值',
    //401xxx
    HTTP_CODE::UNAUTHORIZED => "未认证",
    HTTP_CODE::UNAUTHORIZED_CAPTCHA => "验证码错误或超时",
    //403xxx
    HTTP_CODE::REFUSED => '请求被拒绝',
    HTTP_CODE::REFUSED_REGISTER_NOT_ACCEPT => '注册信息不被服务器所接受',
    HTTP_CODE::REFUSED_REGISTER_EXISTS => '用户名或邮箱已存在',
    HTTP_CODE::REFUSED_LOGIN_NO_REGISTER => '用户不存在',
    HTTP_CODE::REFUSED_LOGIN_WRONG => '用户名或密码错误',
    HTTP_CODE::REFUSED_LOGIN_REFUSED => '登录请求被拒绝，您的账号可能被封禁或停用',

    //5xx
    HTTP_CODE::INTERNAL_SERVER_ERROR => '服务器内部错误',
    HTTP_CODE::BAD_GATEWAY => '错误的网关',
]
];
