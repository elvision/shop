<?php

// 应用公共文件
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

/*
 * 生成随机字符串
 * @author DH
 * @date 2018-10-26
 */
function randString($len = 6, $type = '', $addChars = '') {
    $str = '';
    switch ($type) {
        case 0:
            $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' . $addChars;
            break;
        case 1:
            $chars = str_repeat('0123456789', 3);
            break;
        case 2:
            $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' . $addChars;
            break;
        case 3:
            $chars = 'abcdefghijklmnopqrstuvwxyz' . $addChars;
            break;
        default:
            // 默认去掉了容易混淆的字符oOLl和数字01，要添加请使用addChars参数
            $chars = 'ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789' . $addChars;
            break;
    }

    if ($len > 10) { //位数过长重复字符串一定次数
        $chars = 1 == $type ? str_repeat($chars, $len) : str_repeat($chars, 5);
    }

    $chars = str_shuffle($chars);
    $str = substr($chars, 0, $len);

    return $str;
}

/*
 * 密码加密
 * @author DH
 * @date 2018-10-26
 */
//function encrypt($password) {
//    return md5($password . randString());
//}