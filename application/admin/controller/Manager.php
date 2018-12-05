<?php
namespace app\admin\controller;

use think\Db;
use think\Request;

/**
 * 管理员
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Manager extends Common
{
    private $_tableName = 'manager';

    public function index ()
    {
        $where = $search = [];
        $where['is_delete'] = 0;

        $search['manager_name'] = Request::instance()->param('manager_name');

        if ($search['manager_name']) {
            $where['manager_name'] = ['LIKE','%'.$search['manager_name'].'%'];
        }

        $count = Db::name($this->_tableName)->where($where)->count();
        $list = Db::name($this->_tableName)->where($where)->paginate(20);
        $groups = Db::name('manager_group')->select();

        $this->assign('count', $count);
        $this->assign('list', $list);
        $this->assign('search', $search);
        $this->assign('groups', arr_trans($groups, 'manager_group_id'));

        return $this->fetch();
    }

    public function create ()
    {
        if (Request::instance()->isPost()) {
            $account = Request::instance()->param('account');
            $password = Request::instance()->param('password');
            $managerName = Request::instance()->param('manager_name');
            $managerGroup = Request::instance()->param('manager_group');

            if (!$account) {
                ajax_return(['code' => 1000, 'msg' => '请输入管理员账号']);
            }

            if (!$password) {
                ajax_return(['code' => 1000, 'msg' => '请输入管理员密码']);
            }

            if (!$managerName) {
                ajax_return(['code' => 1001, 'msg' => '请输入管理员姓名']);
            }

            if (!$managerGroup) {
                ajax_return(['code' => 1001, 'msg' => '请给管理员分配权限组']);
            }

            $insertData = [
                'account' => $account,
                'manager_name' => $managerName,
                'manager_group' => $managerGroup,
                'password' => sha1(config('passsalt').$password),
                'add_time' => time(),
                'add_ip' => Request::instance()->ip()
            ];

            if (Db::name($this->_tableName)->insert($insertData) ) {
                ajax_return(['code' => 0, 'msg' => '新增成功']);
            } else {
                ajax_return(['code' => 2000, 'msg' => '新增失败']);
            }
        }

        $this->assign('groups', Db::name('manager_group')->select());
        return $this->fetch();
    }

    public function edit ()
    {
        $managerId = (int) Request::instance()->param('manager_id');

        if (!$managerId || !$managerDetail = Db::name($this->_tableName)
                ->where(['manager_id' => $managerId])
                ->find()
        ) {
            $this->error('不存在此管理员信息#');
        }

        if (Request::instance()->isPost()) {
            $account = Request::instance()->param('account');
            $password = Request::instance()->param('password');
            $managerName = Request::instance()->param('manager_name');
            $managerGroup = Request::instance()->param('manager_group');

            if (!$account) {
                ajax_return(['code' => 1000, 'msg' => '请输入管理员账号']);
            }

            if (!$password) {
                ajax_return(['code' => 1000, 'msg' => '请输入管理员密码']);
            }

            if (!$managerName) {
                ajax_return(['code' => 1001, 'msg' => '请输入管理员姓名']);
            }

            if (!$managerGroup) {
                ajax_return(['code' => 1001, 'msg' => '请给管理员分配权限组']);
            }

            $insertData = [
                'manager_id' => $managerId,
                'account' => $account,
                'manager_name' => $managerName,
                'manager_group' => $managerGroup,
                'password' => sha1(config('passsalt').$password),
                'add_time' => time(),
                'add_ip' => Request::instance()->ip()
            ];

            if (Db::name($this->_tableName)->update($insertData) ) {
                ajax_return(['code' => 0, 'msg' => '编辑成功']);
            } else {
                echo Db::name($this->_tableName)->getLastSql();
                ajax_return(['code' => 2000, 'msg' => '编辑失败']);
            }
        }

        $this->assign('groups', Db::name('manager_group')->select());
        $this->assign('detail', $managerDetail);
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
}