<?php

namespace app\index\controller;
use think\Request;
use think\Session;
use think\Db;
use app\index\validate\PersonalRegValidate;
use app\index\validate\OtherRegValidate;
use app\index\validate\LoginValidate;
/**
 * Description of Login
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Account extends Common{
    
    //    用户注册
    public function reg () {
        
        if ($this->isLogin()) {
            return '已登录';
        }
        
        $request = Request::instance();
        
        if ($request->isPost()) {
            
            $res = (new PersonalRegValidate()) ->goCheck();
            $checkMsg = $this->checkCode($request->param('code'),$request->param('mobile'));
            if ($res !== true) {
                return $res;
            } else if ($checkMsg !== true) {
                return $checkMsg;
            }
            $addData = [
                    'mobile' => $request->param('mobile'),
                    'username' => $request->param('username'),
                    'password' => md5($request->param('pass1')),
                    'type' => $request->param('type'),
                    'is_audit' => 0,
                    'add_time' => time(),
                    'add_ip' => $request->ip()
                ];
            
            $info = db('user')->where(['username'=>$addData['username']])->find();
            $info1 = db('user')->where(['mobile'=>$addData['mobile']])->find();
            if ($info) {
                return '用户名已存在'; 
            } elseif  ($info1) {
                return '手机号已注册'; 
            }
            
            //            个人用户注册
            if ($request->param('type') == 1) {
                
                $res = db('user')->insert($addData);
                if (!$res) {
                    return '个人注册失败';
                }
                return '个人注册成功';
            } else {
                
                $res = (new OtherRegValidate()) ->goCheck();
                if ($res !== true) {
                    return $res;
                }
                
                $addInfoData = [
                    'cname' => $request->param('cname'),
                    'contact' => $request->param('contact'),
                    'contact_mobile' => $request->param('contact_mobile'),
                    'contact_email' => $request->param('contact_email')
                ];
                
                // 启动事务
                Db::startTrans();
                try {
                    Db::table('user')->insert($addData);
                    $addInfoData['user_id'] = Db::table('user')->getLastInsID();
                    Db::table('user_info')->insert($addInfoData);
                    // 提交事务
                    Db::commit();
                } catch (\Exception $e) {
                    // 回滚事务
                    Db::rollback();
                    return '注册失败';
                }
                return '注册成功';
            }
        }
        
        switch ($request->param('type')) {
            case 2:
                return $this->fetch('regOrganization');
                break;
            case 3:
                return $this->fetch('regCompany');
                break;
            default:
                return $this->fetch('regPersonal');
                break;
        }    
    }
    
    //    登陆页
    public function login() {
        /*if ($this->isLogin()) {
            return $this->redirect('index/index');
        }*/
        return $this->fetch();
    }


    //用户登录
    public function user_login(){
        //如果已登录，默认直接进入首页或个人中心
        if ($this->isLogin()) {
            ajax_return(['code' => 1000, 'msg' => '已登录']);
        }

        $request = Request::instance();
        $res = (new LoginValidate())->goCheck();
        if($res !== true){
            return $res;
        }
        $user_info = db('user')
            ->where([
                'account' => $request->param('account'),
                'pwd' => md5($request->param('pwd').config('passsalt')),
                'is_delete' => 0
            ])->find();

        if ($user_info) {
            Session::set('user.user_id',$user_info['user_id']);
            Session::set('user.account',$user_info['account']);

            //获取当前企业相关信息
            $userInfo = db('company')
                ->where([
                    'user_id' => $user_info['user_id'],
                    'is_delete' => 0
                ])->find();
            Session::set('userInfo',$userInfo);

            ajax_return(['code' => 0, 'msg' => '登录成功']);
        }
        ajax_return(['code' => 1001, 'msg' => '用户名或密码错误']);
    }


    //企业登录
    public function company_login(){
        //如果已登录，默认直接进入首页或企业中心
        if ($this->isLogin()) {
            ajax_return(['code' => 1000, 'msg' => '已登录']);
        }

        $request = Request::instance();
        $company_info = db('company')
            ->where([
                'account' => $request->param('account'),
                'pwd' => md5($request->param('pwd').config('passsalt')),
                'is_delete' => 0
            ])->find();

        if ($company_info) {
            Session::set('user.company_id',$company_info['company_id']);
            Session::set('user.account',$company_info['account']);

            //获取当前企业相关信息
            $companyInfo = db('company')
                ->where([
                    'company_id' => $company_info['company_id'],
                    'is_delete' => 0
                ])->find();
            Session::set('companyInfo',$companyInfo);

            ajax_return(['code' => 0, 'msg' => '登录成功']);
        }
        ajax_return(['code' => 1001, 'msg' => '用户名或密码错误']);
    }

    
    /*//    用户登陆普通登陆
    public function login1 () {
        if ($this->isLogin()) {
            return '已登录';
        }
        
        $request = Request::instance();
        $res = (new LoginValidate())->goCheck();
        if($res !== true){
            return $res;
        }
        $userInfo = db('user')
                ->where([
                    'username' => $request->param('username'),
                    'password' => md5($request->param('password'))
                ])->find();

        if ($userInfo) {
            Session::set('user.user_id',$userInfo['user_id']);
            Session::set('user.username',$userInfo['username']);
            Session::set('user.type',$userInfo['type']);

            return '登陆成功';
        }
        return '登陆失败';
    }
    
    //    短信登陆
    public function login2 () {
        if ($this->isLogin()) {
            return '已登录';
        }
        $request = Request::instance();
        if ($request->isPost()) {
            $checkData = [
                'mobile' => $request->param('mobile'),
                'code' => $request->param('code')
            ];
            
            $res = (new LoginValidate())->goCheck();
            if($res !== true){
                return $res;
            }
            
            $checkMsg = $this->checkCode($request->param('code'),$request->param('mobile'));
            if ($checkMsg !== true) {
                return $checkMsg;
            }

            $userInfo = db('user')->where(['mobile'=>$checkData['mobile']])->find();

            if ($userInfo) {
                Session::set('user.user_id',$userInfo['user_id']);
                Session::set('user.username',$userInfo['username']);
                Session::set('user.type',$userInfo['type']);
                return '登陆成功';
            }
            return '用户未注册';
        }
        return $this->redirect('account/login');
    }*/
    
    //    退出
    public function logout () {
        Session::delete('user');
        return $this->redirect('account/login');
    }
}
