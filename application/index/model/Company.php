<?php

namespace app\index\model;
use think\Model;
/**
 * Description of Company
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Company extends Model{
    //put your code here
    public function jobsInfo(){
        return $this->hasMany('Jobs', 'company_id', 'company_id');
    }

    public static function geCompanyJobs($company_id){
        $res_ = self::with('jobsInfo')->where("is_delete=0 and company_id=$company_id")->find();
        return $res_;
    }
}
