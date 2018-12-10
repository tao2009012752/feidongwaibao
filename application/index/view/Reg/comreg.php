{extend name="index/base" /}
{block name="tdk"}
	<title>服务外包人才信息综合服务平台</title>
{/block}
{block name="content"}
<!--注册-->
<div class="registerBox  contant">
	<div class="registerCon">
		<div class="top">
			<img src="<{$img}>/registerStep2.png"/>
		</div>
		<div class="center">
			企业注册
		</div>
		<div class="registerWrap registerWrapCom">
			<div class="user">
				<label><span class="red">*</span>用户名：</label>
				<input type="text" name="username" placeholder="请输入用户名"/>
			</div>
			<div class="pass">
				<label><span class="red">*</span>密码：</label>
				<input type="password" name="password" placeholder="请输入密码"/>
			</div>
			<div class="repass">
				<label><span class="red">*</span>确认密码：</label>
				<input type="password" name="cpassword" placeholder="请输入确认密码"/>
			</div>
			<div  class="logoUp">
				<label><span class="red">*</span>企业logo：</label>
				<div class="upImg">
					<a class="upimg" href="javascript:void(0)"><img src="<{$img}>/upload.png"/></a>
					<input type="file" data-url="<{:url('/admin/third/upload')}>" style="display: none;"  />
				</div>
			</div>
			<div class="comName">
				<label><span class="red">*</span>企业名：</label>
				<input type="text" name="name" placeholder="请输入企业名"/>
			</div>
			<div class="yewu">
				<label><span class="red">*</span>核心业务：</label>
				<input type="text" name="core" placeholder="请输入企业核心业务"/>
			</div>
			<div  class="comImg">
				<label><span class="red">*</span>企业实景：</label>
				<div class="upImg">
					<a class="upimg" href="javascript:void(0)"><img src="<{$img}>/upload.png"/></a>
					<input type="file" data-url="<{:url('/admin/third/upload')}>" style="display: none;"  />
				</div>
			</div>
			<div class="retro">
				<label><span class="red">*</span>企业介绍：</label>
				<textarea name="intro" rows="5" cols="50"></textarea>
			</div>
			<div class="contact">
				<label><span class="red">*</span>联系人：</label>
				<input type="text" name="contact" placeholder="请输入联系人"/>
			</div>
			<div class="tel">
				<label><span class="red">*</span>手机号：</label>
				<input type="text" name="phone" placeholder="请输入联系人手机号"/>
			</div>
			<div class="email">
				<label><span class="red">*</span>邮箱：</label>
				<input type="text" name="email" placeholder="请输入邮箱"/>
			</div>
			<div class="locationt">
				<label><span class="red">*</span>地址：</label>
				<input type="text"name="location" placeholder="请输入地址"/>
			</div>
			<div>
				<label for=""></label>
				<input type="checkbox" name="agree" id="" value=""  class="xieyiBox"/>
				<span class="tong1">我同意</span><a href="#" class="tong">《服务外包人才信息综合服务平台用户协议》</a>
			</div>
			<div class="tijiaoBtn">
				<a href="javascript:void(0)" class="regBtn">注册</a>
			</div>
		</div>
		
	</div>
</div>
<script>
	$(function(){
		Reg.Comreg("<{:url('Reg/regSuccess')}>"); //公司注册
		Common.ImgUpload();//图片上传
	})
</script>
{/block}
