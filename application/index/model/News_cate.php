<?php

namespace app\index\model;
use think\Model;
/**
 * Description of UserInfo
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class News_cate extends Model{

    /** 获取当前id下所有子栏目id
     * @param $cate 新闻类型id
     * @param int $type 返回类型 1 字符串 2数组
     * @return array|bool|string
     */
    static function getCid($cate,$type=1){
        $catelist = self::where(['parent_id'=>$cate])->select();
        if(count($catelist)>0){
            $cateid = '';
            foreach($catelist as $v){
                $cateid .= ','.$v['news_cate_id'];
            }
            $cateid = substr($cateid,1);
            if($type!=1){
                return explode(',',$cateid);
            }else{
                return $cateid;
            }
        }
        return false;
    }

    /** 获取当前id下所有父栏目id
     * @param $cate 新闻类型id
     * @param int $type 返回类型 1 字符串 2数组
     * @return array|bool|string
     */
    static function getPid($cate,$type=1){

        $cateid = '';
        do{
            $catedata = self::where(['news_cate_id'=>$cate])->find();
            if($catedata['parent_id'])$cateid .= ','.$catedata['parent_id'];
            $cate = $catedata['parent_id'];
        }while($cate>0);
        $cateid = substr($cateid,1);

        if($type!=1){
            return explode(',',$cateid);
        }else{
            return $cateid;
        }

        return false;
    }
}
