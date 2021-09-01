<?php
class HTTP_CODE {

    //成功请求 2xx
    /**
     * @var int 服务器成功响应
     */
    const SUCCESS = 200;

    //重定向 3xx



    //客户端错误 4xx
    /**
     * @var int 错误的请求
     */
    const BAD_REQUEST = 400;
    /**
     * @var int 请求由于SQL注入被拒绝
     */
    const NOT_ACCEPT_SQL = 400001;
    /**
     * @var int 请求由于参数过长被拒绝
     */
    const NOT_ACCEPT_PARAMS_TOO_LONG = 400002;
    /**
     * @var int 请求由于参数类型错误被拒绝
     */
    const NOT_ACCEPT_PARAMS_TYPE_WRONG = 400003;
    /**
     * @var int 请求由于参数内容错误被拒绝
     */
    const NOT_ACCEPT_PARAMS_CONTENT_WRONG = 400004;
    /**
     * @var int 请求由于请求语法错误被拒绝
     */
    const NOT_ACCEPT_SYNTAX_WRONG = 400005;
    /**
     * @var int 请求参数存在不能为空的值
     */
    const NOT_ACCEPT_NOT_BLANK = 400006;
    /**
     * @var int 验证失败
     */
    const UNAUTHORIZED = 401;
    /**
     * @var int 验证码验证失败
     */
    const UNAUTHORIZED_CAPTCHA = 401001;
    /**
     * @var int 请求被拒绝
     */
    const REFUSED = 403;
    /**
     * @var int 注册信息不被服务器所接受
     */
    const REFUSED_REGISTER_NOT_ACCEPT = 403001;
    /**
     * @var int 用户名或邮箱已存在
     */
    const REFUSED_REGISTER_EXISTS = 403002;
    /**
     * @var int 用户不存在
     */
    const REFUSED_LOGIN_NO_REGISTER=403003;
    /**
     * @var int 用户名或密码错误
     */
    const REFUSED_LOGIN_WRONG=403004;
    /**
     * @var int 登录请求被拒绝，您的账号可能被封禁或停用
     */
    const REFUSED_LOGIN_REFUSED=403005;

    //服务器错误 5xx
    /**
     * @var int 服务器内部错误
     */
    const INTERNAL_SERVER_ERROR = 500;
    /**
     * @var int 错误的网关
     */
    const BAD_GATEWAY = 502;
}
