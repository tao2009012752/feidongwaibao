{extend name="User/base" /}
{block name="tdk"}
<title>资料修改</title>
{/block}
{block name="content"}
    <div class="fr rightBox">
        <div class="rightWrap">
            <h6>资料修改</h6>
            <div class="jibenCon">
                <div class="jibenTit">资料修改</div>
                <div class="tableCon">
                    <p><label>用户名：</label><input type="text" name="username" value="<{$userInfo.account}>" /></p>
                    <p><label>手机号：</label><input type="text" name="phone" value="<{$userInfo.phone}>" /></p>
                    <p><label>电子邮箱：</label><input type="text" name="email" value="<{$userInfo.info.email}>" /></p>
                    <p><label>联系地址：</label><input type="text" name="address" value="<{$userInfo.info.address}>" /></p>
                </div>
                <div class="submitBoxCenter">
                    <a href="javascript:void(0)" class="regBtn">提交</a>
                </div>
            </div>
        </div>

    </div>
<script>
    $(function(){
        Reg.Perreg("<{:url('User/person_modify_handdle')}>",2); //个人信息修改
    })
</script>
{/block}
