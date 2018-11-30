{include file="public:header" /}
<div class="main_box">
    <h2><span></span>添加企业</h2>
    <div class="cont_box">
        <form action="<{:url('Company/create')}>" method="post" id="formdata">
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
                    <label><span class="red">*</span> 企业名：</label>
                    <input type="text" placeholder="请输入企业名" name="company_name" />
                </li>
                <li>
                    <label><span class="red">*</span> 企业简介：</label>
                    <textarea name="intro" placeholder="请输入企业简介" id="" cols="30" rows="10"></textarea>
                </li>
                <li>
                    <label><span class="red">*</span> 企业地址：</label>
                    <input type="text" placeholder="请输入企业地址" name="location" />
                </li>
                <li>
                    <label><span class="red">*</span> 核心业务：</label>
                    <input type="text" placeholder="请输入核心业务" name="core_business" />
                </li>
                <li>
                    <label><span class="red">*</span> 企业号码：</label>
                    <input type="text" placeholder="请输入企业号码" name="phone" />
                </li>
                <li>
                    <label><span class="red">*</span> 联系人：</label>
                    <input type="text" placeholder="请输入企业联系人" name="contact" />
                </li>
                <li>
                    <label><span class="red">*</span> 邮箱：</label>
                    <input type="text" placeholder="请输入企业邮箱" name="email" />
                </li>
                <li>
                    <label><span class="red">*</span> 排序值：</label>
                    <input type="text" placeholder="数值越大越靠前" name="orderby" />
                </li>
                <li>
                    <label>是否显示：</label>
                    <div class="radio_box">
                        <input type="radio" name="is_forbidden" value="1"  <?=$companyInfo['is_forbidden'] ? 'checked' : ''?> > <span>是</span>
                        <span style="width: 15px;height: 1px"></span>
                        <input type="radio" name="is_forbidden" value="0" <?=$companyInfo['is_forbidden'] ? '' : 'checked'?>> <span>否</span>
                    </div>
                </li>

            </ul>
            <div class="probtn_box clearfix">
                <input type="submit" value="添加企业" class="btn blue_btn"/>
            </div>
        </form>
    </div>
</div>
{include file="public:footer" /}
