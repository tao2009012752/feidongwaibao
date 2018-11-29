{include file="public:header" /}
<style>
    [type=number] {
        width:60px;
        border-radius: 4px;
        text-align: center;
        border:1px solid #ccc;
    }
</style>
<div class="main_box">
    <h2><span></span>管理员列表</h2>
    <div class="count">
        <div class="left">
            <button type="button" class="btn btn_info" mini="show" data-url="<{:url('newsCate/create')}>" /><i class="fa fa-plus"></i> 新增一级新闻分类</button>
            <button type="button" class="btn btn_warn" mini="sort" data-url="<{:url('newsCate/sort')}>"  /><i class="fa fa-refresh"></i> 排序</button>
            <button type="button" class="btn btn_dsure" mini="deletesome" pk_name="news_cate_id" data-url="<{:url('newsCate/deleteSome')}>" data-title="确定删除这些新闻分类么"  /><i class="fa fa-trash-o"></i> 批量删除</button>
        </div>
        <div class="right">共搜出 <{$count}> 条数据</div>
        <div class="clear"></div>
    </div>
    <div class="cont_box">
        <table border="0" cellspacing="0" cellpadding="0" class="table" id="table_box">
            <thead>
            <tr>
                <th><input type="checkbox" id="checkall"></th>
                <th>ID</th>
                <th>分类名称</th>
                <th>排序</th>
                <th>添加时间</th>
                <th width="268">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $v) {?>
            <tr >
                <td><input type="checkbox" class="check" value="<{$v['news_cate_id']}>"></td>
                <td><{$v.news_cate_id}></td>
                <td><{$v.cate_name}></td>
                <td><input type="number" pk_name="news_cate_id" pk="<{$v['news_cate_id']}>" value="<{$v.orderby}>" class="orderby" /></td>
                <td><?=date('Y-m-d H:i', $v['add_time'])?></td>
                <td>
                    <a href="javascript:void(0);"
                       class="table_btn table_info detail_btn"
                       mini="iframe_show"
                       data-title="管理新闻子分类"
                       data-url="<{:url('newsCate/child',['news_cate_id' => $v['news_cate_id']])}>"
                    >
                        <i class="fa fa-reorder"></i>
                        <span>管理子分类</span>
                    </a>
                    <a href="javascript:void(0);"
                       class="table_btn table_edit edit_btn"
                       mini="show"
                       data-url="<{:url('newsCate/edit',['news_cate_id' => $v['news_cate_id']])}>"
                    >
                        <i class="fa fa-edit"></i>
                        <span>编辑</span>
                    </a>
                    <a href="javascript:void(0);"
                       data-url="<{:url('newsCate/delete')}>"
                       mini="del" pk_name="news_cate_id"
                       data-id="<{$v.news_cate_id}>"
                       data-title="确实删除该分类么？"
                       class="table_btn table_del del_btn"
                    >
                        <i class="fa fa-trash"></i>
                        <span>删除</span>
                    </a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        <{$list->render()}>
    </div>
</div>
{include file="public:footer" /}
