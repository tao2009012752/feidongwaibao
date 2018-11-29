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
    <h2><span></span>菜单列表</h2>
    <div class="count">
        <div class="left">
            <button type="button" class="btn btn_info" mini="show" data-url="<{:url('menus/create')}>" /><i class="fa fa-plus"></i> 新增一级菜单</button>
            <button type="button" class="btn btn_warn" mini="sort" data-url="<{:url('menus/sort')}>"  /><i class="fa fa-refresh"></i> 排序</button>
            <button type="button" class="btn btn_dsure" mini="deletesome" pk_name="menu_id" data-url="<{:url('menus/deleteSome')}>" data-title="确定删除这些菜单么"  /><i class="fa fa-trash-o"></i> 批量删除</button>
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
                <th>菜单名</th>
                <th>是否显示</th>
                <th>排序</th>
                <th width="200">描述</th>
                <th>创建时间</th>
                <th width="200">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($list as $val){ ?>
            <tr>
                <td><input type="checkbox" class="check" value="<{$val['menu_id']}>"></td>
                <td><{$val.menu_id}></td>
                <td><i class="<{$val.icon}>"></i> <{$val.menu_name}></td>
                <td><?=$val['is_show'] ? '是':'否'; ?></td>
                <td><input type="number" pk_name="menu_id" pk="<{$val['menu_id']}>" value="<{$val.orderby}>" class="orderby" /></td>
                <td><{$val.info}></td>
                <td><?=date('Y-m-d H:i', $val['add_time'])?></td>
                <td>
                    <a href="javascript:void(0);"
                       class="table_btn table_info detail_btn" mini="iframe_show"
                       data-url="<{:url('menus/manageChild',['menu_id' => $val['menu_id']])}>"
                       data-title="管理子菜单"
                    >
                        <i class="fa fa-reorder"></i>
                        <span>管理子菜单</span>
                    </a>
                    <a href="javascript:void(0);"
                       class="table_btn table_edit edit_btn"
                       mini="show"
                       data-url="<{:url('menus/edit',['menu_id' => $val['menu_id']])}>"
                    >
                        <i class="fa fa-edit"></i>
                        <span>编辑</span>
                    </a>
                    <a href="javascript:void(0);"
                       data-url="<{:url('menus/delete')}>"
                       mini="del" pk_name="menu_id"
                       data-id="<{$val.menu_id}>"
                       data-title="确实删除该一级菜单么？"
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