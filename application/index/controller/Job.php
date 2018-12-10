<?php

namespace app\index\controller;
use app\index\model\Apply;
use app\index\model\Jobs;
use app\index\model\UserInfo;
use app\index\model\Company;
use think\Session;

/**
 * 职位企业等信息
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Job extends Common{

    //招聘
    public function index () {

        $job = Jobs::getRecentJob(28,true);
        $page = $job->render();

        if(Session::get('user')){
            $userjob = Apply::where('user_id = '.Session::get('user')['user_id'])->select();
            $userjoblist = array();
            array_walk($userjob, function($value, $key) use (&$userjoblist){
                $userjoblist[] = $value['job_id'];
            });
        }

        $this->assign('joblist',$job);
        $this->assign('page',$page);
//        $this->assign('userjob',$userjoblist);
        return $this->fetch();
    }
    
    //投递简历
    public function applyAjax () {
        $job_id = input('jid/d');
        if(!Session::get('user'))ajax_return(['code' => 2, 'msg' => '未登录']);
        $user_id = Session::get('user')['user_id'];
        $userdata = UserInfo::where("uid = {$user_id}")->find();
        if(empty($userdata))ajax_return(['code' => 1, 'msg' => '您还没创建简历']);
        if($job_id && $user_id){
            $jobdata = Jobs::get($job_id);
            $data = [
                'user_id'   => $user_id,
                'job_id'    => $jobdata['job_id'],
                'company_id'=> $jobdata['company_id'],
                'add_time'  => time(),
                'add_ip'    => getIp(),
                'status'    => 1
            ];
            if(Apply::create($data))ajax_return(['code' => 0, 'msg' => '投递成功']);
            ajax_return(['code' => 1, 'msg' => '投递失败']);
        }
    }

    // 职位详情
    public function jobDetail () {
        $job_id = input('job_id/d');

        //找屁岗位的具体信息
        $job_info = Jobs::getCompanyInfo($job_id);

        //当前公司的热门招聘
        $hot_jobs = Company::geCompanyJobs($job_info['companyInfo']['company_id']);
        $hot_jobs_info = $hot_jobs->jobs_info;
        //对数组进行倒叙排列
        arsort($hot_jobs_info);

        $this->assign('job_info',$job_info);
        $this->assign('hot_jobs',$hot_jobs_info);
        return $this->fetch();
    }
    
    // 企业列表
    public function comList () {
        
    }
    
    // 企业详情
    public function comDetail () {
        
    }
    
}
