<?php

namespace app\index\controller;
use app\index\model\User as UserModel;
use think\Request;
use think\Db;

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
        $userInfo = $this->userInfo;
        $this->assign('userInfo',$userInfo);
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
        if (Request::instance()->isPost()) {
            $data = [
                'uid' => $this->userInfo['user_id'],
                'name' => input('name',''),
                'pic' => input('pic',''),
                'sex' => input('sex',3),
                'birthday' => strtotime(input('birthday')),
                'age' => input('age',0),
                'phone' => input('phone',''),
                'email' => input('email',''),
                'working_years' => input('working_years',''),
                'native_place' => input('native_place',''),
                'address' => input('address',''),
                'nationality' => input('nationality',''),
                'college' => input('college',''),
                'degree' => input('degree',''),
                'major' => input('major',''),
                'skill' => input('skill',''),
                'salary' => input('salary',''),
                'work_exprience' => input('work_exprience',''),
                'project_exprience' => input('project_exprience',''),
                'evaluate' => input('evaluate',''),
                'intentional_position' => input('intentional_position',''),
                'marital_status' => input('marital_status',''),
                'add_time' => time(),
                'update_time' => time()
            ];
            if ($this->userInfo['info']['userinfo_id']) {
                $res = Db::table("user_info")->where('userinfo_id',$this->userInfo['info']['userinfo_id'])->update($data);
            } else {
                $res = Db::table("user_info")->insert($data);
            }
            
            if ($res) {
                ajax_return(['code' => 0, 'msg' => '简历更新成功']);
            }else {
                ajax_return(['code' => 0, 'msg' => '简历更新失败']);
            }
        } else {
            return $this->fetch();
        }  
    }
}
