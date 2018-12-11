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
    <h2><span></span>用户列表</h2>
    <div class="count">
        <div class="left">
            <button type="button" class="btn btn_info" mini="show" data-url="<{:url('User/create')}>" /><i class="fa fa-plus"></i> 新增用户</button>
            <button type="button" class="btn btn_dsure" mini="deletesome" pk_name="user_id" data-url="<{:url('User/deleteSome')}>" data-title="确定删除这些新闻分类么"  /><i class="fa fa-trash-o"></i> 批量删除</button>
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
                <th>用户名</th>
                <th>是否能登陆</th>
                <th>注册时间</th>
                <th width="268">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $v) {?>
            <tr >
                <td><input type="checkbox" class="check" value="<{$v['user_id']}>"></td>
                <td><{$v.user_id}></td>
                <td><{$v.account}></td>
                <td><{$v.is_forbidden}></td>
                <td><?=date('Y-m-d H:i', $v['add_time'])?></td>
                <td>
                    <a href="javascript:void(0);"
                       class="table_btn table_info detail_btn"
                       mini="show"
                       data-url="<{:url('User/viewResume',['info_id' => $v['userinfo_id']])}>"
                    >
                        <i class="fa fa-reorder"></i>
                        <span>查看简历</span>
                    </a>
                    <a href="javascript:void(0);"
                       class="table_btn table_edit edit_btn"
                       mini="show"
                       data-url="<{:url('User/edit',['user_id' => $v['user_id']])}>"
                    >
                        <i class="fa fa-edit"></i>
                        <span>编辑</span>
                    </a>
                    <a href="javascript:void(0);"
                       data-url="<{:url('User/delete')}>"
                       mini="del" pk_name="user_id"
                       data-id="<{$v.user_id}>"
                       data-title="确实删除该用户么？"
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
