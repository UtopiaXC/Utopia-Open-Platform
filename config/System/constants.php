<?php

class WebUrl {
    const INDEX = '/';
    const LOGIN = '/login';
    const REGISTER = '/register';
    const FIND_PASSWORD = '/find_password';
    const REGISTER_VERIFY = "/register_verify";

    const ABOUT='/about';
    const PRIVACY_POLICY = "/privacy_policy";
    const OPEN_SOURCE='/open_source';
    const OPEN_KEY='/open_key';
    const PREMIUM='/premium';
    const API_LIST='/api_list';
    const API_DETAIL='/api_detail';
}

class ApiUrl {
    const API = '/api';
    const USER = '/user';
    const CAPTCHA = '/captcha';
    const REGISTER = "/register";
    const LOGIN = '/login';
    const LOGOUT='/logout';
}

class Middleware {
    const AUTH_MIDDLEWARE = 'AuthMiddleware';
    const SITE_PROFILE_MIDDLEWARE = 'SiteProfileMiddleware';
}

class UserTypeEnum {
    const ADMIN = "01";
    const NORMAL = "02";
    const VIP = "03";
}

class UserStatusEnum {
    const NOT_VERITY = "01";
    const NORMAL = "02";
    const BANNED = "03";
    const BANNED_FOREVER = "04";
}

class RedisCacheKey {
    const SITE_PROFILE = "site_profile";
    const USER_TOKEN = "user_token:";
    const USER_PROFILE = "user_profile:";
    const REGISTER_VERIFY = "register_verify:";
    const CAPTCHA = "captcha:";
}

class CookieKey {
    const USER_TOKEN = "_user_token";
}

class HeaderKey {
    const LOGIN_STATUS = "login_status";
    const USER_INFO = "user_info";
    const SITE_PROFILE = "site_profile";
    const USER_PROFILE = "user_profile";
}

class FormKey {
    const CAPTCHA = "captcha";
    const USER_NAME = "user_name";
    const EMAIL = "email";
    const PASSWORD = "password";
    const USER = "user";
}

class SiteProfileTypeEnum {
    const WEB_TITLE = "01";
    const SITE_URL = "02";
    const WEB_FOOTER = "03";
    const KEY_WORDS = "04";
    const AUTHOR = "05";
    const DESCRIPTION = "06";
}

class DefaultSiteProfile {
    const WEB_TITLE = 'Utopia 开放平台';
    const SITE_URL = 'http://localhost';
    const WEB_FOOTER = 'Copyright ©2021 <a target="_blank" href="https://www.utopiaxc.cn/">UtopiaXC</a> All Rights Reserved | Powered By <a href="https://github.com/UtopiaXC/Utopia-Open-Platform" target="_blank">Utopia Open Platform</a>';
    const AUTHOR='UtopiaXC';
    const DESCRIPTION='UtopiaXC的个人开放平台';
    const KEY_WORDS='UtopiaXC,开放平台,API,开源';
}

class EnvKey {
    const REDIS_USE = "REDIS_USE";
}

class DatabaseDefault{
    const USER_AVATAR='/images/avatars/default_avatar.png';
    const NO_LOGIN_AVATAR='/images/avatars/user_not_login.png';
}
