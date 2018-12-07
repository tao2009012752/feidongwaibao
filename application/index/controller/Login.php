<?php
namespace app\index\controller;

use app\index\model\User;
use think\Session;

class Login extends Common
{
    //登录
    public function index(){
        return $this->fetch();
    }

    //登录处理
    public function loginAjax(){
        $account = input('username');
        $pwd = input('password');
        $mpwd = md5(md5($pwd));
        $userdata = User::where("account = '{$account}' and pwd = '{$mpwd}'")->find();
        if($userdata){
            Session::set('user',$userdata);
            ajax_return(['code'=>0,'msg'=>'登录成功']);
        }
        ajax_return(['code'=>1,'msg'=>'用户名或密码错误']);
    }

    //退出登录
    public function loginOut(){
        Session::delete('user');
        $this->redirect('/');
    }
}

