<?php
namespace app\index\model;
use think\Model;
/**
 * Description of User
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class User extends Model{
    
    protected $hidden = ['password'];
    
    //    关联user_info表
    public function info(){
        return $this->hasOne('UserInfo', 'user_id', 'user_id');
    }
    
    
    public static function getUser ($user_id) {
        $user = self::get($user_id);
        return $user;
    }

    public static function getUserInfoByID($user_id){
        $userInfo = self::with('info')->find($user_id);
        return $userInfo;
    }
}
