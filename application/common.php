<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function ajax_return ($arr)
{
    echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    exit;
}

/**
 * 数组格式转化
 * 转变为数据库主键为key的形式
 */
function arr_trans ($arr, $pk)
{
    $transArr = [];

    foreach ($arr as $val)
    {
        $transArr[$val[$pk]] = $val;
    }

    return $transArr;
}