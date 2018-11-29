{include file="public:header" /}
<div class="main_box">
    <h2><span></span>管理员列表</h2>
    <form action="<{:url('manager/index')}>" method="post" id="order_shform">
        <div class="search_box clearfix">
            <input type="text" class="f_left" name="manager_name" value="<{$search['manager_name']}>" placeholder="输入管理员姓名" style="margin-right:15px;"/>
            <input type="submit" value="搜索" class="btn blue_btn"/>
        </div>
    </form>
    <div class="count">
        <div class="left">
            <button type="button" class="btn btn_info" mini="show" data-url="<{:url('manager/create')}>" /><i class="fa fa-plus"></i> 新增管理员</button>
            <button type="button" class="btn btn_dsure" mini="deletesome" pk_name="manager_id" data-url="<{:url('manager/deleteSome')}>" data-title="确定删除这些管理员么"  /><i class="fa fa-trash-o"></i> 批量删除</button>
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
                <th>账号</th>
                <th>姓名</th>
                <th>所属组</th>
                <th>最后登录时间</th>
                <th>添加时间</th>
                <th width="268">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $v) {?>
            <tr >
                <td><input type="checkbox" class="check" value="<{$v['manager_id']}>"></td>
                <td><{$v.manager_id}></td>
                <td><{$v.account}></td>
                <td><{$v.manager_name}></td>
                <td><{$groups[$v['manager_group']]['group_name']}></td>
                <td><?=$v['last_login'] ? date('Y-m-d H:i', $v['last_login']) : '从未登录'?></td>
                <td><?=date('Y-m-d H:i', $v['add_time'])?></td>
                <td>
                    <a href="javascript:void(0);"
                       class="table_btn table_edit edit_btn"
                       mini="show"
                       data-url="<{:url('manager/edit',['manager_id' => $v['manager_id']])}>"
                    >
                        <i class="fa fa-edit"></i>
                        <span>编辑</span>
                    </a>
                    <a href="javascript:void(0);"
                       data-url="<{:url('manager/delete')}>"
                       mini="del" pk_name="manager_id"
                       data-id="<{$v.manager_id}>"
                       data-title="确实删除该管理员么？"
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
