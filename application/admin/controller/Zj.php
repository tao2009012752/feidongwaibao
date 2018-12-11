<?php

namespace app\admin\controller;
use think\Db;
use think\Request;

/**
 * Description of Zj
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Zj extends Common{
    private $_tableName = 'zj';
    
    public function index () {
        $where['is_delete'] = 0;
        $count = Db::name($this->_tableName)
           ->where($where)
            ->count();
         $list = Db::name($this->_tableName)
            ->where($where)
            ->order('add_time DESC')
            ->paginate(10);
        $this->assign('count', $count);
        $this->assign('list', $list);
        return $this->fetch();
    }
    
    public function create () {
        if (Request::instance()->isPost()) {
            $request  = Request::instance();
            $insertData = [
                'pic' => $request->param('pic'),
                'name' => $request->param('name'),
                'info' => $request->param('info'),
                'source' => $request->param('source'),
                'add_time' => time(),
                'add_ip' => $request->ip(),
                'add_manager' => session('admin')
            ];

            
            if (!$insertData['name']) {
                ajax_return(['code' => 1003, 'msg' => '请输入专家姓名']);
            }

            if (!$insertData['pic']) {
                ajax_return(['code' => 1002, 'msg' => '请上传专家头像']);
            }

            if (!$insertData['info']) {
                ajax_return(['code' => 1004, 'msg' => '请输入专家履历']);
            }

            if (!$insertData['source']) {
                ajax_return(['code' => 1005, 'msg' => '请输入信息来源']);
            }

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
        $zj_id = (int) $request->param('zj_id');

        if (!$zj_id || !$zjDetail = Db::name($this->_tableName)
                ->where(['zj_id' => $zj_id])
                ->find()
        ) {
            $this->error('不存在此专家信息#');
        }

        if (Request::instance()->isPost()) {
            $updateData = [
                'zj_id' => $zj_id,
                'pic' => $request->param('pic'),
                'name' => $request->param('name'),
                'info' => $request->param('info'),
                'source' => $request->param('source'),
            ];

            
            if (!$updateData['name']) {
                ajax_return(['code' => 1003, 'msg' => '请输入新闻标题']);
            }

            if (!$updateData['pic']) {
                ajax_return(['code' => 1002, 'msg' => '请上传封面图']);
            }

            if (!$updateData['info']) {
                ajax_return(['code' => 1004, 'msg' => '请输入新闻内容']);
            }

            if (!$updateData['source']) {
                ajax_return(['code' => 1005, 'msg' => '请输入新闻来源']);
            }

            if (Db::name($this->_tableName)->update($updateData) ) {
                ajax_return(['code' => 0, 'msg' => '编辑成功']);
            } else {
                ajax_return(['code' => 2000, 'msg' => '编辑失败']);
            }
        }

        
        $this->assign('detail', $zjDetail);

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
}
