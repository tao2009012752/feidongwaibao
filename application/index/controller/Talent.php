<?php

namespace app\index\controller;
use app\index\model\News;
use app\index\model\User;
use app\index\model\UserInfo;
use app\index\model\Jobs;
use think\Db;
/**
 * 人才库
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Talent extends Common{

    //人才库首页
    public function index(){
        // 资讯
        $gg = News::getNews(2);
        $zx = News::getNews(3);

        // 获取人员信息
        $users = UserInfo::getRecentUserInfo(12);


        // 职位
        $jobs = Jobs::getRecentJob(16);

        $this->assign('gg',$gg);
        $this->assign('zx',$zx);
        $this->assign('users',$users);
        $this->assign('jobs',$jobs);

        return $this->fetch();
    }


    //跳转相关人才库链接
    public function talent_model () {

        //最新人才
        $latestResume = UserInfo::getRecentUserInfo();

        $this->assign('resumeInfo',$latestResume);
        //获取type参数
        $type = input('type');
        if($type == 'talent_introduction'){
            //人才库简介
            return $this->fetch('talent_introduction');
        }else if($type == 'storage_standard'){
            //入库标准
            return $this->fetch('storage_standard');
        }else if($type == 'storage_process'){
            //入库流程
            return $this->fetch('storage_process');
        }else if($type == 'storage_join'){
            //加入人才库
            return $this->fetch('storage_join');
        }
    }


    //获取简历详情
    public function get_resume_info(){
        $userinfo_id = input('userinfo_id/d');//获取简历id
        $userInfo = Db::name('user_info')
            ->field("*,CASE sex WHEN 1 THEN '男' WHEN 2 THEN '女' WHEN 3 THEN '未知' END as sex,CASE marital_status WHEN 1 THEN '已婚' WHEN 0 THEN '未婚' ELSE '保密' END as marital_status")
            ->where(['userinfo_id'=>$userinfo_id])
            ->find();

        $this->assign('userInfo',$userInfo);

        return $this->fetch();

    }
}





