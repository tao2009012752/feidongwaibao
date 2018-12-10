{extend name="index/base" /}
{block name="tdk"}
	<title>服务外包人才信息综合服务平台</title>
{/block}
{block name="content"}
<div class="loginPage">
	<div class="loginPageBox contant">
		<div class="loginCons">
			<h5>账号登录</h5>
			<ul class="changeLogin">
				<li class="changeLoginAction">个人登录</li>
				<li class="nomarr">企业登录</li>
			</ul>
			<div  class="loginWrap">
				<div class="userName">
					<label for="">用户名：</label>
					<input type="text" name="username" placeholder="请输入用户名"/>
				</div>
				<div class="passWord">
					<label for="">密码：</label>
					<input type="password" name="password" placeholder="请输入密码"/>
				</div>
				<div class="submitBox">
					<input type="button" class="loginBtn" data-type="1" name="" id="" value="登录" />
				</div>
				<div class="noUser">
					<div class="fl">没有账号，<a href="<{:url('Reg/index')}>">立即注册</a></div>
					<!--div class="fr"><a href="#">忘记密码</a></div-->
				</div>
			</div>
			<div  class="loginWrap loginWrap1 disnone">
				<div class="userName">
					<label for="">用户名：</label>
					<input type="text" name="cusername" placeholder="请输入用户名"/>
				</div>
				<div class="passWord">
					<label for="">密码：</label>
					<input type="password" name="cpassword" placeholder="请输入密码"/>
				</div>
				<div class="submitBox">
					<input type="button" name="" data-type="2" class="loginBtn" id="" value="登录" />
				</div>
				<div class="noUser">
					<div class="fl">没有账号，<a href="<{:url('Reg/index')}>">立即注册</a></div>
					<!--div class="fr"><a href="#">忘记密码</a></div-->
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(function(){
		Index.Login('/');
	})
</script>
{/block}
