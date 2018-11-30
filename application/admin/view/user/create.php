{include file="public:header" /}
<div class="main_box">
    <h2><span></span>添加用户</h2>
    <div class="cont_box">
        <form action="<{:url('User/create')}>" method="post" id="formdata">
            <ul class="addpro_box adduser_box">
                <li>
                    <label><span class="red">*</span> 用户名：</label>
                    <input type="text" placeholder="请输入用户名" name="account" />
                </li>
                <li>
                    <label>密码：</label>
                    <input type="password" name="pwd" placeholder="请输入密码" />
                </li>
                <li>
                    <label>性别：</label>
                    <div class="radio_box">
                        <input type="radio" name="sex" value="1"  <?=$userInfo['sex'] ? 'checked' : ''?> > <span>男</span>
                        <span style="width: 15px;height: 1px"></span>
                        <input type="radio" name="sex" value="0" <?=$userInfo['sex'] ? '' : 'checked'?>> <span>女</span>
                    </div>
                </li>
                <li>
                    <label>是否显示：</label>
                    <div class="radio_box">
                        <input type="radio" name="is_forbidden" value="1"  <?=$userInfo['is_forbidden'] ? 'checked' : ''?> > <span>是</span>
                        <span style="width: 15px;height: 1px"></span>
                        <input type="radio" name="is_forbidden" value="0" <?=$userInfo['is_forbidden'] ? '' : 'checked'?>> <span>否</span>
                    </div>
                </li>

            </ul>
            <div class="probtn_box clearfix">
                <input type="submit" value="添加用户" class="btn blue_btn"/>
            </div>
        </form>
    </div>
</div>
{include file="public:footer" /}
