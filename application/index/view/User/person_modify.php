{extend name="user/base" /}
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
                    <p><label>用户名：</label><input type="text" value="<{$userInfo.account}>" readonly="readonly"/></p>
                    <p><label>手机号：</label><input type="text" value="<{$userInfo.phone}>" readonly="readonly"/></p>
                    <p><label>电子邮箱：</label><input type="text" value="<{$userInfo.info.email}>" readonly="readonly"/></p>
                    <p><label>联系地址：</label><input type="text" value="<{$userInfo.info.address}>" readonly="readonly"/></p>
                </div>
                <div class="submitBoxCenter">
                    <a href="personalSucess.html">提交</a>
                </div>
            </div>
        </div>

    </div>
{/block}
