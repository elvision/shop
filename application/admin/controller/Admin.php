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
        $list = db('admin')->select();
        $this->assign('list', $list);
        return $this->fetch();
    }

    //提交添加管理员操作
    public function addAdmin()
    {
        if ($this->request->isPost()) {
            $data = input('post.');

            if (db('admin')->where('username', $data['username'])->count() > 0) {
                $this->error('此管理员已经存在，请勿重复添加', url('admin/index'), 0);
            }

            $data['encrypt'] = randString();
            $data['password'] = md5($data['password'] . $data['encrypt']);
            $data['add_time'] = time();

            $res = db('admin')->insert($data);

            if ($res) {
                $this->admin_log('添加管理员');
                $this->success('添加成功', url('admin/index'), 1);
            } else {
                $this->error('添加失败，请稍微重试', url('admin/index'), 0);
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

            $admin = db('admin')->where('username', input('username'))->find();
            if (!$admin || md5(input('password') . $admin['encrypt']) !== $admin['password']) {
                $this->error('用户名或密码错误，请重新输入', url('admin/login'), 0);
            } else {
                session('admin_id', $admin['id']);
                db('admin')->where('username', input('username'))->update(['last_login'=>time(), 'last_ip'=>$this->request->ip()]);

                $this->admin_log('后台登录');
                $this->success('登录成功', url('Index/index'), 1);
            }
        }
        return $this->fetch();
    }

    //管理员日志列表
    public function a() {

    }
}