<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>人才系统</title>
		<link rel="stylesheet" type="text/css" href="<{$css}>/login.css"/>
		<script src="<{$js}>/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="<{$js}>/main.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body style="background: #f0f0f0;">
		<div class="talentTopLogo">
			<div class="talentLogo contant">
				<div class="fl">
					<a href="index.html">
						<img src="<{$img}>/logo.png"/>
					</a>
				</div>
			</div>
		</div>
		<div class="talentBg">
			<div class="talentBgBox">
				<div class="contant">
					<div class="loginBox fr">
						<div class="talentForm">
							<div class="inputBox ">
								<input type="text" placeholder="请输入用户名" name="username" class="userBg" />
							</div>
							<div class="inputBox">
								<input type="password" placeholder="请输入密码" name="password" class="passBg"/>
							</div>
							<div class="inputBox remen1">
								<input type="checkbox" />记住密码
							</div>
							<div class="talentSubmit">
								<input type="submit" class="loginBtn"  data-type="1" value="登录">
							</div>
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
	</body>
</html>
