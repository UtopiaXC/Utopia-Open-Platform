<?php

class WebUrl
{
    const INDEX = '/';
    const LOGIN = '/login';
    const REGISTER = '/register';
    const FIND_PASSWORD = '/find_password';

    const PRIVACY_POLICY = "/privacy_policy";
    const REGISTER_VERIFY="/register_verify";
}

class ApiUrl
{
    const API = '/api';
    const USER = '/user';
    const CAPTCHA = '/captcha';
    const REGISTER = "/register";
    const LOGIN = '/login';
}

class Middleware
{
    const AUTH_MIDDLEWARE = 'AuthMiddleware';
    const SITE_PROFILE_MIDDLEWARE='SiteProfileMiddleware';
}

class UserTypeEnum
{
    const ADMIN = "01";
    const NORMAL = "02";
    const VIP = "03";
}

class UserStatusEnum
{
    const NOT_VERITY = "01";
    const NORMAL = "02";
    const BANNED = "03";
    const BANNED_FOREVER = "04";
}

class RedisCacheKey
{
    const SITE_PROFILE = "site_profile";
    const USER_TOKEN = "user_token:";
    const REGISTER_VERIFY="register_verify:";
    const CAPTCHA="captcha:";
}

class CookieKey
{
    const USER_TOKEN = "user_token";
}

class HeaderKey
{
    const LOGIN_STATUS = "login_status";
    const USER_INFO="user_info";
    const SITE_PROFILE="site_profile";
}

class FormKey{
    const CAPTCHA="captcha";
    const USER_NAME="user_name";
    const EMAIL="email";
    const PASSWORD="password";
    const USER="user";
}

class SiteProfileTypeEnum
{
    const WEB_TITLE = "01";
    const SITE_URL = "02";
    const WEB_FOOTER = "03";
}

class DefaultSiteProfile
{
    const WEB_TITLE = 'Utopia 开放平台';
    const SITE_URL = 'http://localhost';
    const WEB_FOOTER='Copyright ©2021 <a target="_blank" href="https://www.utopiaxc.cn/">UtopiaXC</a> All Rights Reserved | Powered By <a href="https://github.com/UtopiaXC/Utopia-Open-Platform" target="_blank">Utopia Open Platform</a>';
}

class EnvKey{
    const REDIS_USE="REDIS_USE";
}

