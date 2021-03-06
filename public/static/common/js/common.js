/**
 * 页面公用js
 * =================================================================
 * 版权所有 2018-2028 北京鑫泰亿联视讯科技有限公司，并保留所有权利。
 * 网站地址: http://www.elvision.cn
 * =================================================================
 * $ Author: Dh 2018-10-25 $
 */
/* 通用含验证码表单不带检查提交，失败不跳转 */
$(function() {
    $('.ajaxForm1').ajaxForm({
        success: complete1, //提交后的方法
        dataType: 'json'
    });
    $('.ajaxForm2').ajaxForm({
        success: complete, //提交后的方法
        dataType: 'json'
    });
});

//成功跳转，失败不跳转，验证码刷新
function complete1(result) {
    if (result.data == 1) {
        window.location.href = result.url;
    } else {
        $('#verify').val('');
        $('#verify_img').click();
        layer.alert(result.msg, {icon: 5});
    }
}

//成功提示，失败不跳转
function complete(result){
    if(result.data == 1){
        layer.alert(result.msg, {icon: 6}, function(index){
            layer.close(index);
            window.location.href = result.url;
        });
    }else{
        layer.alert(result.msg, {icon: 5});
    }
}