<?php

namespace app\index\controller;
use think\Config;
use think\Controller;
use think\Session;
use think\Request;
use think\Db;
/**
 * Description of Common
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Common extends Controller{


    public function __construct()
    {
        parent::__construct();

        /*静态配置*/
        $static = Config::get('static');
        $this->assign('css',$static['css']);
        $this->assign('js',$static['js']);
        $this->assign('font',$static['font']);
        $this->assign('img',$static['img']);
        $res_ = Db::table('system')
        ->where('system_id','=',1)
        ->find(); 
        $this->assign('system', $res_);
        
        /*登录信息*/
        $this->assign('userdata',Session::get('user')?Session::get('user'):Session::get('com'));
    }

    public function isLogin () {
        if (Session::get('user')) {
            return true;
        }
        return false;
    }
    
    public function checkCode () {
        $request = Request::instance();
        $where = [
            'mobile' => $request->param('mobile'),
            'code' => $request->param('code')
        ];
        
        $res = db('code')->where($where)->find();
        
        if (!$res) {
            return '验证码错误';
        } elseif($res['expire'] < time()) {
            return '验证码错误或已过期，请重新发送';
        } else {
            return true;
        }
    }
}

