<?php
namespace app\admin\controller;

use think\Db;
use think\Request;

/**
 * 新闻
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class News extends Common
{
    private $_tableName = 'news';

    public function index ()
    {
        $where = $search = [];
        $where['is_delete'] = 0;

        $search['title'] = Request::instance()->param('title');
        $search['par_cate'] = (int) Request::instance()->param('par_cate');
        $search['child_cate'] = (int) Request::instance()->param('child_cate');

        if (!empty($search['title'])) {
            $where['title'] = ['LIKE','%'.$search['title'].'%'];
        }

        if ($search['par_cate'] > 0) {
            $where['par_cate_id'] = $search['par_cate'];
        }

        if ($search['child_cate'] > 0) {
            $where['news_cate_id'] = $search['child_cate'];
        }

        $count = Db::name($this->_tableName)
            ->where($where)
            ->count();
        $list = Db::name($this->_tableName)
            ->where($where)
            ->order('add_time DESC')
            ->paginate(20);
        $cates = Db::name('news_cate')
            ->where(['is_delete' => 0])
            ->select();

        $this->assign('count', $count);
        $this->assign('list', $list);
        $this->assign('search', $search);
        $this->assign('cates',$cates);
        $this->assign('cates2', arr_trans($cates,'news_cate_id'));
        $this->assign('json_cates', json_encode($cates));

        return $this->fetch();
    }

    public function create ()
    {
        if (Request::instance()->isPost()) {
            $request  = Request::instance();
            $insertData = [
                'par_cate_id' => (int) $request->param('par_cate_id'),
                'news_cate_id' => (int) $request->param('news_cate_id'),
                'cover' => $request->param('cover'),
                'title' => $request->param('title'),
                'content' => $request->param('content'),
                'source' => $request->param('source'),
                'add_time' => time(),
                'add_ip' => $request->ip()
            ];

            if (!$insertData['par_cate_id']) {
                ajax_return(['code' => 1000, 'msg' => '请选择新闻分类']);
            }

            if (!$insertData['news_cate_id']) {
                ajax_return(['code' => 1001, 'msg' => '请选择新闻分类']);
            }

            if (!$insertData['title']) {
                ajax_return(['code' => 1003, 'msg' => '请输入新闻标题']);
            }

            if (!$insertData['cover']) {
                ajax_return(['code' => 1002, 'msg' => '请上传封面图']);
            }

            if (!$insertData['content']) {
                ajax_return(['code' => 1004, 'msg' => '请输入新闻内容']);
            }

            if (!$insertData['source']) {
                ajax_return(['code' => 1005, 'msg' => '请输入新闻来源']);
            }

            if (Db::name($this->_tableName)->insert($insertData) ) {
                ajax_return(['code' => 0, 'msg' => '新增成功']);
            } else {
                ajax_return(['code' => 2000, 'msg' => '新增失败']);
            }
        }

        $cates = Db::name('news_cate')
            ->where(['is_delete' => 0])
            ->select();
        $this->assign('cates',$cates);
        $this->assign('json_cates', json_encode($cates));

        return $this->fetch();
    }

    public function edit ()
    {
        $request = Request::instance();
        $newsId = (int) $request->param('news_id');

        if (!$newsId || !$newsDetail = Db::name($this->_tableName)
                ->where(['news_id' => $newsId])
                ->find()
        ) {
            $this->error('不存在此新闻信息#');
        }

        if (Request::instance()->isPost()) {
            $updateData = [
                'news_id' => $newsId,
                'par_cate_id' => (int) $request->param('par_cate_id'),
                'news_cate_id' => (int) $request->param('news_cate_id'),
                'cover' => $request->param('cover'),
                'title' => $request->param('title'),
                'content' => $request->param('content'),
                'source' => $request->param('source'),
            ];

            if (!$updateData['par_cate_id']) {
                ajax_return(['code' => 1000, 'msg' => '请选择新闻分类']);
            }

            if (!$updateData['news_cate_id']) {
                ajax_return(['code' => 1001, 'msg' => '请选择新闻分类']);
            }

            if (!$updateData['title']) {
                ajax_return(['code' => 1003, 'msg' => '请输入新闻标题']);
            }

            if (!$updateData['cover']) {
                ajax_return(['code' => 1002, 'msg' => '请上传封面图']);
            }

            if (!$updateData['content']) {
                ajax_return(['code' => 1004, 'msg' => '请输入新闻内容']);
            }

            if (!$updateData['source']) {
                ajax_return(['code' => 1005, 'msg' => '请输入新闻来源']);
            }

            if (Db::name($this->_tableName)->update($updateData) ) {
                ajax_return(['code' => 0, 'msg' => '编辑成功']);
            } else {
                ajax_return(['code' => 2000, 'msg' => '编辑失败']);
            }
        }

        $cates = Db::name('news_cate')
            ->where(['is_delete' => 0])
            ->select();
        $this->assign('cates',$cates);
        $this->assign('json_cates', json_encode($cates));
        $this->assign('detail', $newsDetail);

        return $this->fetch();
    }

    public function delete ()
    {
        $_POST['table_name'] = $this->_tableName;
        $ret = parent::softDelete();
        ajax_return($ret);
    }

    public function deleteSome ()
    {
        $_POST['table_name'] = $this->_tableName;
        $ret = parent::softDeletes();
        ajax_return($ret);
    }
}