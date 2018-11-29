{include file="public:header" /}
<div class="main_box">
    <h2><span></span>网站设置</h2>
    <div class="cont_box">
        <table border="0" cellspacing="0" cellpadding="0" class="table" id="table_box">
            <thead>
            <tr>
                <th>ID</th>
                <th>网站名称</th>
                <th>修改时间</th>
                <th>最后修改IP</th>
                <th>最后修改者</th>
                <th width="268">操作</th>
            </tr>
            </thead>
            <tbody>
           <?php foreach($systemInfo as $v){ ?>
            <tr>
                <td><{$v.system_id}></td>
                <td><{$v.webname}></td>
                <td><?=date('Y-m-d H:i', $v['last_time'])?></td>
                <td><{$v.last_ip}></td>
                <td><{$v.last_manager}></td>
                <td>
                    <a href="javascript:void(0);"
                       class="table_btn table_edit edit_btn"
                       mini="show"
                       data-url="<{:url('system/edit',['system_id' => $v['system_id']])}>"
                    >
                        <i class="fa fa-edit"></i>
                        <span>编辑</span>
                    </a>
<!--                    <a href="javascript:void(0);"
                       data-url=""
                       mini="del" pk_name="system_id"
                       data-id="<{$v.system_id}>"
                       data-title="确实删除该管理员么？"
                       class="table_btn table_del del_btn"
                    >
                        <i class="fa fa-trash"></i>
                        <span>删除</span>
                    </a>-->
                </td>
            </tr>
           <?php } ?>
            </tbody>
        </table>
      
    </div>
</div>
{include file="public:footer" /}
