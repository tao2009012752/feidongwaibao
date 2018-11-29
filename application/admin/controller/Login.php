<?php
namespace app\admin\controller;

use think\Controller;
use think\Session;
use think\Request;
use think\Db;

/**
 * 登陆控制器
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Login extends Controller
{
    public function index ()
    {
        if (Session::has('admin')) {
            $this->redirect('index/index');
        }

        if (Request::instance()->isPost()) {
            $manager = Request::instance()->param('manager');
            $password = Request::instance()->param('password');

            if ($manager == 'yifu' && $password == 'yifu#2018') {    // 开发账号
                Session::set('admin','yifu');
                ajax_return(['code' => 0, 'msg' => '登录成功']);
            }

            $managerInfo = Db::name('manager')->where(['account' => $manager, 'password' => sha1(config('passsalt').$password)])->find();
            if ($managerInfo)
            {
                Session::set('admin', $managerInfo['account']);
                ajax_return(['code' => 0, 'msg' => '登录成功']);
            }
            else {
                ajax_return(['code' => 1001, 'msg' => '账号或密码错误']);
            }
        }
        
        return $this->fetch();
    }

    public function logout ()
    {
        Session::delete('admin');
        $this->redirect('login/index');
    }
}