<?php

namespace app\admin\controller;

use think\controller;
use think\Request;
use think\Db;

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
        $where['is_delete'] = 0;

        if ($type) {
            $where['type'] = $type;
        }
        $count = Db::table($this->_tableName)->where($where)->count();
        $list = Db::table($this->_tableName)->where($where)->order('friend_link_sort desc')->paginate(20);


        //将对象转换成数组
        $list_array = $list->all();

        //获取系统定义默认数组
        $sex_arr = config('sex');
        $status_arr = config('status');

        if(!empty($list_array)){
            foreach($list_array as $k=>$v){
                $list_array[$k]['sex_value'] = $sex_arr[$v['sex']];
                $list_array[$k]['is_forbidden_value'] = $status_arr[$v['is_forbidden']];
            }
        }
        
        $this->assign('count', $count);
        $this->assign('list', $list);
        $this->assign('list_array', $list_array);

        return $this->fetch();
    }


    /*
     * 添加新用户（后台）
     */
    public function create ()
    {
        if (Request::instance()->isPost()) {
            $request  = Request::instance();
            $insertData = [
                'account' => $request->param('account'),
                'pwd' =>md5(md5($request->param('pwd'))),
                'sex' =>$request->param('sex'),
                'is_forbidden' => $request->param('is_forbidden'),
                'add_time' => time(),
                'add_ip' => $request->ip(),
                'last_ip' => $request->ip(),
            ];

            if (!$insertData['account']) {
                ajax_return(['code' => 1000, 'msg' => '请输入用户名']);
            }

            $count = Db::name($this->_tableName)->where('account',$insertData['account'])->count();

            if($count >= 1){
                ajax_return(['code' => 1001, 'msg' => '用户名已存在']);
            }

            if (!$insertData['pwd']) {
                ajax_return(['code' => 1002, 'msg' => '请输入密码']);
            }

            if (Db::name($this->_tableName)->insert($insertData) ) {
                ajax_return(['code' => 0, 'msg' => '新增成功']);
            } else {
                ajax_return(['code' => 2000, 'msg' => '新增失败']);
            }
        }


        //新增用户时给定默认相关信息
        $userInfo = [];
        $userInfo['sex'] = 1;
        $userInfo['is_forbidden'] = 1;
        $this->assign('userInfo', $userInfo);

        return $this->fetch();
    }
    
    
    /*
     * 编辑用户（后台）
     */
    public function  edit ()
    {
        $userId = (int) Request::instance()->param('user_id');

        if (!$userId || !$userInfo = Db::name($this->_tableName)
                ->where(['user_id' => $userId])
                ->find()
        ) {
            $this->error('用户不存在#');
        }

        if (Request::instance()->isPost()) {
            $updateData = [
                'user_id' => $userId,
                'account' => Request::instance()->param('account'),
                'pwd' =>(Request::instance()->param('pwd')),
                'sex' =>Request::instance()->param('sex'),
                'is_forbidden' => Request::instance()->param('is_forbidden'),
                'update_time' => time()
            ];

            if (!$updateData['account']) {
                ajax_return(['code' => 1000, 'msg' => '请输入用户名']);
            }

            if (Db::name($this->_tableName)->update($updateData) ) {
                ajax_return(['code' => 0, 'msg' => '编辑成功']);
            } else {
                ajax_return(['code' => 2000, 'msg' => '编辑失败']);
            }
        }
        else {
            $this->assign('detail', $userInfo);
            return $this->fetch();
        }

    }


    public function delete ()
    {
        $_POST['table_name'] = $this->_tableName;
        $ret = parent::softDelete();
        ajax_return($ret);
    }

    public function deleteSome ()
    {
        $_POST['table_name'] = $this->_tableName;
        $ret = parent::softDeletes();
        ajax_return($ret);
    }
}
