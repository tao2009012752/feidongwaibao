{extend name="Companys/base" /}
{block name="right"}
<div class="fr rightBox">
    <div class="rightWrap comXiu">
        <h6>基本信息</h6>
        <div class="jibenCon">
            <div class="jibenTit">基本资料</div>
            <div class="tableCon">
                <p>
                    <label>用户名：</label>
                    <input type="text" name="username" value="<{$com.account}>" readonly="readonly"/>
                </p>
                <p>
                    <label>企业名：</label>
                    <input type="text" name="name" value="<{$com.company_name}>"/>
                </p>
                <p>
                    <label>logo：</label>
                    <a class="upimg" href="javascript:void(0)"><img src="<{$com.logo}>" class="comImgbox"/></a>
                    <input type="file" data-url="<{:url('/admin/third/upload')}>" style="display: none;"  />
                </p>
                <p>
                    <label>企业图：</label>
                    <a class="upimg" href="javascript:void(0)"><img src="<{$com.image}>" class="comImgbox"/></a>
                    <input type="file" data-url="<{:url('/admin/third/upload')}>" style="display: none;"  />
                </p>
                <p>
                    <label>介绍：</label>
                    <textarea name="intro" rows="5" cols="60" style="vertical-align: top;"><{$com.intro}></textarea>
                </p>
                <p>
                    <label>核心业务：</label>
                    <input type="text" name="core" value="<{$com.core_business}>"/>
                </p>
                <p>
                    <label>联系人：</label>
                    <input type="text" name="contact" value="<{$com.contact}>"/>
                </p>
                <p>
                    <label>手机号：</label>
                    <input type="text" name="phone" value="<{$com.phone}>"/>
                </p>
                <p>
                    <label>邮箱：</label>
                    <input type="text" name="email" value="<{$com.email}>"/>
                </p>
                <p>
                    <label>地址：</label>
                    <input type="text" name="location" value="<{$com.location}>"/>
                </p>

            </div>
            <div class="submitBoxCenter">
                <a href="javascript:void(0)" class="regBtn">提交</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        Reg.Comreg("<{:url('companys/center')}>",2); //公司注册修改
        Common.ImgUpload();//图片上传
    })
</script>
{/block}
