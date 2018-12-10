<?php

namespace app\index\controller;
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
        if(!Session::get('com'))$this->redirect('Login/index');
        $this->assign('com',Company::get(Session::get('com')['company_id']));
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
    public function password(){
        $pwd = input('password');
        if(!$pwd)ajax_return(['code'=>1,'msg'=>'密码不能为空！']);

    }

}
