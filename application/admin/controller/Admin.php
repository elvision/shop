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

class Admin extends Common
{
    //管理员列表
    public function index()
    {
        return $this->fetch();
    }

    //提交添加管理员操作
    public function addAdmin()
    {
        if ($this->request->isPost()) {
            $data = input('post.');

            if (DB::table('__ADMIN__')->where('username', $data['username'])->count() > 0) {
                $this->error('此管理员已经存在，请勿重复添加', url('admin/index'), 0);
            }
        } else {
            $this->error('操作错误，请联系管理员', url('admin/index'), 0);
        }
    }

    //管理员登录
    public function login()
    {
        if ($this->request->isPost()) {
            $captcha = new Captcha();
            if (!$captcha->check(input('verify'))) {
                $this->error('验证码错误', url('admin/login'), 0);
            }
        }
        return $this->fetch('login');
    }
}