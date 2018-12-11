{include file="public:header" /}
<div class="main_box">
    <h2><span></span>编辑用户信息</h2>
    <div class="cont_box">
        <form action="<{:url('User/edit',['user_id' => $detail['user_id']])}>" method="post" id="formdata">
            <ul class="addpro_box adduser_box">
                <li>
                    <label><span class="red">*</span> 用户名：</label>
                    <input type="text" placeholder="请输入用户名" name="account" value="<{$detail['account']}>" />
                </li>
                <li>
                    <label>密码：</label>
                    <input type="password" name="pwd" placeholder="请输入密码" value="<{$detail['pwd']}>" />
                </li>
                <li>
                    <label>是否禁用：</label>
                    <div class="radio_box">
                        <input type="radio" name="is_forbidden" value="1"  <?=$detail['is_forbidden'] ? 'checked' : ''?> > <span>是</span>
                        <span style="width: 15px;height: 1px"></span>
                        <input type="radio" name="is_forbidden" value="0" <?=$detail['is_forbidden'] ? '' : 'checked'?>> <span>否</span>
                    </div>
                </li>

            </ul>
            <div class="probtn_box clearfix">
                <input type="submit" value="编辑用户" class="btn blue_btn"/>
            </div>
        </form>
    </div>
</div>
{include file="public:footer" /}
