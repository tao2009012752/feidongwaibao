<?php

namespace app\index\controller;
use app\index\model\News;
use app\index\model\User;
use app\index\model\Jobs;
/**
 * 人才库
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Talent extends Common{
    public function index () {
        // 资讯
        $gg = News::getNews(15);
        $zx = News::getNews(17);
        $rckjj = News::getNews(27);
        $rckbz = News::getNews(28);
        $rcklc = News::getNews(29);
        
        // 获取人员信息
        $users = User::getRecentUser(12);
        
        // 职位
        $jobs = Jobs::getRecentJob(16);

        $this->assign('gg',$gg);
        $this->assign('zx',$zx);
        $this->assign('rckjj',$rckjj);
        $this->assign('rckbz',$rckbz);
        $this->assign('rcklc',$rcklc);
        $this->assign('users',$users);
        $this->assign('jobs',$jobs);
        
        return $this->fetch();
    }
    
    // 简历信息
    public function userInfo () {
        $uid = input('user_id/d',0);
        $info = User::getUserInfoByID($uid);
        $this->assign('rcklc',$info);
    }
}

