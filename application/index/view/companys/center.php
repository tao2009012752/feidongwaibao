{extend name="Companys/base" /}
{block name="right"}
    <div class="fr rightBox">
        <!--div class="rightWrap">
            <h6>企业中心</h6>
            <div class="userJiBen">
                <div class="personalText">
                    用户001，上午好，欢迎光临服务外包人才信息综合服务平台!
                </div>
                <div class="tishi">
                    <div class="tishiBox">
                        温馨提示：会员注册成功后，请及时完善您的企业信息，我们将及时为您实名认证，使您享受更多的会员特权服务！
                    </div>
                </div>
            </div>
        </div-->
        <div class="rightWrap comXiu" style="margin-top: 20px;">
            <h6>基本信息</h6>
            <div class="jibenCon">
                <div class="jibenTit">基本资料</div>
                <div class="tableCon">
                    <p>
                        <label>用户名：</label>
                        <input type="text" value="<{$com.account}>" readonly="readonly"/>
                    </p>
                    <p>
                        <label>企业名：</label>
                        <input type="text" value="<{$com.company_name}>" readonly="readonly"/>
                    </p>
                    <p>
                        <label>logo：</label>
                        <img src="<{$com.logo}>" class="comImgbox"/>
                    </p>
                    <p>
                        <label>企业图：</label>
                        <img src="<{$com.image}>" class="comImgbox"/>
                    </p>
                    <p>
                        <label>介绍：</label>
                        <textarea name="" rows="5" cols="60" style="vertical-align: top;"><{$com.intro}></textarea>
                    </p>
                    <p>
                        <label>核心业务：</label>
                        <input type="text" value="<{$com.core_business}>" readonly="readonly"/>
                    </p>
                    <p>
                        <label>联系人：</label>
                        <input type="text" value="<{$com.contact}>" readonly="readonly"/>
                    </p>
                    <p>
                        <label>手机号：</label>
                        <input type="text" value="<{$com.phone}>" readonly="readonly"/>
                    </p>
                    <p>
                        <label>邮箱：</label>
                        <input type="text" value="<{$com.email}>" readonly="readonly"/>
                    </p>
                    <p>
                        <label>地址：</label>
                        <input type="text" value="<{$com.location}>" readonly="readonly"/>
                    </p>
                </div>
            </div>
        </div>

    </div>
{/block}
