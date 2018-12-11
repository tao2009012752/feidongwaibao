<?php

namespace app\index\controller;
use app\index\model\News;
use think\Request;
use think\Db;
/**
 * 专家库
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Zj extends Common{
    public function index () {
        // 热点新闻
        $rd = News::getNews(4);
        
        $where = ['is_delete' => 0];
        $list = Db::table('zj')->where($where) -> limit(8) -> select();
        
        $this->assign('rdlist', $rd);
        $this->assign('zjlist', $list);
        return $this->fetch();
    }
    
    public function zjDetail () {
        $zj_id = input('id','1');
        $detail = Db::table('zj')->where('zj_id',$zj_id) -> find();
        $this->assign('detail', $detail);
        return $this->fetch();
    }
}
