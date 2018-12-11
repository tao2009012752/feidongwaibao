<?php
namespace app\index\controller;

use app\index\model\Company;
use app\index\model\User;
use think\Session;

class Login extends Common
{
    //登录
    public function index(){
        return $this->fetch();
    }

    public function tlogin(){
        return $this->fetch();
    }

    //登录处理
    public function loginAjax(){
        $account = input('username');
        $pwd = input('password');
        $type = input('type');

        $mpwd = sha1(config('passsalt').$pwd);
        if($type == 1){
            $logindata = User::where("account = '{$account}' and pwd = '{$mpwd}'")->find();
            if($logindata){
                Session::set('user',$logindata);
                ajax_return(['code'=>0,'msg'=>'登录成功']);
            }
        }else{
            $logindata = Company::where("account = '{$account}' and pwd = '{$mpwd}'")->find();
            if($logindata){
                Session::set('com',$logindata);
                ajax_return(['code'=>0,'msg'=>'登录成功']);
            }
        }
        ajax_return(['code'=>1,'msg'=>'用户名或密码错误']);
    }

    //退出登录
    public function loginOut(){
        Session::delete('user');
        Session::delete('com');
        $this->redirect('/');
    }
}

