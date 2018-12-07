<?php
namespace app\index\controller;

use app\index\model\User;
use think\Session;

class Reg extends Common
{
    //注册
    public function index(){
        return $this->fetch();
    }

    //注册处理
    public function regAjax(){
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

}

