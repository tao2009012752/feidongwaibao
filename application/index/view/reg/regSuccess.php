{extend name="index/base" /}
{block name="tdk"}
	<title>服务外包人才信息综合服务平台</title>
{/block}
{block name="content"}
<!--注册-->
<div class="registerBox  contant">
	<div class="registerCon1">
		<div class="top">
			<img src="<{$img}>/registerStep3.png"/>
		</div>
		<div class="gou"><i class="fa fa-check-circle"></i></div>
		<div>注册成功</div>
		<div class="backBtn">
			<a href="/" class="backHome">返回首页</a>
			<a href="<{:url('Login/index')}>" class="backLogin">返回登录页</a>
		</div>
	</div>
</div>
{/block}
