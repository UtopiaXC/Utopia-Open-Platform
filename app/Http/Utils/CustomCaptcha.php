<?php
namespace App\Http\Utils;
use Mews\Captcha\Captcha;
class CustomCaptcha extends \Mews\Captcha\Captcha
{
    //构造方法，传入建好的验证码对象
    public function __construct(Captcha $captcha)
    {
        parent::__construct($captcha->files, $captcha->config, $captcha->imageManager, $captcha->session, $captcha->hasher, $captcha->str);
        parent::create('flat', true);
    }
    //获取验证码的真实值
    public function getCode()
    {
        return implode($this->text);
    }

    //获取BASE64格式图片
    public function getImg()
    {
        return $this->image->encode('data-url')->encoded;
    }
}

