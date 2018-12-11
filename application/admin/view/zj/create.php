{include file="public:header" /}
<style>
    select.inline{
        display: inline;
        width:200px;
    }
</style>
<div class="main_box">
    <h2><span></span>添加专家</h2>
    <div class="cont_box">
        <form action="<{:url('zj/create')}>" method="post" id="formdata">
            <ul class="addpro_box adduser_box">
                
                <li>
                    <label><span class="red">*</span> 专家姓名：</label>
                    <input type="text" placeholder="请输入专家姓名" name="name" />
                </li>
                <li id="upload">
                    <label><span class="red">*</span> 专家头像：</label>
                    <img src="/assets/images/upload.png" width="100">
                    <input type="file" name="file" id="upimg" data-url="<{:url('third/upload')}>" />
                    <input type="hidden" name="pic" />
                </li>
                <li class="view-img" hidden>
                    <label >&nbsp;</label>
                    <img src="" style="max-width: 500px">
                </li>
                <li>
                    <label><span class="red">*</span> 信息来源：</label>
                    <input type="text" placeholder="请输入信息来源" name="source"  />
                </li>
                <li>
                    <label><span class="red">*</span> 专家履历：</label>
                    <script id="container" name="info" type="text/plain" style="height:400px;float:left;width:800px"></script>
                </li>
            </ul>
            <div class="probtn_box clearfix">
                <input type="submit" value="添加专家" class="btn blue_btn"/>
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

        var ue = UE.getEditor('container',{
            toolbars :[
                ['fullscreen', 'source', 'bold','italic', 'underline', 'strikethrough', 'removeformat', 'formatmatch', 'blockquote','pasteplain','forecolor','backcolor',  'fontfamily', 'fontsize',  'justifyleft', 'justifyright', 'justifycenter', 'justifyjustify', 'simpleupload']
            ],
            elementPathEnabled:false,
            wordCount:false
        });
    });
</script>
