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
use think\Db;

class Index extends Common
{
    public function index()
    {
        $this->assign('sys_info', $this->get_sys_info());
        return $this->fetch();
    }

    //获取系统信息
    public function get_sys_info()
    {
        $sys_info['os'] = PHP_OS; //服务器操作系统
        $sys_info['web_server'] = $_SERVER['SERVER_SOFTWARE']; //web服务器
        $sys_info['php_version'] = phpversion(); //php版本
        $mysql_info = Db::query('select version() as version');
        $sys_info['mysql_version'] = $mysql_info[0]['version']; //数据库版本
        if (function_exists("gd_info")) { //gd库版本
            $gb = gd_info();
            $sys_info['gd_info'] = $gb['GD Version'];
        } else {
            $sys_info['gd_info'] = '未知';
        }
        $sys_info['file_upload'] = @ini_get('file_uploads') ? ini_get('upload_max_filesize') : '未知'; //文件上传限制
        $sys_info['safe_mode'] = (boolean)ini_get('safe_mode') ? '是' : '否'; //安全模式信息
        $sys_info['zlib'] = function_exists('gzclose') ? '是' : '否'; //zlib支持

        return $sys_info;
    }
}