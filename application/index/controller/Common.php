<?php

namespace app\index\controller;
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

    public function pub_function($par_cate_id,$news_cate_id,$limit){
        $where = [];
        $where['par_cate_id'] = $par_cate_id;
        $where['news_cate_id'] = $news_cate_id;
        $res = Db::name('news')->where($where)->field('title,news_id')->limit($limit)->order('news_id desc')->select();
        return $res;
    }
}
