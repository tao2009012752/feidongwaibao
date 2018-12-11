<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Db;

/**
 * 基类
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Common extends Controller
{
    public function _initialize()
    {
        header("Content-type:text/html;charset=utf-8");
        if (!Session::has('admin')) {
            $this->redirect('login/index');
        }

        if (Session::get('admin') != 'yifu') {
            // 当前控制器路径
            $url = strtolower(Request::instance()->controller()) . '/' . Request::instance()->action();
            
            if (in_array($url, ['index/index', 'index/home'])) return;

            // 获取该管理员权限
            $account = Session::get('admin');
            $menuinfo = Db::query("SELECT b.menus 
                          FROM manager AS a 
                          JOIN manager_group AS b 
                          ON a.manager_group=b.manager_group_id 
                          WHERE a.account='$account'");
            
            $menus = explode(',', $menuinfo['0']['menus']);

            // 当前控制器路径对应的菜单id
            $menuId = Db::query("SELECT menu_id FROM `menu` WHERE  replace('$url','_','') = '$url'");
            
            // 权限检测
            if (!in_array($menuId[0]['menu_id'], $menus)) {
                ajax_return(['code' => 10000, 'msg' => '你没有此权限']);
            }
        }
    }

    protected function sort()
    {
        $sort = $_POST['orderby'];
        $table = $_POST['table_name'];

        foreach ($sort as $k=>$v) {
            if (is_array($v) && count($v) == 2 && isset($v['orderby'])) {
                Db::name($table)->update($v);
            }
        }

        return ['code' => 0, 'msg' => '排序成功'];

    }

    protected function delete ()
    {
        $table = $_POST['table_name'];
        $pk = $_POST['pk_name'];
        $pkVal = $_POST['id'];

        $flag = Db::name($table)
            ->where([$pk => $pkVal])
            ->delete();

        if ($flag) {
            return ['code' => 0, 'msg' => '删除成功'];
        }
        else {
            return ['code' => 1, 'msg' => '删除失败'];
        }
    }

    protected function deleteSome ()
    {
        $table = $_POST['table_name'];
        $pk = $_POST['pk_name'];
        $ids = implode("','",$_POST['ids']);

        $flag = Db::name($table)
            ->where("$pk IN ('$ids')")
            ->delete();

        if ($flag) {
            return ['code' => 0, 'msg' => '删除成功'];
        }
        else {
            return ['code' => 1, 'msg' => '删除失败'];
        }
    }

    protected function softDelete ()
    {
        $table = $_POST['table_name'];
        $pk = $_POST['pk_name'];
        $pkVal = $_POST['id'];

        $flag = Db::name($table)->update([$pk => $pkVal, 'is_delete' => 1]);

        if ($flag) {
            return ['code' => 0, 'msg' => '删除成功'];
        }
        else {
            return ['code' => 1, 'msg' => '删除失败'];
        }
    }

    protected function softDeletes ()
    {
        $table = $_POST['table_name'];
        $pk = $_POST['pk_name'];
        $ids = implode("','",$_POST['ids']);

        $flag = Db::execute("UPDATE $table SET is_delete=1 WHERE $pk IN ('$ids')");

        if ($flag) {
            return ['code' => 0, 'msg' => '删除成功'];
        }
        else {
            return ['code' => 1, 'msg' => '删除失败'];
        }
    }
}