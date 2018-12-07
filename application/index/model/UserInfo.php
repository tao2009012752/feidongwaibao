<?php

namespace app\index\model;
use think\Model;
/**
 * Description of UserInfo
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class UserInfo extends Model{
    
    public static function testa ($id) {
        // 获取人才简历
        $res = self::where('user_id',$id)->find();
        return $res;
    }


    public static function getUserInfo($userinfo_id){
        // 获取人才简历
        $res = self::where('userinfo_id',$userinfo_id)->find();
        return $res;
    }


    public static function getRecentUserInfo($limit=10){
//        $res_ = self::field('userinfo_id,name,update_time,intentional_position,degree,working_years,pic,major,add_time,work_exprience')->order('userinfo_id','desc')->limit($limit)->select();
        $res_ = self::order('userinfo_id','desc')->limit($limit)->select();
        return $res_;
    }

}
