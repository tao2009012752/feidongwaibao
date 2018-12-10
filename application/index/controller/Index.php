<?php
namespace app\index\controller;

use app\index\model\Carousels;
use app\index\model\Company;
use app\index\model\Jobs;
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
        $gg = News::getNews(2);
        $zx = News::getNews(3);
        $gjzc = News::getNews(10);
        $dfzc = News::getNews(11);
        $ks = News::getNews(15);
        $ksxw = News::getNews(16);
        $kc = News::getNews(21);
        $zd = News::getNews(22);

        //招聘
        $jobs = Jobs::getRecentJob(12);
        //公司
        $com = Company::where('is_open = 1 and is_delete = 0')->limit(6)->order('company_id desc')->select();
        
        $this->assign('lblist',$lb);
        $this->assign('gglist',$gg);
        $this->assign('zxlist',$zx);
        $this->assign('gjzclist',$gjzc);
        $this->assign('dfzclist',$dfzc);
        $this->assign('kslist',$ks);
        $this->assign('ksxwlist',$ksxw);
        $this->assign('kclist',$kc);
        $this->assign('zdlist',$zd);
        $this->assign('joblist',$jobs);
        $this->assign('comlist',$com);
        return $this->fetch();
    }

    //资讯中心
    public function newsList(){
        $cate = Request::instance()->param('cate/d',1);

        //热点新闻
        $rd = News::getNews(4);
        //左侧导航栏
        $catearr = News_cate::getPid($cate,2);
        if(count($catearr)==1){ //如果此id为一级栏目id转换为对应的二级栏目第一个
            $cate = News_cate::getCid($cate,2);
            $cate = $cate[0];
        }
        $catedata = News_cate::get($cate);
        $lm = News_cate::where("is_delete = 0 and parent_id = {$catearr[count($catearr)-1]}")->order('orderby desc')->select();

        $pagelist = News::getTopNews($cate,25);
        $page = empty($pagelist)?false:$pagelist->render();

        $this->assign('rdlist',$rd);
        $this->assign('lmlist',$lm);
        $this->assign('catedata',$catedata);
        $this->assign('pagelist',$pagelist);
        $this->assign('page',$page);
        return $this->fetch();
    }

    //新闻详细页
    public function listDetail(){
        $id = Request::instance()->param('id/d',1);

        $newsdata = News::get($id);

        //热点新闻
        $rd = News::getNews(4);
        //左侧导航
        $catearr = News_cate::getPid($newsdata['news_cate_id'],2);
        $lm = News_cate::where("is_delete = 0 and parent_id = {$catearr[count($catearr)-1]}")->order('orderby desc')->select();
        $catedata = News_cate::get($newsdata['news_cate_id']);
        //上一篇下一篇
        $prenext = News::preNext($id,$newsdata['news_cate_id']);

        $this->assign('prenext',$prenext);
        $this->assign('catedata',$catedata);
        $this->assign('newsdata',$newsdata);
        $this->assign('rdlist',$rd);
        $this->assign('lmlist',$lm);
        return $this->fetch();
    }

    //搜索页
    public function search(){
        $keywords = input('keywords');

        $new = News::where("title like '%{$keywords}%'")->order('news_id desc')->paginate(28,false);
        $page = $new->render();
        $listnum = count($new);

	    $this->assign('keywords',$keywords);
        $this->assign('newlist',$new);
        $this->assign('page',$page);
        $this->assign('num',$listnum);
        return $this->fetch();
    }
}

