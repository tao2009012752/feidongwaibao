<?php

namespace app\index\controller;
use app\index\model\User as UserModel;
use think\Request;
use think\Db;
use app\index\model\UserInfo;
use think\Session;


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
        $userInfo = UserModel::getUserInfoByID(session('user')['user_id'])->toArray();
        if(!Session::get('user')||!$userInfo)$this->redirect('Login/index');
        $this->assign('userInfo',$userInfo);
    }
    //用户中心
    public function center () {

        return $this->fetch();
    }


    //个人中心资料修改
    public function person_modify(){
        return $this->fetch();
    }

    //处理修改
    public function person_modify_handdle(){
        $account = input('username');
        $phone = input('phone');
        $email = input('email');
        $address = input('address');


        if(!$account)ajax_return(['code'=>1,'msg'=>'用户名不能为空']);
        if(!$phone && strlen($phone)!=11)ajax_return(['code'=>1,'msg'=>'手机号格式不正确']);
        if(!$email)ajax_return(['code'=>1,'msg'=>'邮箱不能为空']);
        if(!$address)ajax_return(['code'=>1,'msg'=>'地址不能为空']);


        $userData = [
            'account'=>$account,
            'phone'=>$phone,
//            'update_time'=>time(),
        ];

        $userInfoData = [
            'email'=>$email,
            'address'=>$address,
//            'update_time'=>time(),
        ];



//        if(UserModel::update($userData,['user_id'=>Session::get('user')['user_id']])){
        if(UserModel::update($userData,['user_id'=>Session::get('user')['user_id']]) && UserInfo::update($userInfoData,['userinfo_id'=>Session::get('user')['info']['userinfo_id']])){
            ajax_return(['code'=>0,'msg'=>'修改成功']);
        }else{
            ajax_return(['code'=>1,'msg'=>'更新失败，请重试！']);
        }
    }


    //个人中心密码修改
    public function password_modify(){
        return $this->fetch();
    }

    //修改处理
    public function password_modify_handdle(){
        $pwd = input('password');
        if(!$pwd)ajax_return(['code'=>1,'msg'=>'密码不能为空！']);
        $mpwd = sha1(config('passsalt').$pwd);
        if(UserModel::update(['pwd'=>$mpwd],['user_id'=>Session::get('user')['user_id']])){
            ajax_return(['code'=>0,'msg'=>'修改成功']);
        }else{
            ajax_return(['code'=>1,'msg'=>'更新失败，请重试！']);
        }
    }

    //个人中心简历修改
    public function person_resume_modify()
    {
        if (Request::instance()->isPost()) {
            $data = [
                'uid' => $this->userInfo['user_id'],
                'name' => input('name', ''),
                'pic' => input('pic', ''),
                'sex' => input('sex', 3),
                'birthday' => strtotime(input('birthday')),
                'age' => input('age', 0),
                'phone' => input('phone', ''),
                'email' => input('email', ''),
                'working_years' => input('working_years', ''),
                'native_place' => input('native_place', ''),
                'address' => input('address', ''),
                'nationality' => input('nationality', ''),
                'college' => input('college', ''),
                'degree' => input('degree', ''),
                'major' => input('major', ''),
                'skill' => input('skill', ''),
                'salary' => input('salary', ''),
                'work_exprience' => input('work_exprience', ''),
                'project_exprience' => input('project_exprience', ''),
                'evaluate' => input('evaluate', ''),
                'intentional_position' => input('intentional_position', ''),
                'marital_status' => input('marital_status', ''),
                'add_time' => time(),
                'update_time' => time()
            ];
            if ($this->userInfo['info']['userinfo_id']) {
                $res = Db::table("user_info")->where('userinfo_id', $this->userInfo['info']['userinfo_id'])->update($data);
            } else {
                $res = Db::table("user_info")->insert($data);
            }

            if ($res) {
                ajax_return(['code' => 0, 'msg' => '简历更新成功']);
            } else {
                ajax_return(['code' => 0, 'msg' => '简历更新失败']);
            }
        } else {
            return $this->fetch();
        }
    }

    public function resume_modify(){
        return $this->fetch();
    }
}
