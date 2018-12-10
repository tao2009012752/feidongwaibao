<?php

namespace app\admin\controller;
use think\Db;
use think\Request;
use think\Session;

/**
 * 系统配置
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class System extends Common{
    public function index () {
       $systemInfo = Db::table('system')->select();
       $this->assign('systemInfo', $systemInfo);
       return $this->fetch();
    }
    
    public function edit () {
        $request = Request::instance();
       
        if ($request->isPost()) {
            
            $updateData = [
                'webname' =>$request->param('webname'),
                'keywords' =>$request->param('keywords'),
                'description' => $request->param('description'),
                'icp' => $request->param('icp'),
                'phone' => $request->param('phone'),
                'support' => $request->param('support'),
                'support_phone' => $request->param('support_phone'),
                'last_manager' => Session::get('admin'),
                'last_time' => time(),
                'last_ip' => $request->ip()
            ];
            $where = ['system_id' => (int) $request->param('system_id',1),];
            
            if (!$where) {
                ajax_return(['code' => 1000, 'msg' => '修改内容不存在，请重试']);
            }
            if (!$updateData['webname']) {
                ajax_return(['code' => 1001, 'msg' => '网站名称不能为空']);
            }
            if (!$updateData['keywords']) {
                ajax_return(['code' => 1001, 'msg' => '关键词不能为空']);
            }
            if (!$updateData['description']) {
                ajax_return(['code' => 1001, 'msg' => '描述不能为空']);
            }
            if (!$updateData['icp']) {
                ajax_return(['code' => 1001, 'msg' => '备案号不能为空']);
            }
            if (!$updateData['phone']) {
                ajax_return(['code' => 1001, 'msg' => '电话不能为空']);
            }
            if (!$updateData['support']) {
                ajax_return(['code' => 1001, 'msg' => '技术支持不能为空']);
            }
            if (!$updateData['support_phone']) {
                ajax_return(['code' => 1001, 'msg' => '技术支持电话不能为空']);
            }
            
            if (Db::name('system')->where($where)->update($updateData) ) {
                ajax_return(['code' => 0, 'msg' => '修改成功']);
            } else {
                ajax_return(['code' => 2000, 'msg' => '修改失败']);
            }
        } else {
            $systemInfo = Db::table('system')->where('system_id='.input('system_id',1))->find();
        
            if (!$systemInfo) {
                $this->error('此信息有误#');
            }
            $this->assign('systemInfo',$systemInfo);
            return $this->fetch();
        }
    }
}