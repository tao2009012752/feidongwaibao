<?php

namespace app\index\model;
use think\Model;
/**
 * Description of Job
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Jobs extends Model{
    public function companyInfo(){
        return $this->hasOne('Company', 'company_id', 'company_id');
    }
    
    public static function getRecentJob ($limit=16,$page=false) {
        if($page){
            $res_ = self::with('companyInfo')->where('is_delete=0')->order('job_id','desc')->paginate($limit,false);
        }else{
            $res_ = self::with('companyInfo')->where('is_delete=0')->order('job_id','desc')->limit($limit)->select();
        }
        return $res_;
    }

    //通过招聘职位获取公司信息
    public static function getCompanyInfo($job_id) {
        $res_ = self::with('companyInfo')->where("is_delete=0 and job_id=$job_id")->find();
        return $res_;
    }

}
