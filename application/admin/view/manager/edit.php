{include file="public:header" /}
<div class="main_box">
    <h2><span></span>编辑管理员</h2>
    <div class="cont_box">
        <form action="<{:url('manager/edit',['manager_id' => $detail['manager_id']])}>" method="post" id="formdata">
            <ul class="addpro_box adduser_box">
                <li>
                    <label><span class="red">*</span> 管理员账号：</label>
                    <input type="text" placeholder="请输入管理员账号" name="account" value="<{$detail.account}>" />
                </li>
                <li>
                    <label><span class="red">*</span> 管理员密码：</label>
                    <input type="password" placeholder="请输入管理员密码" name="password" />
                </li>
                <li>
                    <label><span class="red">*</span> 管理员姓名：</label>
                    <input type="text" placeholder="请输入菜单名称" name="manager_name" value="<{$detail.manager_name}>" />
                </li>
                <li>
                    <label><span class="red">*</span> 分配权限组：</label>
                    <select name="manager_group" >
                        <?php foreach ($groups as $val) { ?>
                        <option value="<{$val.manager_group_id}>" <?=$detail['manager_group'] == $val['manager_group_id'] ? 'selected':'' ?> ><{$val.group_name}></option>
                        <?php } ?>
                    </select>
                </li>
            </ul>
            <div class="probtn_box clearfix">
                <input type="submit" value="编辑管理员" class="btn blue_btn"/>
            </div>
        </form>
    </div>
</div>
{include file="public:footer" /}
