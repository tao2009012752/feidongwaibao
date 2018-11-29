{include file="public:header" /}
<div class="main_box">
    <h2><span></span>添加轮播图</h2>
    <div class="cont_box">
        <form action="<{:url('carousel/edit',['carousel_id' => $carousel['carousel_id']])}>" method="post" id="formdata">
            <ul class="addpro_box adduser_box">
                <li>
                    <label><span class="red">*</span> 轮播类型：</label>
                    <select name="type">
                        <option value="0"  >请选择</option>
                        <option value="1" <?=$carousel['type'] == 1 ? 'selected':'' ?>>首页轮播</option>
                        <option value="2" <?=$carousel['type'] == 2 ? 'selected':'' ?>>专题页轮播</option>
                    </select>
                </li>
                <li id="upload">
                    <label><span class="red">*</span> 上传图片：</label>
                    <img src="/assets/images/upload.png" width="100">
                    <input type="file" name="file" id="upimg" data-url="<{:url('third/upload')}>"  />
                    <input type="hidden" name="img" value="<{$carousel.img}>" />
                </li>
                <li class="view-img">
                    <label >&nbsp;</label>
                    <img src="<{$carousel.img}>" style="max-width: 500px">
                </li>
                <li>
                    <label><span class="red">*</span> 轮播标题：</label>
                    <input type="text" placeholder="请输入轮播标题" name="title" value="<{$carousel.title}>" />
                </li>
                <li>
                    <label><span class="red">*</span> 链接地址：</label>
                    <input type="text" placeholder="请输入链接地址" name="href" value="<{$carousel.href}>" />
                </li>
                <li>
                    <label>是否显示：</label>
                    <div class="radio_box">
                        <input type="radio" name="is_open" value="1"  <?=$carousel['is_open'] == 1 ? 'checked':'' ?>> <span>是</span>
                        <span style="width: 15px;height: 1px"></span>
                        <input type="radio" name="is_open" value="0" <?=$carousel['is_open'] == 0 ? 'checked':'' ?>> <span>否</span>
                    </div>
                </li>
                <li>
                    <label>排序值：</label>
                    <input type="text" name="orderby" placeholder="数值越大越靠前" value="<{$carousel['orderby']}>" />
                </li>
            </ul>
            <div class="probtn_box clearfix">
                <input type="submit" value="编辑轮播图" class="btn blue_btn"/>
            </div>
        </form>
    </div>
</div>
{include file="public:footer" /}