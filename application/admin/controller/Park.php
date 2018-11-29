<?php
namespace app\admin\controller;

use think\Db;
use think\Request;

/**
 * 园区
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Park extends Common
{
    private $_tableName = 'park';

    public function index ()
    {
        $where = $search = [];
        $where['is_delete'] = 0;

        $search['park_name'] = Request::instance()->param('park_name');

        if (!empty($search['park_name'])) {
            $where['park_name'] = ['LIKE','%'.$search['park_name'].'%'];
        }

        $count = Db::name($this->_tableName)
            ->where($where)
            ->count();
        $list = Db::name($this->_tableName)
            ->where($where)
            ->order('orderby DESC')
            ->paginate(20);

        $this->assign('count', $count);
        $this->assign('list', $list);
        $this->assign('search', $search);

        return $this->fetch();
    }

    public function create ()
    {
        if (Request::instance()->isPost()) {
            $request  = Request::instance();
            $insertData = [
                'park_name' =>  $request->param('park_name'),
                'intro' => $request->param('intro'),
                'location' => $request->param('location'),
                'basic_equipment' => $request->param('basic_equipment'),
                'environment' => $request->param('environment'),
                'contact' => $request->param('contact'),
                'phone' => $request->param('phone'),
                'email' => $request->param('email'),
                'add_time' => time(),
                'add_ip' => $request->ip()
            ];

            foreach ($insertData as $val) {
                if (!$val) {
                    ajax_return(['code' => 1, 'msg' => '必填项不得为空']);
                }
            }

            $insertData['orderby'] = (int) $request->param('orderby');


            if (Db::name($this->_tableName)->insert($insertData) ) {
                ajax_return(['code' => 0, 'msg' => '新增成功']);
            } else {
                ajax_return(['code' => 2000, 'msg' => '新增失败']);
            }
        }

        return $this->fetch();
    }

    public function edit ()
    {
        $request = Request::instance();
        $parkId = (int) $request->param('park_id');

        if (!$parkId || !$parkDetail = Db::name($this->_tableName)
                ->where(['park_id' => $parkId])
                ->find()
        ) {
            $this->error('不存在此信息#');
        }

        if (Request::instance()->isPost()) {
            $updateData = [
                'park_id' => $parkId,
                'park_name' =>  $request->param('park_name'),
                'intro' => $request->param('intro'),
                'location' => $request->param('location'),
                'basic_equipment' => $request->param('basic_equipment'),
                'environment' => $request->param('environment'),
                'contact' => $request->param('contact'),
                'phone' => $request->param('phone'),
                'email' => $request->param('email'),
                'add_time' => time(),
                'add_ip' => $request->ip()
            ];

            foreach ($updateData as $val) {
                if (!$val) {
                    ajax_return(['code' => 1, 'msg' => '必填项不得为空']);
                }
            }

            $updateData['orderby'] = (int) $request->param('orderby');

            if (Db::name($this->_tableName)->update($updateData) ) {
                ajax_return(['code' => 0, 'msg' => '编辑成功']);
            } else {
                ajax_return(['code' => 2000, 'msg' => '编辑失败']);
            }
        }

        $this->assign('detail', $parkDetail);
        return $this->fetch();
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
}