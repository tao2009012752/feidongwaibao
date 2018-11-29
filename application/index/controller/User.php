<?php

namespace app\index\controller;
use app\index\model\User as UserModel;

/**
 * Description of UserCenter
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class User extends Common{
    
    protected $userInfo = [];
    
    public function __construct() {
        if (!$this->isLogin()) {
            return '未登陆';
        } else {
            $this->userInfo = UserModel::getUserInfoByID(session('user')['user_id'])->toArray();
        }
    }
    
    //    机构/企业用户中心首页
    public function cindex () {
        print_r($this->userInfo);
    }
    
    public function pindex () {
        
    }
}
