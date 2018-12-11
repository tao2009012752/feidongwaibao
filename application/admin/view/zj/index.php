{include file="public:header" /}
<div class="main_box">
    <h2><span></span>专家列表</h2>
    <div class="count">
        <div class="left">
            <button type="button" class="btn btn_info" mini="show" data-url="<{:url('zj/create')}>" /><i class="fa fa-plus"></i> 新增专家</button>
            <button type="button" class="btn btn_dsure" mini="deletesome" pk_name="zj_id" data-url="<{:url('zj/deleteSome')}>" data-title="确定删除这些专家么"  /><i class="fa fa-trash-o"></i> 批量删除</button>
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
                
                <th>标题</th>
                <th>封面图</th>
                <th>添加者</th>
                <th>添加时间</th>
                <th width="268">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $v) {?>
            <tr >
                <td><input type="checkbox" class="check" value="<{$v['zj_id']}>"></td>
                <td><{$v.zj_id}></td>
                
                <td><{$v.name}></td>
                <td><img src="<{$v.pic}>" width="100"></td>
                <td><{$v.add_manager}></td>
                <td><?=date('Y-m-d H:i', $v['add_time'])?></td>
                <td>
                    <a href="javascript:void(0);"
                       class="table_btn table_edit edit_btn"
                       mini="show"
                       data-url="<{:url('zj/edit',['zj_id' => $v['zj_id']])}>"
                    >
                        <i class="fa fa-edit"></i>
                        <span>编辑</span>
                    </a>
                    <a href="javascript:void(0);"
                       data-url="<{:url('zj/delete')}>"
                       mini="del" pk_name="zj_id"
                       data-id="<{$v.zj_id}>"
                       data-title="确实删除该专家么？"
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
