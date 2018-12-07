{include file="public:header" /}
<style>
    input{display: inline-block !important;}
    [type=number] {
        width:60px;
        border-radius: 4px;
        text-align: center;
        border:1px solid #ccc;
    }
    [type=radio] {
        position:relative;
        top:10px;
    }
</style>
<div class="main_box">
    <div class="count">
        <div class="left">
<!--            <button type="button" class="btn btn_info add_newline" ><i class="fa fa-plus"></i> 新增一行</button>-->
            <button type="button" class="btn btn_dsure" mini="deletesome" pk_name="job_id" data-url="<{:url('company/deleteSome')}>" data-title="确定删除这些菜单么" ><i class="fa fa-trash-o"></i> 批量删除</button>
        </div>
        <div class="right">共搜出 <{$count}> 条数据</div>
        <div class="clear"></div>
    </div>
    <form action="" method="post" id="formdata">
        <div class="cont_box">
            <table border="0" cellspacing="0" cellpadding="0" class="table">
                <thead>
                <tr>
                    <th><input type="checkbox" id="checkall"></th>
                    <th>职位名称</th>
                    <th>招聘人数</th>
                    <th>性别要求</th>
                    <th>学历要求</th>
                    <th>薪资待遇</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($list as $v) { ?>
                    <tr>
                        <td><input type="checkbox" class="check" value="<{$v['job_id']}>"></td>
<!--                        <td><input  type="text"  style="width:100px !important;" name="old[<{$v['job_id']}>][menu_name]" value="<{$v['job_name']}>" /></td>-->
                        <td style="width:100px !important;"><{$v['job_name']}></td>
                        <td><{$v['need_num']}></td>
                        <td><{$v['sex']}></td>
                        <td><{$v['degree']}></td>
                        <td><{$v.min_salary}>-<{$v.max_salary}></td>
                        <td>
                            <a href="javascript:void(0);"
                               class="table_btn table_info detail_btn"
                               mini="show"
                               data-url="<{:url('Recruitment/viewDetail',['job_id' => $v['job_id']])}>"
                            >
                                <i class="fa fa-reorder"></i>
                                <span>查看职位详情</span>
                            </a>
                            <a href="javascript:void(0);"
                               data-url="<{:url('company/delete')}>"
                               mini="del" pk_name="job_id"
                               data-id="<{$v.job_id}>"
                               data-title="确实删除该职位么？"
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
        <div class="count">
            <div class="left">
<!--                <button type="submit" class="btn btn_info" ><i class="fa fa-save"></i> 保存</button>-->
            </div>
            <div class="clear"></div>
        </div>
    </form>
</div>
{include file="public:footer" /}
<script>
    $(".manage_child").click(function()
    {
        layer.open({
            type: 2,
            title: '管理子菜单',
            shadeClose: true,
            shade: 0,
            area: ['100%', '100%'],
            content: '<{:url("company/manageChild")}>' //iframe的url
        });
    })

    var i = 0;
    $(".add_newline").click(function ()
    {
        var html = '';

        html += '<tr class="new_tr">';
        html += '    <td><input type="checkbox" class="check" name=""></td>';
        html += '    <td><input type="text" style="width:100px !important;"  name="new['+i+'][menu_name]"></td>';
        html += '   <td>';
        html += '        <input type="text"  style="width:100px !important;" readonly id="icon'+i+'" name="new['+i+'][icon]">';
        html += '        <button type="button" class="btn btn_info select-icon" data-index="'+i+'">选择图标</button>';
        html += '   </td>';
        html += '   <td>';
        html += '       <input type="text"  style="width:100px !important;"  name="new['+i+'][url]">'
        html += '   </td>';
        html += '   <td>';
        html += '       <label> <input type="radio" name="new['+i+'][is_show]" value="1"  checked="checked"> 是 </label>';
        html += '       <label> <input type="radio" name="new['+i+'][is_show]" value="0" > 否 </label>';
        html += '   </td>';
        html += '   <td>';
        html += '       <input type="number" name="new['+i+'][orderby]" />';
        html += '   </td>';
        html += '   <td>';
        html += '       <input type="text" style="max-width:300px !important;" name="new['+i+'][info]">';
        html += '   </td>';
        html += '   <td>';
        html += '       <a href="javascript:void(0);" class="table_btn table_del del_btn del_new"> <i class="fa fa-trash"></i> <span>删除</span> </a>';
        html += '   </td>';
        html += '</tr>';

        $("tbody").append(html);
        i++;
    })

    $(document).on('click', '.del_new', function() {
        $(this).parents('tr').remove()
    });

    $(document).on('click', '.select-icon', function()
    {
        var index = $(this).attr('data-index');
        layer.open({
            type: 2,
            title: '选择图标',
            shadeClose: true,
            shade: 0,
            area: ['80%', '500px'],
            content: '/admin/company/icons/index/'+index+'.html'
        })
    })

</script>