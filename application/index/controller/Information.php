<?php
namespace app\index\controller;

use think\Db;
class Information extends Common
{

    private $_tableName = 'news';


    public function index()
    {
        /*
         * 返回资讯中心相关区域内容信息
         */
        //行业资讯
//        $list['business_record'] = Db::name($this->_tableName)->field($companyData)->limit(12)->order('news_id desc')->select();
        $where = [];
        $where['par_cate_id'] = 3;
        $where['news_cate_id'] = 17;
        $business_record = Db::name($this->_tableName)->where($where)->order('news_id DESC')->paginate(25);


        //热点新闻  breaking news
        $list['breaking_news'] = $this->pub_function(2,16,10);



        $this->assign('list', $list);
        $this->assign('business_record', $business_record);
        return $this->fetch();
    }

    public function news_detail(){
        $request = Request::instance();
        $newsId = (int) $request->param('news_id');
        if (!$newsId || !$newsInfo = Db::name($this->_tableName)
                ->where(['news_id' => $newsId])
                ->find()
        ) {
            $this->error('文章信息不存在#');
        }


        $this->assign('detail', $newsInfo);
        return $this->fetch();
    }

}
