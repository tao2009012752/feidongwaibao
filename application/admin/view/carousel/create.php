{include file="public:header" /}
<div class="main_box">
    <h2><span></span>添加轮播图</h2>
    <div class="cont_box">
        <form action="<{:url('carousel/create')}>" method="post" id="formdata">
            <ul class="addpro_box adduser_box">
                <li>
                    <label><span class="red">*</span> 轮播类型：</label>
                    <select name="type">
                        <option value="0">请选择</option>
                        <option value="1">首页轮播</option>
                        <option value="2">专题页轮播</option>
                    </select>
                </li>
                <li id="upload">
                    <label><span class="red">*</span> 上传图片：</label>
                    <img src="/assets/images/upload.png" width="100">
                    <input type="file" name="file" id="upimg" data-url="<{:url('third/upload')}>"  />
                    <input type="hidden" name="img" />
                </li>
                <li class="view-img" hidden>
                    <label >&nbsp;</label>
                    <img src="" style="max-width: 500px">
                </li>
                <li>
                    <label><span class="red">*</span> 轮播标题：</label>
                    <input type="text" placeholder="请输入轮播标题" name="title" />
                </li>
                <li>
                    <label><span class="red">*</span> 链接地址：</label>
                    <input type="text" placeholder="请输入链接地址" name="href" />
                </li>
                <li>
                    <label>是否显示：</label>
                    <div class="radio_box">
                        <input type="radio" name="is_open" value="1"  checked="checked"> <span>是</span>
                        <span style="width: 15px;height: 1px"></span>
                        <input type="radio" name="is_open" value="0" > <span>否</span>
                    </div>
                </li>
                <li>
                    <label>排序值：</label>
                    <input type="text" name="orderby" placeholder="数值越大越靠前" />
                </li>
            </ul>
            <div class="probtn_box clearfix">
                <input type="submit" value="添加轮播图" class="btn blue_btn"/>
            </div>
        </form>
    </div>
</div>
{include file="public:footer" /}