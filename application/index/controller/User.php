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
        //初始化父级析构函数
        parent::__construct();
        if (!$this->isLogin()) {
            return '未登陆';
        } else {
            $this->userInfo = UserModel::getUserInfoByID(session('user')['user_id'])->toArray();
            $this->assign('userInfo',$this->userInfo);
        }
    }

    
    //    机构/企业用户中心首页
    public function cindex () {
        print_r($this->userInfo);
    }
    
    public function pindex () {
        /*$userInfo = $this->userInfo;

        dump($userInfo);
        $this->assign('userInfo',$userInfo);*/
        return $this->fetch();
    }


    //个人中心资料修改
    public function person_modify(){
        return $this->fetch();
    }

    //个人中心密码修改
    public function person_password_modify(){
        return $this->fetch();
    }

    //个人中心简历修改
    public function person_resume_modify(){
        return $this->fetch();
    }
}
