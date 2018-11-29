{include file="public:header" /}
<style>
    table{border-collapse: collapse}
    table td{border:1px solid #ccc;padding:4px 6px}
</style>
<div class="main_box">
    <h2><span></span>添加权限组</h2>
    <div class="cont_box">
        <form action="<{:url('managerGroup/create')}>" method="post" id="formdata">
            <ul class="addpro_box adduser_box">
                <li>
                    <label><span class="red">*</span> 权限组名称：</label>
                    <input type="text" placeholder="请输入权限组名称" name="group_name" />
                </li>
                <li>
                    <label><span class="red">*</span> 拥有权限：</label>
                    <table>
                        <?php foreach ($par_menu as $par_v){ ?>
                        <tr>
                            <td><input type="checkbox" name="menus[]" value="<{$par_v.menu_id}>"> <{$par_v.menu_name}></td>
                            <td>
                                <?php foreach ($chid_menu as $chid_v) { if($chid_v['parent_id'] == $par_v['menu_id']){ ?>
                                <input type="checkbox" name="menus[]" value="<{$chid_v.menu_id}>"> <{$chid_v.menu_name}>
                                <?php }} ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
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
                <input type="submit" value="添加权限组" class="btn blue_btn"/>
            </div>
        </form>
    </div>
</div>
{include file="public:footer" /}
