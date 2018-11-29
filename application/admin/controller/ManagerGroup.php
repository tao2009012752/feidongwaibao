<?php
namespace app\admin\controller;

use think\Db;
use think\Request;

/**
 * 管理员组
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class ManagerGroup extends Common
{
    private $_tableName = 'manager_group';

    public function index ()
    {
        $count = Db::name($this->_tableName)->count();
        $list = Db::name($this->_tableName)->order('orderby desc')->paginate(20);

        $this->assign('count', $count);
        $this->assign('list', $list);

        return $this->fetch();
    }

    public function create ()
    {
        if (Request::instance()->isPost()) {
            $groupName = Request::instance()->param('group_name');
            $menus = isset($_POST['menus']) ? $_POST['menus'] : '';

            if (!$groupName) {
                ajax_return(['code' => 1000, 'msg' => '请输入权限组名称']);
            }

            if (!$menus) {
                ajax_return(['code' => 1001, 'msg' => '请选择权限']);
            }

            $addData = [
                'group_name' => $groupName,
                'menus' => implode(',', $menus),
                'orderby' => (int) Request::instance()->param('orderby'),
                'info' => Request::instance()->param('info'),
                'add_time' => time(),
                'add_ip' => Request::instance()->ip()
            ];

            if (Db::name('manager_group')->insert($addData) ) {
                ajax_return(['code' => 0, 'msg' => '新增成功']);
            } else {
                ajax_return(['code' => 2000, 'msg' => '新增失败']);
            }
        }

        // 获取所有一级菜单
        $parMenu = Db::name('menu')->where(['parent_id' => 0])->select();
        // 获取所有二级菜单
        $chidMenu = Db::query("SELECT * FROM menu WHERE parent_id<>0");

        $this->assign('par_menu', $parMenu);
        $this->assign('chid_menu', $chidMenu);
        return $this->fetch();
    }

    public function  edit ()
    {
        $groupId = (int) Request::instance()->param('manager_group_id');

        if (!$groupId || !$groupDetail = Db::name($this->_tableName)
                ->where(['manager_group_id' => $groupId])
                ->find()
        ) {
            $this->error('不存在此权限组信息#');
        }

        if (Request::instance()->isPost()) {
            $groupName = Request::instance()->param('group_name');
            $menus = isset($_POST['menus']) ? $_POST['menus'] : '';

            if (!$groupName) {
                ajax_return(['code' => 1000, 'msg' => '请输入权限组名称']);
            }

            if (!$menus) {
                ajax_return(['code' => 1001, 'msg' => '请选择权限']);
            }

            $updateData = [
                'manager_group_id' => $groupId,
                'group_name' => $groupName,
                'menus' => implode(',', $menus),
                'orderby' => (int) Request::instance()->param('orderby'),
                'info' => Request::instance()->param('info'),
            ];

            if (Db::name('manager_group')->update($updateData) ) {
                ajax_return(['code' => 0, 'msg' => '编辑成功']);
            } else {
                ajax_return(['code' => 2000, 'msg' => '编辑失败']);
            }
        }
        else {
            // 获取所有一级菜单
            $parMenu = Db::name('menu')->where(['parent_id' => 0])->select();
            // 获取所有二级菜单
            $chidMenu = Db::query("SELECT * FROM menu WHERE parent_id<>0");

            $this->assign('group_info', $groupDetail);
            $this->assign('par_menu', $parMenu);
            $this->assign('chid_menu', $chidMenu);
            $this->assign('menus', explode(',', $groupDetail['menus']));
            return $this->fetch();
        }

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