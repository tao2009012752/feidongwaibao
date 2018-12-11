{extend name="user/base" /}
{block name="tdk"}
<title>密码修改</title>
{/block}
{block name="content"}
	<div class="fr rightBox">
        <div class="rightWrap">
            <h6>修改密码</h6>
            <div class="jibenCon">
                <div class="jibenTit">修改密码</div>
                <div class="tableCon">
                    <p><label>新密码：</label><input type="password" name="password" /></p>
                    <p><label>再输一遍：</label><input type="password" name="cpassword" /></p>

                </div>
                <div class="submitBoxCenter">
                    <a href="javascript:void(0)" class="sub">提交</a>
                </div>
            </div>
        </div>

    </div>

<script>
    $(function(){
        User.PassEdit();
    })
</script>
{/block}