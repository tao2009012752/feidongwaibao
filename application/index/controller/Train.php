<?php

namespace app\index\controller;
use app\index\model\News;

/**
 * 培训模块
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Train extends Common{
    public function index () {
        $list = News::getTopNews(21);
        $this->assign('list', $list);
        return $this->fetch();
    }
    
    public function ncsofu () {
        return $this->fetch();
    }
    public function ncsohe () {
        return $this->fetch();
    }
    public function ncsoin () {
        return $this->fetch();
    }
    public function ncsoke () {
        return $this->fetch();
    }
    public function ncsoyou () {
        return $this->fetch();
    }
    public function ncsozheng () {
        return $this->fetch();
    }
    
    public function trainDetail () {
        $id = Request::instance()->param('id/d',1);

        $newsdata = News::get($id);

        //上一篇下一篇
        $prenext = News::preNext($id,$newsdata['news_cate_id']);

        $this->assign('prenext',$prenext);
        
        $this->assign('newsdata',$newsdata);
        
        
        return $this->fetch();
    }
}
