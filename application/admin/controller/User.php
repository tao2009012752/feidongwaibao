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

        $count = Db::table($this->_tableName)->where($where)->count();
        
        $list = Db::table($this->_tableName)
            ->where($where)
            ->order('friend_link_sort desc')
            ->join('user_info ui',"$this->_tableName.user_id = ui.uid",'LEFT')
            ->paginate(10);
        
        $this->assign('count', $count);
        $this->assign('list', $list);

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
                'pwd' =>sha1(config('passsalt').$request->param('pwd')),
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
        $userInfo['is_forbidden'] = 0;
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
                'pwd' =>sha1(config('passsalt').Request::instance()->param('pwd')),
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


    /*
     * 查看用户简历
     */
    public function viewResume(){
        //获取当前用户简历信息
        $infoId = (int) Request::instance()->param('info_id');

        if (!$infoId || !$userInfo = Db::name('user_info')
                ->where(['userinfo_id' => $infoId])
                ->find()
        ) {
            $this->error('用户简历不存在#');
        }

        $userInfo = Db::name('user_info')
            ->where(['userinfo_id' => $infoId])
            ->field("*,CASE sex WHEN 1 THEN '男' WHEN 2 THEN '女' WHEN 3 THEN '未知' END as sex,CASE marital_status WHEN 0 THEN '保密' WHEN 1 THEN '已婚' WHEN 2 THEN '未婚' END as marital_status")
            ->find();


        $this->assign('detail', $userInfo);

        return $this->fetch();
    }


    /*
     * 删除用户
     */
    public function delete ()
    {
        $_POST['table_name'] = $this->_tableName;
        $ret = parent::softDelete();
        ajax_return($ret);
    }


    /*
     * 批量删除用户
     */
    public function deleteSome ()
    {
        $_POST['table_name'] = $this->_tableName;
        $ret = parent::softDeletes();
        ajax_return($ret);
    }
}
