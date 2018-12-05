{include file="public:header" /}
<style>
    input{display: inline-block !important;}
     [type=number] {
         width:60px;
         border-radius: 4px;
         text-align: center;
         border:1px solid #ccc;
     }
</style>
<div class="main_box">
    <div class="count">
        <div class="left">
            <button type="button" class="btn btn_info add_newline" ><i class="fa fa-plus"></i> 新增一行</button>
            <button type="button" class="btn btn_dsure" mini="deletesome" pk_name="news_cate_id" data-url="<{:url('newsCate/deleteSome')}>" data-title="确定删除这些分类么" ><i class="fa fa-trash-o"></i> 批量删除</button>
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
                    <th>ID</th>
                    <th>分类名称</th>
                    <th>排序</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($childs as $v) { ?>
                        <tr>
                            <td><input type="checkbox" class="check" value="<{$v['news_cate_id']}>"></td>
                            <td><{$v['news_cate_id']}></td>
                            <td><input type="text"  style="width:100px !important;" name="old[<{$v['news_cate_id']}>][cate_name]" value="<{$v['cate_name']}>" /></td>
                            <td><input type="number" name="old[<{$v['news_cate_id']}>][orderby]" value="<{$v['orderby']}>" /></td>
                            <td>
                                <a href="javascript:void(0);"
                                   data-url="<{:url('newsCate/delete')}>"
                                   mini="del" pk_name="news_cate_id"
                                   data-id="<{$v.news_cate_id}>"
                                   data-title="确实删除该新闻分类么？"
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
        </div>
        <div class="count">
            <div class="left">
                <button type="submit" class="btn btn_info" ><i class="fa fa-save"></i> 保存</button>
            </div>
            <div class="clear"></div>
        </div>
    </form>
</div>
{include file="public:footer" /}
<script>
    var i = 0;
    $(".add_newline").click(function ()
    {
        var html = '';

        html += '<tr class="new_tr">';
        html += '    <td><input type="checkbox" class="check" ></td>';
        html += '    <td></td>';
        html += '    <td><input type="text" style="width:100px !important;"  name="new['+i+'][cate_name]"></td>';
        html += '   <td>';
        html += '       <input type="number" name="new['+i+'][orderby]" />';
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

</script>