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
    <h2><span></span>企业列表</h2>
    <div class="count">
        <div class="left">
            <button type="button" class="btn btn_info" mini="show" data-url="<{:url('Company/create')}>" /><i class="fa fa-plus"></i> 新增企业</button>
            <button type="button" class="btn btn_dsure" mini="deletesome" pk_name="company_id" data-url="<{:url('Company/deleteSome')}>" data-title="确定删除这些新闻分类么"  /><i class="fa fa-trash-o"></i> 批量删除</button>
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
                <th>企业名</th>
                <th>企业logo</th>
                <th>电话</th>
                <th>邮箱</th>
                <th>公司位置</th>
                <th>注册时间</th>
                <th width="268">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $v) {?>
            <tr >
                <td><input type="checkbox" class="check" value="<{$v['company_id']}>"></td>
                <td><{$v.company_id}></td>
                <td><{$v.company_name}></td>
                <td><img src="<{$v.logo}>" style="max-width: 200px" /></td>
                <td><{$v.phone}></td>
                <td><{$v.email}></td>
                <td><{$v.location}></td>
                <td><?=date('Y-m-d H:i', $v['add_time'])?></td>
                <td>
                    <a href="javascript:void(0);"
                       class="table_btn table_info detail_btn"
                       mini="show"
                       data-url="<{:url('Company/viewJobs',['company_id' => $v['company_id']])}>"
                    >
                        <i class="fa fa-edit"></i>
                        <span>查看在招职位</span>
                    </a>
                    <a href="javascript:void(0);"
                       class="table_btn table_info detail_btn"
                       mini="show"
                       data-url="<{:url('Company/mJob',['company_id' => $v['company_id']])}>"
                    >
                        <i class="fa fa-edit"></i>
                        <span>发布职位</span>
                    </a>
                    <a href="javascript:void(0);"
                       class="table_btn table_edit edit_btn"
                       mini="show"
                       data-url="<{:url('Company/edit',['company_id' => $v['company_id']])}>"
                    >
                        <i class="fa fa-edit"></i>
                        <span>编辑</span>
                    </a>
                    <a href="javascript:void(0);"
                       data-url="<{:url('Company/delete')}>"
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
