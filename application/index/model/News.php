<?php

namespace app\index\model;
use think\Model;
/**
 * Description of UserInfo
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class News extends Model{

    /** 获取新闻
     * @param $cate 新闻类型
     * @param int $num 数量
     * @return false|\PDOStatement|string|\think\Collection
     */
    static function getNews($cate,$num=8){
        $where = array();
        $where['is_delete'] = 0;
        if($cate)$where['news_cate_id'] = $cate;
        return News::field('news_id,title,add_time')->where($where)->limit($num)->select();
    }
}
