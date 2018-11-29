<?php

namespace app\admin\controller;
use think\Request;
use think\Session;
use think\Db;

/**
 * 友情链接
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Link extends Common{
    private $_tableName = 'friend_link';
    
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
    
    public function add () {
        $request = Request::instance();
        if ($request->isPost()) {
            $addData = [
                'friend_link_name' => $request->param('friend_link_name'),
                'friend_link_url' => $request->param('friend_link_url'),
                'is_show' => $request->param('is_show'),
                'friend_link_sort' => $request->param('friend_link_sort'),
                'last_ip' => $request->ip(),
                'last_manager' => Session::get('admin'),
                'last_time' => time(),
                'is_delete' => 0
            ];
            
            if (!$addData['friend_link_name']) {
                ajax_return(['code' => 1000, 'msg' => '友情链接名必须填写']);
            }
            if (!$addData['friend_link_url']) {
                ajax_return(['code' => 1000, 'msg' => '链接地址必须填写']);
            }
            if (!$addData['friend_link_sort']) {
                ajax_return(['code' => 1000, 'msg' => '排序必须填写']);
            }
            
            $res = Db::table($this->_tableName)->insert($addData);
            if ($res) {
                ajax_return(['code' => 0, 'msg' => '添加成功']);
            } else {
                ajax_return(['code' => 1000, 'msg' => '添加失败']);
            }
        }
        return $this->fetch();
    }
    
    public function edit () {
        
        $request = Request::instance();
        $friend_link_id = (int) $request->param('friend_link_id');
        $friend_link_info = Db::table($this->_tableName)->where(['friend_link_id'=>$friend_link_id])->find();
        
        if (empty($friend_link_id) || empty($friend_link_info)) {
            $this->error('不存在此友情链接信息#');
        }
        
        if ($request->isPost()) {
           
            $updateData = [
                'friend_link_name' => $request->param('friend_link_name'),
                'friend_link_url' => $request->param('friend_link_url'),
                'is_show' => $request->param('is_show'),
                'friend_link_sort' => $request->param('friend_link_sort'),
                'last_ip' => $request->ip(),
                'last_manager' => Session::get('admin'),
                'last_time' => time(),
                'is_delete' => 0
            ];
            
            if (!$updateData['friend_link_name']) {
                ajax_return(['code' => 1000, 'msg' => '友情链接名必须填写']);
            }
            if (!$updateData['friend_link_url']) {
                ajax_return(['code' => 1000, 'msg' => '链接地址必须填写']);
            }
            if (!$updateData['friend_link_sort']) {
                ajax_return(['code' => 1000, 'msg' => '排序必须填写']);
            }
            
            $res = Db::table($this->_tableName)->where(['friend_link_id'=>$friend_link_id])->update($updateData);
            
            if ($res) {
                ajax_return(['code' => 0, 'msg' => '修改成功']);
            } else {
                ajax_return(['code' => 1000, 'msg' => '修改失败']);
            }
        }
        
        $this->assign('friendLinkInfo',$friend_link_info);
        return $this->fetch();
    }
    
    public function delete ()
    {
        $_POST['table_name'] = $this->_tableName;
        $ret = parent::delete();
        ajax_return($ret);
    }

    public function deleteSome ()
    {
        $_POST['table_name'] = $this->_tableName;
        $ret = parent::deleteSome();
        ajax_return($ret);
    }

    public function sort ()
    {
        $_POST['table_name'] = $this->_tableName;
        $ret = parent::sort();
        ajax_return($ret);
    }
}
