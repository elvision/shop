<?php
/**
 * 前台配置文件
 * =================================================================
 * 版权所有 2018-2028 北京鑫泰亿联视讯科技有限公司，并保留所有权利。
 * 网站地址: http://www.elvision.cn
 * =================================================================
 * $ Author: Dh 2018-10-23 $
 */

return [
    //模板配置
    'template' => [
        //模板路径
        'view_path' => './template/home/default/',
        //标签库标签开始标签
        'taglib_begin' => '<',
        //标签库标签结束标签
        'taglib_end' => '>',
    ],
    'view_replace_str' => [
        '__PUBLIC__' => './public/static',
        '__STATIC__' => './public/static/home',
    ]
];