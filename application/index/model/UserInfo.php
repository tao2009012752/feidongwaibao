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
    
}
