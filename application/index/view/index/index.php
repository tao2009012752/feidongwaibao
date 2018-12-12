{extend name="index/base" /}
{block name="tdk"}
	<title>首页-服务外包人才信息综合服务平台</title>
{/block}
{block name="content"}
	<!--资讯-->
	<div class="news contant indexPage">
		<div class="newsBox">
			<div class="fl">
				<div class="mySlider">
					<div id="slideBox" class="slideBox">
						<div class="hd">
							<ul>{volist name="lblist" id="v"}<li></li>{/volist}</ul>
						</div>
						<div class="bd">
							<ul>
								{volist name="lblist" id="v"}
								<li>
									<div class="sliTit">
										<p><{$v.title}></p>
									</div>
									<a href="<{$v.href}>" target="_blank"><img src="<{$v.img}>" /></a>
								</li>
								{/volist}
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div class="fr">
				<div class="newsTap">
					<div class="slideTxtBox">
						<div class="hd">
							<ul class="tapUl"><li>通知公告</li><li>行业资讯</li></ul>
						</div>
						<div class="bd">
							<ul>
								{volist name="gglist" id="v"}
								<li>
									<span class="date"><{$v.add_time|date='Y-m-d',###}></span>
									<a href="<{:url('Newsinfo/listdetail',['id'=>$v['news_id']])}>" target="_blank"><{$v.title}></a>
								</li>
								{/volist}
								</ul>
							<ul>
								{volist name="zxlist" id="v"}
								<li>
									<span class="date"><{$v.add_time|date='Y-m-d',###}></span>
									<a href="<{:url('Newsinfo/listdetail',['id'=>$v['news_id']])}>" target="_blank"><{$v.title}></a>
								</li>
								{/volist}
							</ul>
						</div>
					</div>
				</div>
				<div class="loginBox">
					<div class="loginTit">
						<img src="<{$img}>/yonghu.png" alt="" />
					</div>
					
                                    {if condition="$userdata"}
                                    <div class="loginText">
                                            欢迎您
                                            <a href="{if condition="isset($userdata['company_name'])"}
                                             <{:url('Companys/center')}>
                                              {/if}"><{$userdata.account}></a>
                                    </div>
                                    {else /}
                                   <div class="loginForm">
						<div class="loginText">
							<a href="#"  class="liActions tapText yongTap">个人会员</a>
							<span class="dividing">|</span>
							<a href="#" class="tapText qiTap">企业会员</a>
						</div>
						<div class="loginCon yonghuBox">
							<form action="" method="post">
								<div class="fl">
									<div class="inputLine">
										<label for="" class="leftName">用户名：</label><input type="text" name="username" class="formInputs" placeholder="请输入用户名或者手机号"/>
									</div>
									<div class="inputLine">
										<label for="" class="leftName">密码：</label><input type="password" name="password" class="formInputs" placeholder="请输入密码"/>
									</div>
								</div>
								<div class="fr loginBtn" data-type="1">
									<img src="<{$img}>/loginBtn.png" />
								</div>
							</form>
                                                    
						</div>
						<div class="loginCon disnone qiyeBox">
							<form action="" method="post">
								<div class="fl">
									<div class="inputLine">
										<label for="" class="leftName">用户名：</label><input type="text" name="cusername" class="formInputs" placeholder="请输入企业用户名或者手机号"/>
									</div>
									<div class="inputLine">
                                                                            <label for="" class="leftName">密码：</label><input type="password"name="password" class="formInputs" placeholder="请输入密码"/>
									</div>
								</div>
								<div class="fr loginBtn" data-type="2">
									<img src="<{$img}>/loginBtn.png"/>
								</div>
							</form>
						</div>
					</div>
                                    {/if}
				</div>
			</div>
		</div>
	</div>
        <script>
                $(function(){
                        Index.Login('/');
                })
        </script>
	<!--系统集合-->
	<div class="systemBox contant">
		<div class="systemCon">
			<ul>
				<li class="nomarl"><a href="/kaoshi/index.php?user-app-login1"><img src="<{$img}>/xuexi.png"/></a></li>
				<li><a href="/kaoshi/index.php?user-app-login"><img src="<{$img}>/kaoshi.png"/></a></li>
                                <li><a href="<{:url('/index/Newsinfo/index')}>"><img src="<{$img}>/zixun.png"/></a></li>
				<li><a href="<{:url('/index/Login/tlogin')}>"><img src="<{$img}>/ku.png"/></a></li>
				<li><a href="<{:url('/index/Job/index')}>"><img src="<{$img}>/rencai.png"/></a></li>
			</ul>
		</div>
	</div>
	<!--政策列表-->
	<div class="conBox contant">
		<div class="conCon fl zhenceBox">
			<h3><span>政策法规</span></h3>
			<div class="zhengBox">
				<div class="country fl style1">
					<div class="titBox">
						<div class="titleBox">
							<div class="fl tits">国家政策</div>
							<div class="fr more"><a href="<{:url('Newsinfo/index',['cate'=>10])}>">更多>></a></div>
						</div>
						<div class="detailBox">
							<ul>
								{volist name="gjzclist" id="v"}
								<li>
									<a href="<{:url('Newsinfo/listdetail',['id'=>$v['news_id']])}>">
										<{$v.title}>
									</a>
									<span class="date"><{$v.add_time|date="Y-m-d",###}></span>
								</li>
								{/volist}
							</ul>
						</div>
					</div>
				</div>
				<div class="local fl style2">
					<div class="titBox">
						<div class="titleBox">
							<div class="fl tits">地方政策</div>
							<div class="fr more"><a href="<{:url('Newsinfo/index',['cate'=>11])}>">更多>></a></div>
						</div>
						<div class="detailBox">
							<ul>
								{volist name="dfzclist" id="v"}
								<li>
									<a href="<{:url('Newsinfo/listdetail',['id'=>$v['news_id']])}>">
										<{$v.title}>
									</a>
									<span class="date"><{$v.add_time|date="Y-m-d",###}></span>
								</li>
								{/volist}
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="fl pingtaiBox">
			<div class="conCon1">
				<h3><span>相关平台</span></h3>
				<div class="platBox">
					<div class="pingBox">
						<div class="fl">
                                                    <a href="<{:url('Zj/index')}>"><img src="<{$img}>/zhuan.png"/></a>
						</div>
						<div class="fr">
							<a href="<{:url('/index/Talent/index')}>"><img src="<{$img}>/ren.png"/></a>
						</div>
					</div>
					<div class="pingBox">
						<div class="fl">
							<a href="<{:url('/index/Train/ncsoin')}>">
								<img src="<{$img}>/xiangmu.png"/>
							</a>
						</div>
						<div class="fr">
                                                    <a href="<{:url('/index/Newsinfo/index',['cate'=>15])}>">
								<img src="<{$img}>/ke.png"/>
							</a>
						</div>
					</div>
					<div class="pingBox">
						<div class="fl">
							<a href="<{:url('Job/index')}>">
								<img src="<{$img}>/qiye.png"/>
							</a>
						</div>
						<div class="fr">
							<a href="<{:url('/index/Newsinfo/index',['cate'=>23])}>">
								<img src="<{$img}>/shizi.png"/>
							</a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!--广告横幅-->
	<div class="adver contant">
		<div class="adverBox">
			<a href="#"><img src="<{$img}>/adver.png"/></a>
		</div>
	</div>
	<!--考试信息-->
	<div class="exam contant">
		<div class="examBox conCon">
			<h3><span>考试信息</span></h3>
			<div class="kaoNews">
				<div class="fl examIcons">
					<div>
						<a href="<{:url('Newsinfo/index',['cate'=>17])}>"><img src="<{$img}>/examImg01.png"/></a>
					</div>
					<div>
						<a href="<{:url('Newsinfo/index',['cate'=>18])}>"><img src="<{$img}>/examImg02.png"/></a>
					</div>
					<div>
						<a href="<{:url('Newsinfo/index',['cate'=>19])}>"><img src="<{$img}>/examImg03.png"/></a>
					</div>
					<div>
						<a href="<{:url('Newsinfo/index',['cate'=>20])}>"><img src="<{$img}>/examImg04.png"/ class="nomarb"></a>
					</div>
				</div>
				<div class="local fl style2">
					<div class="titBox">
						<div class="titleBox">
							<div class="fl tits">考试信息</div>
							<div class="fr more"><a href="<{:url('Newsinfo/index',['cate'=>15])}>">更多>></a></div>
						</div>
						<div class="detailBox">
							<ul>
								{volist name="kslist" id="v"}
								<li>
									<a href="<{:url('Newsinfo/listdetail',['id'=>$v['news_id']],'html',true)}>">
										<{$v.title}>
									</a>
									<span class="date"><{$v.add_time|date="Y-m-d",###}></span>
								</li>
								{/volist}
							</ul>
						</div>
					</div>
				</div>
				<div class="examxin fr">
					<div class="topImg">
                                                <a href="<{:url('/index/Newsinfo/index',['cate'=>15])}>"><img src="<{$img}>/news.png"/></a>
						<div class="imgTit">省人事考试应急协调小组第19次联席会议召开</div>
					</div>
					<div class="chenLine">
						<a href="http://www.ncie.gov.cn/Category_1247/Index.aspx"><img src="<{$img}>/chengSearch.png"/></a>
					</div>
					<div class="biaoLine">
						<a href="#"><img src="<{$img}>/downloadExcel.png"/></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--培训信息-->
	<div class="train contant">
		<div class="trainBox conCon">
			<h3><span>培训信息</span></h3>
			<div class="peiBox">
				<div class="kecheng">
					<div class="country fl style1">
						<div class="titBox">
							<div class="titleBox">
								<div class="fl tits">热门课程</div>
								<div class="fr more"><a href="<{:url('Newsinfo/index',['cate'=>21])}>">更多>></a></div>
							</div>
							<div class="detailBox">
								<ul>
									{volist name="kclist" id="v"}
									<li>
										<a href="<{:url('Newsinfo/listdetail',['id'=>$v['news_id']])}>">
											<{$v.title}>
										</a>
										<span class="date"><{$v.add_time|date="Y-m-d",###}></span>
									</li>
									{/volist}
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="local fl style2">
					<div class="titBox">
						<div class="titleBox">
							<div class="fl tits">人才指导</div>
							<div class="fr more"><a href="<{:url('Newsinfo/index',['cate'=>22])}>">更多>></a></div>
						</div>
						<div class="detailBox">
							<ul>
								{volist name="zdlist" id="v"}
								<li>
									<a href="<{:url('Newsinfo/listdetail',['id'=>$v['news_id']])}>">
										<{$v.title}>
									</a>
									<span class="date"><{$v.add_time|date="Y-m-d",###}></span>
								</li>
								{/volist}
							</ul>
						</div>
					</div>
				</div>
				<div class="peiRight fr">
					<div>
						<a href="/kaoshi/index.php?user-app-login1"><img src="<{$img}>/onlineStudy.png"/></a>
					</div>
					<div class="shizi">
						<div class="titleBox">
							<div class="fl tits">师资力量</div>
							<div class="fr more"><a href="<{:url('Newsinfo/index',['cate'=>23])}>">更多>></a></div>
						</div>
						<div class="shiziBox">
							<div class="fl shiziImg">
								<img src="<{$img}>/shiziImg.png"/>
							</div>
							<div class="fr shiziText">
								<a href="#">
									合肥市皖信职业技术培训学校，
								是合肥一家职业技能培训学校合
								肥市皖信职业技术培训学校，
								是合肥一家职业技能培训<span class="colorBlue">[详细]</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--人才招聘-->
        <div class="recruit contant">
			<div class="recruitBox conCon">
				<h3><span>人才招聘</span></h3>
			</div>
			<div class="recruitCon">
				<ul class="reBox">
                                        {volist name="joblist" id="v"}
					<li class="recruitLi">
						<a href="<{:url('Job/jobDetail',['id'=>$v['job_id']])}>" class="fl job"><{$v.job_name}></a>
						<a href="<{:url('Com/index',['id'=>$v['companyInfo']['company_id']])}>" class="fr"><{$v.companyInfo.company_name}> </a>
					</li>
                                        {/volist}
				</ul>
			</div>
		</div>
	<!--企业录-->
	<div class="company contant">
		<div class="companyBox conCon">
			<h3><span>企业录</span></h3>
			<div class="companyCon">
				<div class="picMarquee-left">
					<div class="hd">
						<a class="next"></a>
						<a class="prev"></a>
					</div>
					<div class="bd">
						<ul class="picList">
							{volist name="comlist" id="v"}
							<li>
								<div class="pic"><a href="<{:url('Com/index',['id'=>$v['company_id']])}>"><img src="<{$v.logo}>"/></a></div>
								<div class="title"><{$v.company_name}></a></div>
							</li>
							{/volist}
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(function(){
			Index.Login();
		})
	</script>
{/block}
