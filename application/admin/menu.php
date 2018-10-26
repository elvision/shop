<?php
/**
 * 后台左侧栏目配置文件
 * =================================================================
 * 版权所有 2018-2028 北京鑫泰亿联视讯科技有限公司，并保留所有权利。
 * 网站地址: http://www.elvision.cn
 * =================================================================
 * $ Author: Dh 2018-10-24 $
 */

return array(
    'goods' => array('name' => '商品管理', 'icon' => 'shopping-bag', 'child' => array(
        array('name' => '商品分类', 'controller' => 'Goods', 'act' => 'goodsTypeList'),
        array('name' => '商品列表', 'controller' => 'Goods', 'act' => 'goodsList'),
        array('name' => '添加新商品', 'controller' => 'Goods', 'act' => 'goodsList'),
        array('name' => '商品属性', 'controller' => 'Goods', 'act' => 'goodsList'),
    )),
    'order' => array('name' => '订单管理', 'icon' => 'credit-card', 'child' => array(
        array('name' => '订单列表', 'controller' => 'Order', 'act' => 'goodsList'),
        array('name' => '发货单', 'controller' => 'Order', 'act' => 'goodsList'),
        array('name' => '退款单', 'controller' => 'Order', 'act' => 'goodsList'),
        array('name' => '退换货', 'controller' => 'Order', 'act' => 'goodsList'),
        array('name' => '添加订单', 'controller' => 'Order', 'act' => 'goodsList'),
        array('name' => '订单日志', 'controller' => 'Order', 'act' => 'goodsList'),
    )),
    'promotion' => array('name' => '促销管理', 'icon' => 'gift', 'child' => array(
        array('name' => '抢购管理', 'controller' => 'Promotion', 'act' => 'goodsList'),
        array('name' => '团购管理', 'controller' => 'Promotion', 'act' => 'goodsList'),
        array('name' => '优惠促销', 'controller' => 'Promotion', 'act' => 'goodsList'),
        array('name' => '订单促销', 'controller' => 'Promotion', 'act' => 'goodsList'),
        array('name' => '优惠券', 'controller' => 'Promotion', 'act' => 'goodsList'),
    )),
    'user' => array('name' => '会员管理', 'icon' => 'diamond', 'child' => array(
        array('name' => '会员列表', 'controller' => 'User', 'act' => 'goodsList'),
        array('name' => '会员等级', 'controller' => 'User', 'act' => 'goodsList'),
//        array('name' => '充值记录', 'controller' => 'User', 'act' => 'goodsList'),
//        array('name' => '提现申请', 'controller' => 'User', 'act' => 'goodsList'),
//        array('name' => '汇款记录', 'controller' => 'User', 'act' => 'goodsList'),
    )),
    'report' => array('name' => '报表统计', 'icon' => 'pie-chart', 'child' => array(
        array('name' => '销售概况', 'controller' => 'Report', 'act' => 'goodsList'),
        array('name' => '销售排行', 'controller' => 'Report', 'act' => 'goodsList'),
        array('name' => '会员排行', 'controller' => 'Report', 'act' => 'goodsList'),
        array('name' => '销售明细', 'controller' => 'Report', 'act' => 'goodsList'),
    )),
    'ad' => array('name' => '广告管理', 'icon' => 'file-image-o', 'child' => array(
        array('name' => '广告列表', 'controller' => 'Ad', 'act' => 'goodsList'),
        array('name' => '广告位置', 'controller' => 'Ad', 'act' => 'goodsList'),
    )),
    'article' => array('name' => '文章管理', 'icon' => 'file-text-o', 'child' => array(
        array('name' => '文章列表', 'controller' => 'Article', 'act' => 'goodsList'),
        array('name' => '文章分类', 'controller' => 'Article', 'act' => 'goodsList'),
    )),
    'admin' => array('name' => '权限管理', 'icon' => 'lock', 'child' => array(
        array('name' => '管理员列表', 'controller' => 'Admin', 'act' => 'index'),
        array('name' => '管理员日志', 'controller' => 'Admin', 'act' => 'goodsList'),
        array('name' => '角色管理', 'controller' => 'Admin', 'act' => 'goodsList'),
        array('name' => '权限资源列表', 'controller' => 'Admin', 'act' => 'goodsList'),
    )),
    'system' => array('name' => '系统设置', 'icon' => 'cog', 'child' => array(
        array('name' => '商城设置', 'controller' => 'System', 'act' => 'goodsList'),
        array('name' => '自定义导航栏', 'controller' => 'System', 'act' => 'goodsList'),
        array('name' => '友情链接', 'controller' => 'System', 'act' => 'goodsList'),
        array('name' => '清除缓存', 'controller' => 'System', 'act' => 'goodsList'),
    )),
);