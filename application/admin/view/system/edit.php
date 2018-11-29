{include file="public:header" /}
<div class="main_box">
    <h2><span></span>编辑</h2>
    <div class="cont_box">
        <form action="<{:url('system/edit',['system_id' => $systemInfo['system_id']])}>" method="post" id="formdata">
            <ul class="addpro_box adduser_box">
                <li>
                    <label><span class="red">*</span> 网站名称：</label>
                    <input type="text" placeholder="请输入网站名称" value="<{$systemInfo.webname}>" name="webname" />
                </li>
                <li>
                    <label><span class="red">*</span> 网站关键词：</label>
                    <textarea rows="2" name="keywords"><{$systemInfo.keywords}></textarea>
                </li>
                <li>
                    <label><span class="red">*</span> 网站描述：</label>
                    <textarea rows="3" name="description"><{$systemInfo.description}></textarea>
                </li>
                <li>
                    <label><span class="red">*</span> icp备案号：</label>
                    <input type="text" value="<{$systemInfo.icp}>" name="icp" placeholder="请输入网站icp备案号" />
                </li>
                <li>
                    <label><span class="red">*</span> 联系电话：</label>
                    <input type="text" value="<{$systemInfo.phone}>" name="phone" placeholder="请输入网站联系电话" />
                </li>
                <li>
                    <label><span class="red">*</span> 技术支持：</label>
                    <input type="text" value="<{$systemInfo.support}>" name="support" placeholder="请输入网站技术支持" />
                </li>
                <li>
                    <label><span class="red">*</span> 技术支持电话：</label>
                    <input type="text" value="<{$systemInfo.support_phone}>" name="support_phone" placeholder="请输入网站技术支持电话" />
                </li>
            </ul>
            <div class="probtn_box clearfix">
                <input type="submit" value="修改" class="btn blue_btn"/>
            </div>
        </form>
    </div>
</div>
{include file="public:footer" /}