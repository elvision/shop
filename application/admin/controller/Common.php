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
    public $request;

    protected function _initialize()
    {
        $this->request = Request::instance();
        define('ACTION_NAME', $this->request->action());

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
                $this->assign('admin_name', db('admin')->where('id', session('admin_id'))->value('username'));
                $current['controller'] = strtolower($this->request->controller());
                $current['action'] = $this->request->action();
                $current['url'] = $this->request->baseUrl();
                $this->assign('current', $current);
            } else {
                $this->redirect('admin/login');
            }
        }
    }

    /**
     * 管理员操作纪律
     * @param $log_info 记录信息
     */
    public function admin_log($log_info)
    {
        $data['admin_id'] = session('admin_id');
        $data['log_info'] = $log_info;
        $data['log_ip'] = $this->request->ip();
        $data['log_url'] = $this->request->baseUrl();
        $data['log_time'] = time();
        $data['controller'] = $this->request->controller();

        db('admin_log')->insert($data); //插入表
    }
}