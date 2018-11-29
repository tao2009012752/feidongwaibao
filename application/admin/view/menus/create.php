{include file="public:header" /}
<div class="main_box">
    <h2><span></span>添加一级菜单</h2>
    <div class="cont_box">
        <form action="<{:url('menus/create')}>" method="post" id="formdata">
            <ul class="addpro_box adduser_box">
                <li>
                    <label><span class="red">*</span> 菜单名称：</label>
                    <input type="text" placeholder="请输入菜单名称" name="menu_name" />
                </li>
                <li>
                    <label><span class="red">*</span> 图标：</label>
                    <input type="text" placeholder="选择图标" id="icon0" name="icon" required readonly style="display: inline-block" />
                    <button type="button" class="btn btn_info select-icon">选择图标</button>
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
                    <input type="text" name="orderby" placeholder="数值越大越靠前" />
                </li>
                <li>
                    <label>菜单描述：</label>
                    <textarea rows="3" name="info"></textarea>
                </li>
            </ul>
            <div class="probtn_box clearfix">
                <input type="submit" value="添加一级菜单" class="btn blue_btn"/>
            </div>
        </form>
    </div>
</div>
{include file="public:footer" /}
<script>
    $(".select-icon").click(function()
    {
        layer.open({
            type: 2,
            title: '选择图标',
            shadeClose: true,
            shade: 0,
            area: ['80%', '500px'],
            content: '<{:url("menus/icons")}>' //iframe的url
        });
    })


</script>