<?php

namespace app\admin\controller;

use think\Request;
use think\Db;

/**
 * 菜单
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Menus extends Common
{
    private $_tableName = 'menu';

    public function index ()
    {
        $count = Db::name($this->_tableName)->where([ 'parent_id' => 0])->count();
        $list = Db::name($this->_tableName)->where(['parent_id' => 0])->order('orderby desc')->paginate(20);
        $this->assign('count', $count);
        $this->assign('list', $list);

        return $this->fetch();
    }

    public function create ()
    {
        if (Request::instance()->isPost()) {
            $insertData = [
                'menu_name' => Request::instance()->param('menu_name'),
                'icon' => Request::instance()->param('icon'),
                'is_show' => Request::instance()->param('is_show'),
                'orderby' => Request::instance()->param('orderby'),
                'info' => Request::instance()->param('info'),
                'add_time' => time(),
                'add_ip' => Request::instance()->ip()
            ];

            if (!$insertData['menu_name']) {
                ajax_return(['code' => 1000, 'msg' => '请输入菜单名称']);
            }

            if (!$insertData['icon']) {
                ajax_return(['code' => 1001, 'msg' => '请选择图标']);
            }

            if (Db::name($this->_tableName)->insert($insertData) ) {
                ajax_return(['code' => 0, 'msg' => '新增成功']);
            } else {
                ajax_return(['code' => 2000, 'msg' => '新增失败']);
            }
        }

        return $this->fetch();
    }

    public function  edit ()
    {
        $menuId = (int) Request::instance()->param('menu_id');

        if (!$menuId || !$menuDetail = Db::name($this->_tableName)
                ->where(['menu_id' => $menuId])
                ->find()
        ) {
            $this->error('不存在此菜单信息#');
        }

        if (Request::instance()->isPost()) {
            $updateData = [
                'menu_id' => $menuId,
                'menu_name' => Request::instance()->param('menu_name'),
                'icon' => Request::instance()->param('icon'),
                'is_show' => Request::instance()->param('is_show'),
                'orderby' => Request::instance()->param('orderby'),
                'info' => Request::instance()->param('info'),
            ];
            
            if (!$updateData['menu_name']) {
                ajax_return(['code' => 1000, 'msg' => '请输入菜单名称']);
            }

            if (!$updateData['icon']) {
                ajax_return(['code' => 1001, 'msg' => '请选择图标']);
            }
           
            if (Db::name($this->_tableName)->where(['menu_id'=>$menuId])->update($updateData) ) {
                ajax_return(['code' => 0, 'msg' => '编辑成功']);
            } else {
                ajax_return(['code' => 2000, 'msg' => '编辑失败']);
            }
        }
        else {
            $this->assign('menu', $menuDetail);
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

    public function sort ()
    {
        $_POST['table_name'] = $this->_tableName;
        $ret = parent::sort();
        ajax_return($ret);
    }

    public function icons ()
    {
        $index = (int) Request::instance()->param('index');
        $this->assign('index', $index);
        return $this->fetch();
    }

    public function manageChild ()
    {
        $menuId = (int) Request::instance()->param('menu_id');

        if (!$menuId || !$menuDetail = Db::name($this->_tableName)
                ->where(['menu_id' => $menuId])
                ->find()
        ) {
            $this->error('不存在此菜单信息#');
        }

        if (Request::instance()->instance()->isPost()) {
            $newList = isset($_POST['new']) ? $_POST['new'] : [] ;
            $oldList = isset($_POST['old']) ? $_POST['old'] : [];


            foreach ($newList as $k=>$v)
            {
                $newData = [
                    'parent_id' => $menuId,
                    'menu_name' => $v['menu_name'],
                    'icon' => $v['icon'],
                    'url' => $v['url'],
                    'orderby' => (int) $v['orderby'],
                    'info' => $v['info'],
                    'is_show' => (int) $v['is_show'],
                    'add_time' => time(),
                    'add_ip' => Request::instance()->ip(),
                ];

                Db::name($this->_tableName)->insert($newData);
            }

            foreach ($oldList as $k=>$v)
            {
                $data = [
                    'menu_id' => (int) $k,
                    'menu_name' => $v['menu_name'],
                    'icon' => $v['icon'],
                    'url' => $v['url'],
                    'orderby' => (int) $v['orderby'],
                    'is_show' => (int) $v['is_show'],
                    'info' => $v['info'],
                ];

                Db::name($this->_tableName)->update($data);
            }

            ajax_return(['code' => 0, 'msg' => '操作成功']);
        }


        $count = Db::name($this->_tableName)->where(['parent_id' => $menuId])->count();
        $childs = Db::name($this->_tableName)->where(['parent_id' => $menuId])->order("orderby desc")->select();

        $this->assign('count', $count);
        $this->assign('childs', $childs);
        return $this->fetch();
    }
}