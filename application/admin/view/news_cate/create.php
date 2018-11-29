{include file="public:header" /}
<div class="main_box">
    <h2><span></span>添加一级新闻分类</h2>
    <div class="cont_box">
        <form action="<{:url('newsCate/create')}>" method="post" id="formdata">
            <ul class="addpro_box adduser_box">
                <li>
                    <label><span class="red">*</span> 分类名称：</label>
                    <input type="text" placeholder="请输入新闻分类名称" name="cate_name" />
                </li>
                <li>
                    <label>排序值：</label>
                    <input type="text" name="orderby" placeholder="数值越大越靠前" />
                </li>
            </ul>
            <div class="probtn_box clearfix">
                <input type="submit" value="添加新闻分类" class="btn blue_btn"/>
            </div>
        </form>
    </div>
</div>
{include file="public:footer" /}
