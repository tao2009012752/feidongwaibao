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
//        print_r($id);
        $res = self::where('user_id',$id)->find();
        
        return $res;
    }
    //put your code here
}
