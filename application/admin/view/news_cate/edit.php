{include file="public:header" /}
<div class="main_box">
    <h2><span></span>编辑一级新闻分类</h2>
    <div class="cont_box">
        <form action="<{:url('newsCate/edit',['news_cate_id' => $detail['news_cate_id']])}>" method="post" id="formdata">
            <ul class="addpro_box adduser_box">
                <li>
                    <label><span class="red">*</span> 分类名称：</label>
                    <input type="text" placeholder="请输入新闻分类名称" name="cate_name" value="<{$detail.cate_name}>" />
                </li>
                <li>
                    <label>排序值：</label>
                    <input type="text" name="orderby" placeholder="数值越大越靠前" value="<{$detail.orderby}>" />
                </li>
            </ul>
            <div class="probtn_box clearfix">
                <input type="submit" value="编辑新闻分类" class="btn blue_btn"/>
            </div>
        </form>
    </div>
</div>
{include file="public:footer" /}
