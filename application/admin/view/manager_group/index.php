{include file="public:header" /}
<div class="main_box">
    <h2><span></span>权限分配</h2>
    <div class="count">
        <div class="left">
            <button type="button" class="btn btn_info" mini="show" data-url="<{:url('managerGroup/create')}>" /><i class="fa fa-plus"></i> 新增权限组</button>
            <button type="button" class="btn btn_dsure" mini="deletesome" pk_name="manager_group_id" data-url="<{:url('managerGroup/deleteSome')}>" data-title="确定删除这些权限组么"  /><i class="fa fa-trash-o"></i> 批量删除</button>
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
                <th>权限组名称</th>
                <th>是否锁定</th>
                <th>描述</th>
                <th>添加时间</th>
                <th width="268">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $v) { ?>
            <tr>
                <td><input type="checkbox" class="check" value="<{$v['manager_group_id']}>"></td>
                <td><{$v.manager_group_id}></td>
                <td><{$v.group_name}></td>
                <td>2017-03-31</td>
                <td><{$v.info}></td>
                <td><?=date('Y-m-d H:i', $v['add_time'])?></td>
                <td>
                    <a href="javascript:void(0);"
                       class="table_btn table_edit edit_btn"
                       mini="show"
                       data-url="<{:url('managerGroup/edit',['manager_group_id' => $v['manager_group_id']])}>"
                    >
                        <i class="fa fa-edit"></i>
                        <span>编辑</span>
                    </a>
                    <a href="javascript:void(0);"
                       data-url="<{:url('managerGroup/delete')}>"
                       mini="del" pk_name="manager_group_id"
                       data-id="<{$v.manager_group_id}>"
                       data-title="确实删除该权限组么？"
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
