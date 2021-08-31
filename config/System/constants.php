<?php

class WebUrl
{
    const INDEX = '/';
    const LOGIN = '/login';
    const REGISTER = '/register';
    const FIND_PASSWORD = '/find_password';

    const PRIVACY_POLICY = "/privacy_policy";
}

class ApiUrl
{
    const API = '/api';
    const USER = '/user';
    const CAPTCHA='/captcha';
    const REGISTER = "/register";

}

class Middleware
{
    const AUTH_MIDDLEWARE = 'AuthMiddleWare';
}

class UserTypeEnum{
    const ADMIN="01";
    const NORMAL="02";
    const VIP="03";
}

class UserStatusEnum{
    const NOT_VERITY="01";
    const NORMAL="02";
    const BANNED="03";
    const BANNED_FOREVER="04";
}
