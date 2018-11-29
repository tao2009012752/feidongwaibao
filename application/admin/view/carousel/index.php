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
    <h2><span></span>轮播设置</h2>
    <div class="count">
        <div class="left">
            <button type="button" class="btn btn_info" mini="show" data-url="<{:url('carousel/create')}>" /><i class="fa fa-plus"></i> 新增轮播图</button>
            <button type="button" class="btn btn_warn" mini="sort" data-url="<{:url('carousel/sort')}>"  /><i class="fa fa-refresh"></i> 排序</button>
            <button type="button" class="btn btn_dsure" mini="deletesome" pk_name="carousel_id" data-url="<{:url('carousel/deleteSome')}>" data-title="确定删除这些轮播么"  /><i class="fa fa-trash-o"></i> 批量删除</button>
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
                <th>类型</th>
                <th>轮播图</th>
                <th>标题 <br>链接地址</th>
                <th>排序</th>
                <th>是否显示</th>
                <th width="200">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($list as $val){ ?>
            <tr>
                <td><input type="checkbox" class="check" value="<{$val['carousel_id']}>"></td>
                <td><{$val.carousel_id}></td>
                <td><{$types[$val['type']]}></td>
                <td><img src="<{$val.img}>" style="max-width: 200px" /></td>
                <td style="width: 100px !important;"><{$val.title}> <br><{$val.href}></td>
                <td><input type="number" pk_name="carousel_id" pk="<{$val['carousel_id']}>" value="<{$val.orderby}>" class="orderby" /></td>
                <td><?=$val['is_open'] ? '是':'否'; ?></td>
                <td>
                    <a href="javascript:void(0);"
                       class="table_btn table_edit edit_btn"
                       mini="show"
                       data-url="<{:url('carousel/edit',['carousel_id' => $val['carousel_id']])}>"
                    >
                        <i class="fa fa-edit"></i>
                        <span>编辑</span>
                    </a>
                    <a href="javascript:void(0);"
                       data-url="<{:url('carousel/delete')}>"
                       mini="del" pk_name="carousel_id"
                       data-id="<{$val.carousel_id}>"
                       data-title="确实删除该轮播图么？"
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