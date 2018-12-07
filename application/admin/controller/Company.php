<?php
namespace app\admin\controller;

use think\Db;
use think\Request;

/**
 * 企业用户管理
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Company extends Common
{
    private $_tableName = 'company';

    public function index ()
    {
        $where = $search = [];
        $where['is_delete'] = 0;

        $search['company_name'] = Request::instance()->param('company_name');

        if (!empty($search['company_name'])) {
            $where['company_name'] = ['LIKE','%'.$search['company_name'].'%'];
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
                'account' =>  $request->param('account'),
                'company_name' =>  $request->param('company_name'),
                'logo' =>  $request->param('logo'),
                'image' =>  $request->param('image'),
                'intro' => $request->param('intro'),
                'location' => $request->param('location'),
                'core_business' => $request->param('core_business'),
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

        //新增用户时给定默认相关信息
        $companyInfo = [];
        $companyInfo['is_open'] = 1;
        $this->assign('companyInfo', $companyInfo);

        return $this->fetch();
    }

    public function edit ()
    {
        $request = Request::instance();
        $companyId = (int) $request->param('company_id');

        if (!$companyId || !$companyInfo = Db::name($this->_tableName)
                ->where(['company_id' => $companyId])
                ->find()
        ) {
            $this->error('不存在此信息#');
        }

        if (Request::instance()->isPost()) {
            $updateData = [
                'company_id' => $companyId,
                'account' =>  $request->param('account'),
                'company_name' =>  $request->param('company_name'),
                'logo' =>  $request->param('logo'),
                'image' =>  $request->param('image'),
                'intro' => $request->param('intro'),
                'location' => $request->param('location'),
                'core_business' => $request->param('core_business'),
                'contact' => $request->param('contact'),
                'phone' => $request->param('phone'),
                'email' => $request->param('email'),
            ];

            foreach ($updateData as $val) {
                if (!$val) {
                    ajax_return(['code' => 1, 'msg' => '必填项不得为空']);
                }
            }

            $updateData['orderby'] = (int) $request->param('orderby');
            $updateData['update_time'] = time();

            if (Db::name($this->_tableName)->update($updateData) ) {
                ajax_return(['code' => 0, 'msg' => '编辑成功']);
            } else {
                ajax_return(['code' => 2000, 'msg' => '编辑失败']);
            }
        }

        $this->assign('detail', $companyInfo);
        return $this->fetch();
    }


    //返回在招职位信息
    public function viewJobs(){
        $companyId = (int) Request::instance()->param('company_id');

        if (!$companyId || !$companyInfo = Db::name($this->_tableName)
                ->where(['company_id' => $companyId])
                ->find()
        ) {
            $this->error('不存在该企业信息#');
        }
        

        $where = [];
        $where['j.is_delete'] = 0;
        $where['j.company_id'] = $companyId;


        $count = Db::name('jobs')
            ->alias('j')
            ->where($where)
            ->count();
        $list = Db::name('jobs')
            ->alias('j')
            ->field("j.*,c.company_name,CASE j.sex WHEN 1 THEN '男' WHEN 2 THEN '女' WHEN 3 THEN '未知' END as sex")
            ->join('company c','j.company_id = c.company_id')
            ->order('job_id desc')
            ->where($where)
            ->paginate(2);

        //将对象转换成数组
        $list_array = $list->all();


        $this->assign('count', $count);
        $this->assign('list',$list_array);
        $this->assign('list',$list);

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