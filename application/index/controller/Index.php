<?php
namespace app\index\controller;

use app\index\model\Carousels;
use app\index\model\News;
use app\index\model\News_cate;
use think\Request;

class Index extends Common
{
    //首页
    public function index()
    {
        //轮播
        $lb = Carousels::where(['is_open'=>1])->order('orderby desc')->select();

        //新闻
        $gg = News::getNews(15);
        $zx = News::getNews(17);
        $gjzc = News::getNews(12);
        $dfzc = News::getNews(14);
        $ks = News::getNews(19);
        $kc = News::getNews(18);
        $zd = News::getNews(23);

        $this->assign('lblist',$lb);
        $this->assign('gglist',$gg);
        $this->assign('zxlist',$zx);
        $this->assign('gjzclist',$gjzc);
        $this->assign('dfzclist',$dfzc);
        $this->assign('kslist',$ks);
        $this->assign('kclist',$kc);
        $this->assign('zdlist',$zd);
        return $this->fetch();
    }

    //资讯中心
    public function newsList(){
        $cate = Request::instance()->param('cate/d',1);

        $catedata = News_cate::get($cate);
        $pagelist = News::getTopNews($cate,25);
        $rd = News::getNews(16);

        $this->assign('catedata',$catedata);
        $this->assign('pagelist',$pagelist);
        $this->assign('rdlist',$rd);
        return $this->fetch();
    }
}
