<?php

namespace app\index\controller;
use app\index\model\Jobs;

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

        $this->assign('joblist',$job);
        $this->assign('page',$page);

        return $this->fetch();
    }
    
    // 职位列表
    public function jobList () {
        
    }

    // 职位详情
    public function jobDetail () {
        
    }
    
    // 企业列表
    public function comList () {
        
    }
    
    // 企业详情
    public function comDetail () {
        
    }
    
}
