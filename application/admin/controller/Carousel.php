<?php

namespace app\admin\controller;

use think\Request;
use think\Db;

/**
 * 轮播图管理
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Carousel extends Common
{
    private $_tableName = 'carousels';

    public function index ()
    {
        $type = (int) Request::instance()->param('type');
        $where = [];

        if ($type) {
            $where['type'] = $type;
        }

        $count = Db::name($this->_tableName)->where($where)->count();
        $list = Db::name($this->_tableName)->where($where)->order('orderby desc')->paginate(20);

        $this->assign('count', $count);
        $this->assign('list', $list);
        $this->assign('types', [
            '1' => '首页轮播',
            '2' => '专题页轮播'
        ]);

        return $this->fetch();
    }

    public function create ()
    {
        if (Request::instance()->isPost()) {
            $insertData = [
                'type' => (int) Request::instance()->param('type'),
                'title' => Request::instance()->param('title'),
                'img' => Request::instance()->param('img'),
                'href' => Request::instance()->param('href'),
                'is_open' => (int) Request::instance()->param('is_open'),
                'orderby' => (int) Request::instance()->param('orderby'),
            ];

            if (!$insertData['type']) {
                ajax_return(['code' => 1000, 'msg' => '请选择轮播类型']);
            }

            if (!$insertData['img']) {
                ajax_return(['code' => 1001, 'msg' => '请上传轮播图片']);
            }

            if (!$insertData['title']) {
                ajax_return(['code' => 1001, 'msg' => '请输入轮播标题']);
            }

            if (!$insertData['href']) {
                ajax_return(['code' => 1001, 'msg' => '请输入链接地址']);
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
        $carouselId = (int) Request::instance()->param('carousel_id');

        if (!$carouselId || !$carouselInfo = Db::name($this->_tableName)
                ->where(['carousel_id' => $carouselId])
                ->find()
        ) {
            $this->error('不存在此轮播信息#');
        }

        if (Request::instance()->isPost()) {
            $updateData = [
                'carousel_id' => $carouselId,
                'type' => (int) Request::instance()->param('type'),
                'title' => Request::instance()->param('title'),
                'img' => Request::instance()->param('img'),
                'href' => Request::instance()->param('href'),
                'is_open' => (int) Request::instance()->param('is_open'),
                'orderby' => (int) Request::instance()->param('orderby'),
            ];

            if (!$updateData['type']) {
                ajax_return(['code' => 1000, 'msg' => '请选择轮播类型']);
            }

            if (!$updateData['img']) {
                ajax_return(['code' => 1001, 'msg' => '请上传轮播图片']);
            }

            if (!$updateData['title']) {
                ajax_return(['code' => 1001, 'msg' => '请输入轮播标题']);
            }

            if (!$updateData['href']) {
                ajax_return(['code' => 1001, 'msg' => '请输入链接地址']);
            }

            if (Db::name($this->_tableName)->update($updateData) ) {
                ajax_return(['code' => 0, 'msg' => '编辑成功']);
            } else {
                ajax_return(['code' => 2000, 'msg' => '编辑失败']);
            }
        }
        else {
            $this->assign('carousel', $carouselInfo);
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

}