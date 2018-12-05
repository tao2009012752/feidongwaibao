<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		{block name="tdk"}{/block}
		<link rel="stylesheet" type="text/css" href="<{$css}>/style.css"/>
		<script src="<{$js}>/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="<{$js}>/jquery.SuperSlide.2.1.1.js" type="text/javascript" charset="utf-8"></script>
		<script src="<{$js}>/index.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<!-- header -->
		<div class="pageTop">
			<div class="pageTopBox contant">
				<div class="fl">
					2018年5月15日   星期二  肥东服务外包人才信息综合服务平台
				</div>
				<div class="fr loginText">
					<a href="#">登录</a>  |  <a href="#">注册</a>
				</div>
			</div>
		</div>
		<!--logo-->
		<div class="headBox">
			<div class="logosBox contant">
				<div class="logo fl">
					<a href="#"><img src="<{$img}>/logo.png"/></a>
				</div>
				<div class="fr searchBox">
					<div class="fl">
						<input type="text" class="searchInput" placeholder="请输入相关文章的关键字" />
					</div>
					<div class="fl searchBtnBox">
						<input type="button" class="searchBtn" value="搜索"/>
					</div>
					
				</div>
			</div>
		</div>
		<!--nav-->
		<div class="navWrap">
			<div class="navBox contant">
				<ul>
					<li class="liAction"><a href="/index/index/index.html">网站首页</a></li>
                                        <li><a href="/index/index/newslist.html">资讯中心</a></li>
					<li><a href="/index/talent/index.html">人才库</a></li>
					<li><a href="#">培训信息</a></li>
					<li><a href="#">人才招聘</a></li>
					<li><a href="#">人才考评</a></li>
					<li><a href="#">在线学习</a></li>
					<li><a href="#">关于我们</a></li>
					<li><a href="#">联系我们</a></li>
				</ul>
			</div>
		</div>
		<!-- header结束 -->

		<!-- body -->
		{block name="content"}{/block}
		<!-- body结束 -->

		<!-- footer -->
		<div class="footer">
			<div class="footerBox contant">
				<p>Copyright @2013 All Rright Reserve 免责声明 安徽易服商务服务有限公司 版权所有 皖ICP备16008153号 </p>
				<p>地址：合肥市政务区龙图路与怀宁路交口置地广场C座2403室 </p>
				<p>电话：0551-63530530</p>
			</div>
		</div>
		<!-- footer结束 -->
	</body>
</html>
