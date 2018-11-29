{include file="public:header" /}
<div class="main_box">
    <h2><span></span>添加友情链接</h2>
    <div class="cont_box">
        <form action="<{:url('link/add')}>" method="post" id="formdata">
            <ul class="addpro_box adduser_box">
                <li>
                    <label><span class="red">*</span> 友情链接：</label>
                    <input type="text" placeholder="请输入友情链接名" name="friend_link_name" />
                </li>
                <li>
                    <label><span class="red">*</span> 链接地址：</label>
                    <input type="text" placeholder="请输入链接地址" name="friend_link_url" />
                </li>
                <li>
                    <label>是否显示：</label>
                    <div class="radio_box">
                        <input type="radio" name="is_show" value="1"  checked="checked"> <span>是</span>
                        <span style="width: 15px;height: 1px"></span>
                        <input type="radio" name="is_show" value="0" > <span>否</span>
                    </div>
                </li>
                <li>
                    <label>排序值：</label>
                    <input type="text" name="friend_link_sort" placeholder="数值越大越靠前" />
                </li>
            </ul>
            <div class="probtn_box clearfix">
                <input type="submit" value="添加" class="btn blue_btn"/>
            </div>
        </form>
    </div>
</div>
{include file="public:footer" /}