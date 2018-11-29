{include file="public:header" /}
<div class="main_box">
    <h2><span></span>添加重点企业</h2>
    <div class="cont_box">
        <form action="<{:url('importCompany/edit',['company_id'=>$detail['company_id']])}>" method="post" id="formdata">
            <ul class="addpro_box adduser_box">
                <li>
                    <label><span class="red">*</span> 企业名称：</label>
                    <input type="text" placeholder="请输入企业名称" name="company_name" value="<{$detail.company_name}>" />
                </li>
                <li>
                    <label><span class="red">*</span> 企业简介：</label>
                    <script id="container" name="intro" type="text/plain" style="height:400px;float:left;width:800px"><?=htmlspecialchars_decode($detail['intro'])?></script>
                </li>
                <li>
                    <label><span class="red">*</span> 发展定位：</label>
                    <script id="container2" name="location" type="text/plain" style="height:400px;float:left;width:800px"><?=htmlspecialchars_decode($detail['location'])?></script>
                </li>
                <li>
                    <label><span class="red">*</span> 公司力量：</label>
                    <script id="container3" name="another" type="text/plain" style="height:400px;float:left;width:800px"><?=htmlspecialchars_decode($detail['another'])?></script>
                </li>
                <li>
                    <label><span class="red">*</span> 联系人：</label>
                    <input type="text" placeholder="请输入联系人" name="contact" value="<{$detail.contact}>"  />
                </li>
                <li>
                    <label><span class="red">*</span> 联系号码：</label>
                    <input type="text" placeholder="请输入联系号码" name="phone" value="<{$detail.phone}>"  />
                </li>
                <li>
                    <label><span class="red">*</span> 电子邮件：</label>
                    <input type="text" placeholder="请输入电子邮件" name="email" value="<{$detail.email}>"  />
                </li>
                <li>
                    <label>排序值：</label>
                    <input type="text" name="orderby" placeholder="数值越大越靠前" value="<{$detail.orderby}>" />
                </li>
            </ul>
            <div class="probtn_box clearfix">
                <input type="submit" value="编辑企业" class="btn blue_btn"/>
            </div>

        </form>
    </div>
</div>
{include file="public:footer" /}
<script type="text/javascript" src="/assets/lib/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/assets/lib/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/assets/lib/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
    $(function(){
        var toolbars = [
            ['fullscreen', 'source', 'bold','italic', 'underline', 'strikethrough', 'removeformat', 'formatmatch', 'blockquote','pasteplain','forecolor','backcolor',  'fontfamily', 'fontsize',  'justifyleft', 'justifyright', 'justifycenter', 'justifyjustify', 'simpleupload']
        ];
        var ue = UE.getEditor('container',{
            toolbars :toolbars,
            elementPathEnabled:false,
            wordCount:false
        });
        var ue2 = UE.getEditor('container2',{
            toolbars :toolbars,
            elementPathEnabled:false,
            wordCount:false
        });
        var ue3 = UE.getEditor('container3',{
            toolbars :toolbars,
            elementPathEnabled:false,
            wordCount:false
        });
        var ue4 = UE.getEditor('container4',{
            toolbars :toolbars,
            elementPathEnabled:false,
            wordCount:false
        });
    });
</script>

