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
        $cateid = News_cate::getCid($cate);
        if($cateid){
            $where = " is_delete = 0 and news_cate_id in({$cateid}) ";
            return self::field('news_id,title,add_time')->where($where)->paginate($num,false,['query'=>Request::instance()->param()]);
        }
        return false;
    }
}
