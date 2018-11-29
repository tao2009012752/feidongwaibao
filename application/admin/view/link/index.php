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
    <h2><span></span>友情链接设置</h2>
    <div class="count">
        <div class="left">
            <button type="button" class="btn btn_info" mini="show" data-url="<{:url('link/add')}>" /><i class="fa fa-plus"></i> 新增友情链接</button>
            <button type="button" class="btn btn_warn" mini="sort" data-url="<{:url('link/sort')}>"  /><i class="fa fa-refresh"></i> 排序</button>
            <button type="button" class="btn btn_dsure" mini="deletesome" pk_name="friend_link_id" data-url="<{:url('link/deleteSome')}>" data-title="确定删除这些轮播么"  /><i class="fa fa-trash-o"></i> 批量删除</button>
        </div>
        <div class="right">共搜出 <{$count}> 条数据</div>
        <div class="clear"></div>
    </div>
    <div class="cont_box">
        <table border="0" cellspacing="0" cellpadding="0" class="table">
            <thead>
            <tr>
                <th><input type="checkbox" id="checkall"></th>
                <th>ID</th>
                <th>友情链接</th>
                <th>链接地址</th>
                <th>排序</th>
                <th>是否显示</th>
                <th width="200">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($list as $val){ ?>
            <tr>
                <td><input type="checkbox" class="check" value="<{$val['friend_link_id']}>"></td>
                <td><{$val.friend_link_id}></td>
                <td><{$val.friend_link_name}></td>
                <td style="width: 100px !important;"><{$val.friend_link_url}></td>
                <td><input type="number" pk_name="friend_link_id" pk="<{$val['friend_link_id']}>" value="<{$val.friend_link_sort}>" class="orderby" /></td>
                <td><?=$val['is_show'] ? '是':'否'; ?></td>
                <td>
                    <a href="javascript:void(0);"
                       class="table_btn table_edit edit_btn"
                       mini="show"
                       data-url="<{:url('link/edit',['friend_link_id' => $val['friend_link_id']])}>"
                    >
                        <i class="fa fa-edit"></i>
                        <span>编辑</span>
                    </a>
                    <a href="javascript:void(0);"
                       data-url="<{:url('link/delete')}>"
                       mini="del" pk_name="friend_link_id"
                       data-id="<{$val.friend_link_id}>"
                       data-title="确实删除该轮播图么？"
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