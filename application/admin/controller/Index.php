<?php
namespace app\admin\controller;

use think\session;
use think\Db;

/**
 * 首页
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Index extends Common
{
    public function index ()
    {
        $account = session::get('admin');

        // 只展现自己拥有的权限菜单
        if ($account == 'yifu') {
            $menus = Db::name('menu')->where('is_show=1')->order('orderby desc')->select();
        } else {
            $menuinfo = Db::query("SELECT b.menus 
                          FROM manager AS a 
                          JOIN manager_group AS b 
                          ON a.manager_group=b.manager_group_id 
                          WHERE a.account='$account'");
            $menus = Db::name('menu')->where("menu_id IN ({$menuinfo['0']['menus']}) AND is_show=1")->order('orderby desc')->select();
        }
        
        $this->assign('menus', $menus);
        return $this->fetch();
    }

    public function home()
    {
        $account = session::get('admin');
        $this->assign('admin', $account);
        return $this->fetch();
    }
}