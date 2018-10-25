<?php
/**
 * 后台管理员模块
 * =================================================================
 * 版权所有 2018-2028 北京鑫泰亿联视讯科技有限公司，并保留所有权利。
 * 网站地址: http://www.elvision.cn
 * =================================================================
 * $ Author: Dh 2018-10-25 $
 */

namespace app\admin\controller;

use think\captcha\Captcha;
use think\Controller;
use think\Db;
use think\Request;

class Admin extends Common
{
    public function index()
    {
        return $this->fetch();
    }

    //管理员登录
    public function login()
    {
        if (Request::instance()->isPost()) {
            $captcha = new Captcha();
            if (!$captcha->check(input('verify'))) {
                $this->error('验证码错误', url('admin/login'), 0);
            }
        }
        return $this->fetch('login');
    }
}



















