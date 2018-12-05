<?php
namespace app\index\controller;

use think\Db;
class Talent extends Common
{

    private $_tableName = 'user';


    public function index()
    {
        /*
         * 返回人才库相关区域内容信息
         */
        //通知公告
        $list['noticeInfo'] = $this->pub_function(1,15,7);

        //行业资讯
        $list['breaking_news'] = $this->pub_function(2,16,7);

        //人才照片
        $talentData = 'ui.name,ui.pic,ui.degree,ui.major';
        $list['talent_info'] = Db::name($this->_tableName)->alias('u')->join('user_info ui','u.user_id = ui.uid')->field($talentData)->order('user_id desc')->limit(11)->select();


        //最新简历
        $userData = 'name,update_time,degree,working_years,intentional_position';
        $list['latest_resume'] = Db::name('user_info')->field($userData)->order('update_time desc')->limit(20)->select();

        //推荐职位
        $talentData = 'j.job_id,c.company_name,j.job_name';
        $list['recruitment'] = Db::name('jobs')->alias('j')->join('company c','c.company_id = j.company_id')->field($talentData)->limit(16)->order('job_id desc')->select();

        

        $this->assign('list', $list);
        return $this->fetch();
    }

}
