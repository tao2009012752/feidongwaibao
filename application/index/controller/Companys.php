<?php

namespace app\index\controller;
use app\index\model\Apply;
use app\index\model\Company;
use app\index\model\Jobs;
use think\Session;

/**
 * 企业信息
 * @author mersycle<mersycle@hotmail.com>
 */
class Companys extends Common{


    public function _initialize()
    {
        parent::_initialize();
        $data = Company::get(Session::get('com')['company_id']);
        if(!Session::get('com')||$data)$this->redirect('Login/index');
        $this->assign('com',$data);
    }

    //企业详情
    public function index () {
        $company_id = input('id/d');

        $com = Company::get($company_id);
        $comjob = Jobs::where("company_id = {$company_id}")->order('job_id desc')->limit(6)->select();

        $this->assign('com',$com);
        $this->assign('comjob',$comjob);
        return $this->fetch();
    }

    //企业中心
    public function center(){
        return $this->fetch();
    }

    //企业基本信息修改
    public function edit(){
        return $this->fetch();
    }

    //企业基本信息修改处理
    public function editsub(){

        $logo = input('logo');
        $company_name = input('name');
        $core_business = input('core');
        $image = input('image');
        $intro = input('intro');
        $contact = input('contact');
        $phone = input('phone');
        $email = input('email');
        $location = input('location');

        if(substr($logo,-10)=='upload.png')ajax_return(['code'=>1,'msg'=>'企业logo不能为空']);
        if(!$company_name)ajax_return(['code'=>1,'msg'=>'企业名不能为空']);
        if(!$core_business)ajax_return(['code'=>1,'msg'=>'核心业务不能为空']);
        if(substr($image,-10)=='upload.png')ajax_return(['code'=>1,'msg'=>'企业实景拍摄不能为空']);
        if(!$intro)ajax_return(['code'=>1,'msg'=>'简介不能为空']);
        if(!$contact)ajax_return(['code'=>1,'msg'=>'联系人不能为空']);
        if(!$phone && strlen($phone)!=11)ajax_return(['code'=>1,'msg'=>'手机号格式不正确']);
        if(!$email)ajax_return(['code'=>1,'msg'=>'邮箱不能为空']);
        if(!$location)ajax_return(['code'=>1,'msg'=>'地址人不能为空']);

        $data = [
            'logo'=>$logo,
            'company_name'=>$company_name,
            'core_business'=>$core_business,
            'image'=>$image,
            'intro'=>$intro,
            'contact'=>$contact,
            'phone'=>$phone,
            'email'=>$email,
            'location'=>$location,
            'update_time'=>time(),
        ];

        if(Company::update($data,['company_id'=>Session::get('com')['company_id']])){
            ajax_return(['code'=>0,'msg'=>'修改成功']);
        }else{
            ajax_return(['code'=>1,'msg'=>'更新失败，请重试！']);
        }
    }

    //密码修改
    public function pwdEdit(){
        return $this->fetch();
    }

    //密码修改chu处理
    public function passWordEdit(){
        $pwd = input('password');
        if(!$pwd)ajax_return(['code'=>1,'msg'=>'密码不能为空！']);
        $mpwd = sha1(config('passsalt').$pwd);
        if(Company::update(['pwd'=>$mpwd],['company_id'=>Session::get('com')['company_id']])){
            ajax_return(['code'=>0,'msg'=>'修改成功']);
        }else{
            ajax_return(['code'=>1,'msg'=>'更新失败，请重试！']);
        }
    }

    //发布职位
    public function publish(){
        return $this->fetch();
    }

    //发布职位处理
    public function publishAdd(){

        $job_name = input('name');
        $need_num = input('num');
        $work_place = input('place');
        $due = input('due');
        $degree = input('degree');
        $requirements = input('require');
        $min_salary = input('minsalary');
        $max_salary = input('maxsalary');

        if(!$job_name)ajax_return(['code'=>1,'msg'=>'工作名不能为空!']);
        if(!$need_num)ajax_return(['code'=>1,'msg'=>'需求人数不能为空!']);
        if(!$work_place)ajax_return(['code'=>1,'msg'=>'工作地点不能为空!']);
        if(!$due)ajax_return(['code'=>1,'msg'=>'责任不能为空!']);
        if(!$degree)ajax_return(['code'=>1,'msg'=>'学历不能为空!']);
        if(!$requirements)ajax_return(['code'=>1,'msg'=>'工作需求不能为空!']);
        if($min_salary>$max_salary || $min_salary<0)ajax_return(['code'=>1,'msg'=>'最大薪资不能小于最小薪资!']);

        $data = [
            'job_name'=>$job_name,
            'company_id'=>Session::get('com')['company_id'],
            'need_num'=>$need_num,
            'work_place'=>$work_place,
            'due'=>$due,
            'sex'=>3,
            'degree'=>$degree,
            'requirements'=>$requirements,
            'min_salary'=>$min_salary,
            'max_salary'=>$max_salary,
            'update_time'=>time(),
        ];

        if(Jobs::create($data)){
            ajax_return(['code'=>0,'msg'=>'修改成功']);
        }else{
            ajax_return(['code'=>1,'msg'=>'添加失败，请重试！']);
        }
    }

    //接收简历
    public function shou(){
        $id = Session::get('com')['company_id'];
        $list = Apply::alias('a')
            ->join('user_info u','a.user_id = u.uid')
            ->where("a.company_id = {$id} and a.is_delete = 0")->select();
        $this->assign('list',$list);
        return $this->fetch();
    }

}
