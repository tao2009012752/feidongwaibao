<?php

namespace app\admin\controller;

use think\Request;
use think\Db;

/**
 * 分类
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class NewsCate extends Common
{
    private $_tableName = 'news_cate';

    public function index ()
    {
        $count = Db::name($this->_tableName)
            ->where([ 'parent_id' => 0, 'is_delete' => 0])
            ->count();
        $list = Db::name($this->_tableName)
            ->where(['parent_id' => 0, 'is_delete' => 0])
            ->order('orderby desc')
            ->paginate(20);

        $this->assign('count', $count);
        $this->assign('list', $list);

        return $this->fetch();
    }

    public function create ()
    {
        if (Request::instance()->isPost()) {
            $insertData = [
                'cate_name' => Request::instance()->param('cate_name'),
                'parent_id' =>0,
                'orderby' => Request::instance()->param('orderby'),
                'add_time' => time(),
            ];

            if (!$insertData['cate_name']) {
                ajax_return(['code' => 1000, 'msg' => '请输入分类名称']);
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
        $newsCateId = (int) Request::instance()->param('news_cate_id');

        if (!$newsCateId || !$newsCateInfo = Db::name($this->_tableName)
                ->where(['news_cate_id' => $newsCateId])
                ->find()
        ) {
            $this->error('不存在此新闻分类信息#');
        }

        if (Request::instance()->isPost()) {
            $updateData = [
                'news_cate_id' => $newsCateId,
                'cate_name' => Request::instance()->param('cate_name'),
                'parent_id' =>0,
                'orderby' => Request::instance()->param('orderby'),
            ];

            if (!$updateData['cate_name']) {
                ajax_return(['code' => 1000, 'msg' => '请输入分类名称']);
            }

            if (Db::name($this->_tableName)->update($updateData) ) {
                ajax_return(['code' => 0, 'msg' => '编辑成功']);
            } else {
                ajax_return(['code' => 2000, 'msg' => '编辑失败']);
            }
        }
        else {
            $this->assign('detail', $newsCateInfo);
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

    public function child ()
    {
        $newsCateId = (int) Request::instance()->param('news_cate_id');

        if (!$newsCateId || !$newsCateInfo = Db::name($this->_tableName)
                ->where(['news_cate_id' => $newsCateId])
                ->find()
        ) {
            $this->error('不存在此新闻分类信息#');
        }

        if (Request::instance()->instance()->isPost()) {
            $newList = isset($_POST['new']) ? $_POST['new'] : [] ;
            $oldList = isset($_POST['old']) ? $_POST['old'] : [];


            foreach ($newList as $k=>$v)
            {
                $newData = [
                    'parent_id' => $newsCateId,
                    'cate_name' => $v['cate_name'],
                    'orderby' => (int) $v['orderby'],
                    'is_delete' => 0,
                    'add_time' => time(),
                ];

                Db::name($this->_tableName)->insert($newData);
            }

            foreach ($oldList as $k=>$v)
            {
                $data = [
                    'news_cate_id' => (int) $k,
                    'cate_name' => $v['cate_name'],
                    'orderby' => (int) $v['orderby'],
                ];

                Db::name($this->_tableName)->update($data);
            }

            ajax_return(['code' => 0, 'msg' => '操作成功']);
        }
        
        $count = Db::name($this->_tableName)
            ->where(['parent_id' => $newsCateId, 'is_delete' => 0])
            ->count();
        $childs = Db::name($this->_tableName)
            ->where(['parent_id' => $newsCateId, 'is_delete' => 0])
            ->order("orderby desc")
            ->select();

        $this->assign('count', $count);
        $this->assign('childs', $childs);
        return $this->fetch();
    }
}