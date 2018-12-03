<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

/**
 * 个人用户管理
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Third extends Controller{

    /**
     * 上传图片
     */
    public function upload()
    {
        // 获取表单上传文件
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file
            ->validate(['size'=>5000000, 'ext'=>'jpg,png,gif'])  // 文件大小不超过5M
            ->move(ROOT_PATH . 'public' . DS . 'uploads');

        if($info){
            // 成功上传后 获取上传信息
            ajax_return(['code' => 0, 'msg' => '', 'file_path' => '/uploads/' . $info->getSaveName()]);
        }
        else{
            // 上传失败获取错误信息
            ajax_return(['code' => 1, 'msg' => $file->getError()]);
        }
    }

}