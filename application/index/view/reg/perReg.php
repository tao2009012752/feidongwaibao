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
			个人注册
		</div>
		<div class="registerWrap">
			<div class="user">
				<label><span class="red">*</span>用户名：</label>
				<input type="text" name="username" placeholder="请输入用户名"/>
			</div>
			<div class="user">
				<label><span class="red">*</span>手机号：</label>
				<input type="text" name="phone" placeholder="请输入手机号"/>
			</div>
			<div class="user">
				<label><span class="red">*</span>密码：</label>
				<input type="password" name="password" placeholder="请输入密码"/>
			</div>
			<div class="user">
				<label><span class="red">*</span>确认密码：</label>
				<input type="password" name="cpassword" placeholder="请输入确认密码"/>
			</div>
			<div>
				<label for=""></label>
				<input type="checkbox" name="agree" value=""  class="xieyiBox"/>
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
		Reg.Perreg("<{:url('Reg/regSuccess')}>"); //个人注册
	})
</script>
{/block}
