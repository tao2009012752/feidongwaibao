<?php

namespace app\index\controller;
use app\index\model\Company;
use app\index\model\Jobs;

/**
 * 企业信息
 * @author mersycle<mersycle@hotmail.com>
 */
class Companys extends Common{

    //企业详情
    public function index () {
        $company_id = input('id/d');

        $com = Company::get($company_id);
        $comjob = Jobs::where("company_id = {$company_id}")->order('job_id desc')->limit(6)->select();

        $this->assign('com',$com);
        $this->assign('comjob',$comjob);
        return $this->fetch();
    }

}
