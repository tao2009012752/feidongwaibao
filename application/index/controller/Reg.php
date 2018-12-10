<?php
namespace app\index\controller;

use app\index\model\User;
use app\index\model\Company;
use think\Session;

class Reg extends Common
{
    //注册
    public function index(){
        return $this->fetch();
    }

    //公司注册
    public function comreg(){
        return $this->fetch();
    }

    //个人注册
    public function perreg(){
        return $this->fetch();
    }

    //个人注册处理
    public function perRegAjax(){
        $account = input('username');
        $phone = input('phone');
        $pwd = input('password');
        $cpwd = input('cpassword');

        if(preg_match('/^(?![a-zA-Z0-9]+$)/',$account))ajax_return(['code'=>1,'msg'=>'账号只能是数字加字母']);
        if(strlen($account)<6||strlen($account)>16)ajax_return(['code'=>1,'msg'=>'账号长度为6至16个字符']);
        if(!$account)ajax_return(['code'=>1,'msg'=>'用户名不能为空']);
        if(!$phone && strlen($phone)!=11)ajax_return(['code'=>1,'msg'=>'手机号格式不正确']);
        if(!$pwd)ajax_return(['code'=>1,'msg'=>'密码不能为空']);
        if($pwd != $cpwd)ajax_return(['code'=>1,'msg'=>'两次密码输入不一致！']);

        $check = User::where("account = '{$account}'")->select();
        if(count($check)>0)ajax_return(['code'=>1,'msg'=>'此账号已存在！']);
        $data = [
            'account'=>$account,
            'phone'=>$phone,
            'pwd'=>sha1(config('passsalt').$pwd),
            'add_time'=>time(),
            'add_ip'=>getIp(),
            'last_ip'=>getIp(),
            'is_forbidden'=>1
        ];

        if(User::create($data)){
            ajax_return(['code'=>0,'msg'=>'']);
        }else{
            ajax_return(['code'=>1,'msg'=>'注册失败，请重试！']);
        }
    }

    //企业注册处理
    public function comRegAjax(){
        $account = input('username');
        $pwd = input('password');
        $cpwd = input('cpassword');
        $logo = input('logo');
        $company_name = input('name');
        $core_business = input('core');
        $image = input('image');
        $intro = input('intro');
        $contact = input('contact');
        $phone = input('phone');
        $email = input('email');
        $location = input('location');

        if(preg_match('/^(?![a-zA-Z0-9]+$)/',$account))ajax_return(['code'=>1,'msg'=>'账号只能是数字加字母']);
        if(strlen($account)<6||strlen($account)>16)ajax_return(['code'=>1,'msg'=>'账号长度为6至16个字符']);
        if(!$account)ajax_return(['code'=>1,'msg'=>'用户名不能为空']);
        if(!$pwd)ajax_return(['code'=>1,'msg'=>'密码不能为空']);
        if($pwd != $cpwd)ajax_return(['code'=>1,'msg'=>'两次密码输入不一致！']);
        if(substr($logo,-10)=='upload.png')ajax_return(['code'=>1,'msg'=>'企业logo不能为空']);
        if(!$company_name)ajax_return(['code'=>1,'msg'=>'企业名不能为空']);
        if(!$core_business)ajax_return(['code'=>1,'msg'=>'核心业务不能为空']);
        if(substr($image,-10)=='upload.png')ajax_return(['code'=>1,'msg'=>'企业实景拍摄不能为空']);
        if(!$intro)ajax_return(['code'=>1,'msg'=>'简介不能为空']);
        if(!$contact)ajax_return(['code'=>1,'msg'=>'联系人不能为空']);
        if(!$phone && strlen($phone)!=11)ajax_return(['code'=>1,'msg'=>'手机号格式不正确']);
        if(!$email)ajax_return(['code'=>1,'msg'=>'邮箱不能为空']);
        if(!$location)ajax_return(['code'=>1,'msg'=>'地址人不能为空']);

        $check = Company::where("account = '{$account}'")->select();
        if(count($check)>0)ajax_return(['code'=>1,'msg'=>'此账号已存在！']);

        $data = [
            'account'=>$account,
            'pwd'=>sha1(config('passsalt').$pwd),
            'logo'=>$logo,
            'company_name'=>$company_name,
            'core_business'=>$core_business,
            'image'=>$image,
            'intro'=>$intro,
            'contact'=>$contact,
            'phone'=>$phone,
            'email'=>$email,
            'location'=>$location,
            'update_time'=>time(),
            'add_time'=>time(),
            'add_ip'=>getIp(),
        ];

        if(Company::create($data)){
            ajax_return(['code'=>0,'msg'=>'']);
        }else{
            ajax_return(['code'=>1,'msg'=>'注册失败，请重试！']);
        }
    }

    //注册成功
    public function regSuccess(){
        return $this->fetch();
    }

    //协议
    public function xieyi(){

    }
}

