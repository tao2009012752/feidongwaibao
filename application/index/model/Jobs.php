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
    
    public static function getRecentJob ($limit=16) {
        $res_ = self::with('companyInfo')->order('job_id','desc')->limit($limit)->select();
        return $res_;
    }
}
