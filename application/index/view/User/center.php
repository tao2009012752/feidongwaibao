{extend name="user/base" /}
{block name="tdk"}
<title>个人中心</title>
{/block}
{block name="content"}
	<div class="fr rightBox">
				<div class="rightWrap">
					<h6>个人中心</h6>
					<div class="userJiBen">
						<div class="personalText">
							用户 <{$userInfo.account}>，上午好，欢迎光临服务外包人才信息综合服务平台!
						</div>
						<div class="tishi">
							<div class="tishiBox">
								温馨提示：会员注册成功后，请及时完善您的简历信息，我们将及时为您实名认证，使您享受更多的会员特权服务！
							</div>
						</div>
					</div>
				</div>
				<div class="rightWrap" style="margin-top: 20px;">
					<h6>基本信息</h6>
					<div class="jibenCon">
						<div class="jibenTit">基本资料</div>
						<div class="tableCon">
							<p><label>用户名：</label><input type="text" value="<{$userInfo.account}>" readonly="readonly"/></p>
							<p><label>手机号：</label><input type="text" value="<{$userInfo.phone}>" readonly="readonly"/></p>
							<p><label>电子邮箱：</label><input type="text" value="<{$userInfo.info.email}>" readonly="readonly"/></p>
							<p><label>联系地址：</label><input type="text" value="<{$userInfo.info.address}>" readonly="readonly"/></p>
						</div>
					</div>
				</div>
				<div class="rightWrap" style="margin-top: 20px;">
					<h6>简历信息</h6>
					<div class="jibenCon">
						<ul class="jianliUl">
							<li class="nameText">
								<div class="nameText">用户<{$userInfo.info.name}></div>
							</li>
							<li><a href="#" class="fl">基本信息</a><a href="<{:url('/index/User/resume_modify')}>" class="fr">修改</a></li>
							<li><a href="#" class="fl">求职意向</a><a href="<{:url('/index/User/resume_modify')}>" class="fr">修改</a></li>
							<li><a href="#" class="fl">工作经验</a><a href="<{:url('/index/User/resume_modify')}>" class="fr">修改</a></li>
							<li><a href="#" class="fl">项目经验</a><a href="<{:url('/index/User/resume_modify')}>" class="fr">修改</a></li>
							<li><a href="#" class="fl">个人评价</a><a href="<{:url('/index/User/resume_modify')}>" class="fr">修改</a></li>
						</ul>
						
					</div>
					
				</div>
			</div>
{/block}
		
