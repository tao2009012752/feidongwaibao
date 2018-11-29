{include file="public:header" /}
<style>
    select.inline{
        display: inline;
        width:200px;
    }
</style>
<div class="main_box">
    <h2><span></span>添加园区</h2>
    <div class="cont_box">
        <form action="<{:url('park/create')}>" method="post" id="formdata">
            <ul class="addpro_box adduser_box">
                <li>
                    <label><span class="red">*</span> 园区名称：</label>
                    <input type="text" placeholder="请输入园区名称" name="park_name" />
                </li>
                <li>
                    <label><span class="red">*</span> 园区简介：</label>
                    <script id="container" name="intro" type="text/plain" style="height:400px;float:left;width:800px"></script>
                </li>
                <li>
                    <label><span class="red">*</span> 发展定位：</label>
                    <script id="container2" name="location" type="text/plain" style="height:400px;float:left;width:800px"></script>
                </li>
                <li>
                    <label><span class="red">*</span> 基础设施：</label>
                    <script id="container3" name="basic_equipment" type="text/plain" style="height:400px;float:left;width:800px"></script>
                </li>
                <li>
                    <label><span class="red">*</span> 投资环境：</label>
                    <script id="container4" name="environment" type="text/plain" style="height:400px;float:left;width:800px"></script>
                </li>
                <li>
                    <label><span class="red">*</span> 联系人：</label>
                    <input type="text" placeholder="请输入联系人" name="contact"  />
                </li>
                <li>
                    <label><span class="red">*</span> 联系号码：</label>
                    <input type="text" placeholder="请输入联系号码" name="phone"  />
                </li>
                <li>
                    <label><span class="red">*</span> 电子邮件：</label>
                    <input type="text" placeholder="请输入电子邮件" name="email"  />
                </li>
                <li>
                    <label>排序值：</label>
                    <input type="text" name="orderby" placeholder="数值越大越靠前" />
                </li>
            </ul>
            <div class="probtn_box clearfix">
                <input type="submit" value="添加园区" class="btn blue_btn"/>
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

