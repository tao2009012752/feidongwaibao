<?php
namespace app\index\controller;

use think\Db;
class Index extends Common
{

    private $_tableName = 'news';

    //返回首页新闻类资讯公共部分
    /*public function $this->pub_function($par_cate_id,$news_cate_id,$limit){
        $where = [];
        $where['par_cate_id'] = $par_cate_id;
        $where['news_cate_id'] = $news_cate_id;
        $res = Db::name($this->_tableName)->where($where)->limit($limit)->order('news_id desc')->select();
        return $res;
    }*/

    public function index()
    {
        /*
         * 返回首页相关区域内容信息
         */

        //通知公告
        /*$where = [];
        $where['par_cate_id'] = 1;
        $where['news_cate_id'] = 15;
        $list['noticeInfo'] = Db::name($this->_tableName)->where($where)->limit(8)->order('news_id desc')->select();*/
        $list['noticeInfo'] = $this->pub_function(1,15,8);


        //行业资讯
        $list['industry_info'] = $this->pub_function(3,17,8);


        //国家政策
        $list['national_policy'] = $this->pub_function(4,12,5);

        //地方政策
        $list['local_policy'] = $this->pub_function(4,14,5);

        //考试信息
        $list['exam_info'] = $this->pub_function(6,19,7);

        //热门课程
        $list['popular_course'] = $this->pub_function(5,18,7);

        //人才指导
        $list['talent_guidance'] = $this->pub_function(5,25,7);


        //人才招聘
        $talentData = 'j.job_id,c.company_name,j.job_name';
        $list['recruitment'] = Db::name('jobs')->alias('j')->join('company c','c.company_id = j.company_id')->field($talentData)->limit(12)->order('job_id desc')->select();


        //企业录
        $companyData = 'company_id,company_name,image';
        $list['business_record'] = Db::name('company')->field($companyData)->limit(12)->order('company_id desc')->select();


//        return 'hello world';

        $this->assign('list', $list);
        return $this->fetch();
    }



}
