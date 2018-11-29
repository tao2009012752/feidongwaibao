<?php

namespace app\admin\controller;

use think\controller;
use think\Request;

/**
 * 个人用户管理
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class User extends Common{
    private $_tableName = 'user';
    
    public function index () {
        
        $type = (int) Request::instance()->param('type');
        $where = [];

        if ($type) {
            $where['type'] = $type;
        }
        $count = Db::table($this->_tableName)->where($where)->count();
        $list = Db::table($this->_tableName)->where($where)->order('friend_link_sort desc')->paginate(20);
        
        $this->assign('count', $count);
        $this->assign('list', $list);
        
        return $this->fetch();
    }
}
