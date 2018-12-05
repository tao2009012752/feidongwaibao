<?php

namespace app\index\model;
use think\Model;
use think\Request;

/**
 * Description of UserInfo
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class News extends Model{

    /** 获取二级新闻
     * @param $cate 新闻类型
     * @param int $num 数量
     * @return false|\PDOStatement|string|\think\Collection
     */
    static function getNews($cate,$num=8){
        $where = array();
        $where['is_delete'] = 0;
        if($cate)$where['news_cate_id'] = $cate;
        return self::field('news_id,title,add_time')->where($where)->limit($num)->select();
    }

    /** 获取一级新闻
     * @param $cate 新闻类型
     * @param int $num $page 数量
     * @return false|\PDOStatement|string|\think\Collection
     */
    static function getTopNews($cate,$num=8){
        //获取下级所有id
        $cateid = News_cate::getCid($cate);
        if($cateid){
            $where = " is_delete = 0 and news_cate_id in({$cateid}) ";
            return self::field('news_id,title,add_time')->where($where)->paginate($num,false);
        }
        return false;
    }

    /** 获取上一篇与下一篇数据
     * @param $news_id 新闻id
     * @param string $cate 类型id
     * @return array
     */
    static function preNext($news_id,$cate=''){
        $result = array();
        $where = 'is_delete = 0 ';

        if($cate){
            $cateid = News_cate::getCid($cate);
            if($cateid)$where .= " and news_cate_id in({$cateid}) ";
        }

        $pre = self::field('news_id,title,add_time')->where($where.' and news_id <'.$news_id)->order('news_id desc')->limit(1)->select();
        $next = self::field('news_id,title,add_time')->where($where.' and news_id >'.$news_id)->order('news_id asc')->limit(1)->select();

        $result['pre'] = isset($pre[0]['news_id'])?$pre[0]:false;
        $result['next'] = isset($next[0]['news_id'])?$next[0]:false;
        return $result;
    }
}
