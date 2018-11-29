{include file="public:header" /}
<div class="main_box">
    <h2><span></span>新闻列表</h2>
    <form action="<{:url('news/index')}>" method="post" id="order_shform">
        <div class="search_box clearfix">
            <select name="par_cate" >
                <option value="0">不限</option>
                <?php foreach ($cates as $val){ if(!$val['parent_id']) { ?>
                <option value="<{$val['news_cate_id']}>" <?=$search['par_cate']==$val['news_cate_id'] ? 'selected':''?>><{$val['cate_name']}></option>
                <?php } }?>
            </select>
            <select name="child_cate" >
                <option value="0">不限</option>
                <?php
                if ($search['par_cate']) {
                    foreach($cates as $child) { if ($child['parent_id'] == $search['par_cate']) {
                        ?>
                        <option value="<{$child['news_cate_id']}>" <?=$search['child_cate']==$child['news_cate_id'] ? 'selected':''?> ><{$child['cate_name']}></option>
                    <?php }}} ?>
            </select>
            <input type="text" class="f_left" name="title" value="<{$search['title']}>" placeholder="输入新闻标题" style="margin-right:15px;"/>
            <input type="submit" value="搜索" class="btn blue_btn"/>
        </div>
    </form>
    <div class="count">
        <div class="left">
            <button type="button" class="btn btn_info" mini="show" data-url="<{:url('news/create')}>" /><i class="fa fa-plus"></i> 新增新闻</button>
            <button type="button" class="btn btn_dsure" mini="deletesome" pk_name="news_id" data-url="<{:url('news/deleteSome')}>" data-title="确定删除这些新闻么"  /><i class="fa fa-trash-o"></i> 批量删除</button>
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
                <th>新闻分类</th>
                <th>标题</th>
                <th>封面图</th>
                <th>浏览量</th>
                <th>添加时间</th>
                <th width="268">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $v) {?>
            <tr >
                <td><input type="checkbox" class="check" value="<{$v['news_id']}>"></td>
                <td><{$v.news_id}></td>
                <td><{$cates2[$v['par_cate_id']]['cate_name']}> / <{$cates2[$v['news_cate_id']]['cate_name']}> </td>
                <td><{$v.title}></td>
                <td><img src="<{$v.cover}>" width="100"></td>
                <td><{$v.view_num}></td>
                <td><?=date('Y-m-d H:i', $v['add_time'])?></td>
                <td>
                    <a href="javascript:void(0);"
                       class="table_btn table_edit edit_btn"
                       mini="show"
                       data-url="<{:url('news/edit',['news_id' => $v['news_id']])}>"
                    >
                        <i class="fa fa-edit"></i>
                        <span>编辑</span>
                    </a>
                    <a href="javascript:void(0);"
                       data-url="<{:url('news/delete')}>"
                       mini="del" pk_name="news_id"
                       data-id="<{$v.news_id}>"
                       data-title="确实删除该新闻么？"
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
<script>
    var cates = JSON.parse('<{$json_cates}>');

    $("[name='par_cate']").change(function()
    {
        var par_cate = $(this).val();

        var option = '<option value="0">不限</option>';

        if (par_cate > 0) {
            for (var i in cates)
            {
                if (cates[i]['parent_id'] == par_cate) {
                    option += '<option value="'+cates[i]['news_cate_id']+'">'+cates[i].cate_name+'</option>';
                }
            }
        }

        $("[name='child_cate']").html(option);
    })
</script>
