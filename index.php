<?php

/**
 * 应用入口文件
 * =================================================================
 * 版权所有 2018-2028 北京鑫泰亿联视讯科技有限公司，并保留所有权利。
 * 网站地址: http://www.elvision.cn
 * =================================================================
 * $ Author: Dh 2018-10-23 $
 */

if (extension_loaded('zlib')){
    ob_end_clean();
    ob_start('ob_gzhandler');
}

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.4.0','<'))  die('require PHP > 5.4.0 !');
error_reporting(E_ERROR | E_WARNING | E_PARSE);//报告运行时错误

// 定义插件目录
define('PLUGIN_PATH', __DIR__ . '/plugins/');
define('UPLOAD_PATH', 'public/upload/'); // 编辑器图片上传路径
define('TPSHOP_CACHE_TIME', 1); // 缓存时间  31104000
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']); // 网站域名
define('SERIALNUMBER', '20160520065303oCWIoa');

// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');
// 定义时间
define('NOW_TIME', $_SERVER['REQUEST_TIME']);
// 加载框架引导文件
require __DIR__ . '/thinkphp/start.php';