<?php
namespace app\index\validate;

/**
 * Description of Account
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class PersonalRegValidate extends BaseValidate{
    
    protected $rule = [
        'username' => 'require|length:4,25|alphaDash',
        'mobile' => 'require|number|length:11',
        'pass1' => 'require|length:6,16|alphaDash',
        'pass2' => 'require|confirm:pass1',
        'type' => 'require|isPositiveInteger|in:1,2,3'
    ];
    protected $message = [
        'username.require' => '用户名必填',
        'username.length' => '用户名长度4-25字符长度',
        'username.alphaDash' => '用户名只能为数字字母下划线',
        'mobile.require' => '手机号必填',
        'mobile.number' => '请填写正确的手机号码',
        'pass1.require' => '密码必填',
        'pass1.length' => '密码长度为6-16',
        'pass1.alphaDash' => '密码只能为数字字母下划线',
        'pass2.confirm' => '两次密码必须一致'
    ];
}
