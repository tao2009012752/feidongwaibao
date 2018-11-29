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
    <h2><span></span>园区列表</h2>
    <form action="<{:url('importCompany/index')}>" method="post" id="order_shform">
        <div class="search_box clearfix">
            <input type="text" class="f_left" name="company_name" value="<{$search['company_name']}>" placeholder="输入企业名称" style="margin-right:15px;"/>
            <input type="submit" value="搜索" class="btn blue_btn"/>
        </div>
    </form>
    <div class="count">
        <div class="left">
            <button type="button" class="btn btn_info" mini="show" data-url="<{:url('importCompany/create')}>" /><i class="fa fa-plus"></i> 新增重点企业</button>
            <button type="button" class="btn btn_warn" mini="sort" data-url="<{:url('importCompany/sort')}>"  /><i class="fa fa-refresh"></i> 排序</button>
            <button type="button" class="btn btn_dsure" mini="deletesome" pk_name="company_id" data-url="<{:url('importCompany/deleteSome')}>" data-title="确定删除这些企业么"  /><i class="fa fa-trash-o"></i> 批量删除</button>
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
                <th>园区名称</th>
                <th>联系人</th>
                <th>排序值</th>
                <th>添加时间</th>
                <th width="268">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $v) {?>
            <tr >
                <td><input type="checkbox" class="check" value="<{$v['company_id']}>"></td>
                <td><{$v.company_id}></td>
                <td><{$v.company_name}></td>
                <td><{$v.contact}> <{$v.phone}></td>
                <td><input type="number" pk_name="company_id" pk="<{$v['company_id']}>" value="<{$v.orderby}>" class="orderby" /></td>
                <td><?=date('Y-m-d H:i', $v['add_time'])?></td>
                <td>
                    <a href="javascript:void(0);"
                       class="table_btn table_edit edit_btn"
                       mini="show"
                       data-url="<{:url('importCompany/edit',['company_id' => $v['company_id']])}>"
                    >
                        <i class="fa fa-edit"></i>
                        <span>编辑</span>
                    </a>
                    <a href="javascript:void(0);"
                       data-url="<{:url('importCompany/delete')}>"
                       mini="del" pk_name="company_id"
                       data-id="<{$v.company_id}>"
                       data-title="确实删除该企业么？"
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

