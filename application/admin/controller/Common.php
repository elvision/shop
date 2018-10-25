<?php
/**
 * 后台首页
 * =================================================================
 * 版权所有 2018-2028 北京鑫泰亿联视讯科技有限公司，并保留所有权利。
 * 网站地址: http://www.elvision.cn
 * =================================================================
 * $ Author: Dh 2018-10-23 $
 */

namespace app\admin\controller;
use think\Controller;
use think\Request;

class Common extends Controller
{
    protected function _initialize()
    {
        $requset = Request::instance();
        define('ACTION_NAME', $requset->action());

        //过滤不需要登录的行为
        if (!in_array(ACTION_NAME, array('login'))) {
            if (session('admin_id') > 0) {
                $menuArr = include APP_PATH . 'admin/menu.php';
                foreach ($menuArr as &$value) {
                    foreach ($value['child'] as &$val) {
                        $val['url'] = $val['controller'] . '/' . $val['act'];
                    }
                }
                $this->assign('menu', $menuArr);
            } else {
                $this->redirect('admin/login');
            }
        }
    }
}