<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    {block name="tdk"}{/block}
    <link rel="stylesheet" type="text/css" href="<{$css}>/style.css"/>
    <link rel="stylesheet" type="text/css" href="<{$css}>/font-awesome.min.css"/>
    <script src="<{$js}>/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="<{$js}>/jquery.SuperSlide.2.1.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="<{$js}>/index.js" type="text/javascript" charset="utf-8"></script>
    <script src="<{$js}>/main.js" type="text/javascript" charset="utf-8"></script>
</head>
<body style="background: #f3f3f3;">
<!--top-->
<div class="pageTop companyPage">
    <div class="pageTopBox contant companys">
        <ul>
            <li><a href="/">网站首页</a><span class="ge">|</span></li>
            <li><a href="<{:url('/index/Index/newslist')}>">资讯中心</a><span class="ge">|</span></li>
            <li><a href="<{:url('/index/Talent/index')}>">人才库</a><span class="ge">|</span></li>
            <li><a href="#">培训信息</a><span class="ge">|</span></li>
            <li><a href="<{:url('/index/Job/index')}>">人才招聘</a><span class="ge">|</span></li>
            <li><a href="/kaoshi/index.php?user-app-login">人才考评</a><span class="ge">|</span></li>
            <li><a href="/kaoshi/index.php?user-app-login">在线学习</a><span class="ge">|</span></li>
            <li><a href="<{:url('/index/About/index')}>">关于我们</a><span class="ge">|</span></li>
            <li><a href="<{:url('/index/Contact/index')}>">联系我们</a></li>
        </ul>
    </div>
</div>
<!--logo-->
<div class="centerLogo">
    <div class="contant">
        <div class="fl centerTop"><img src="<{$img}>/logo.png" alt="" /><span>|用户中心</span></div>
    </div>
</div>
<div class="centerPersonalBox contant">
    <div class="fl leftBox">
        <div class="centerImg">
            <div class="centerImgBox">
                <img src="<{$img}>/centerImg.png"/>
            </div>
            <div class="userBox">
                <span class="user"><{$userInfo.account}></span>
                <span class="qian">个人用户</span>
            </div>
        </div>
        <div class="jiben">
            <h5><i class="fa fa-file-text-o"></i>基本资料</h5>
            <ul>
                <li><a href="<{:url('/index/User/person_modify')}>">资料修改</a></li>
                <li><a href="<{:url('/index/User/password_modify')}>">修改密码</a></li>
            </ul>
        </div>
        <div class="jiben">
            <h5><i class="fa fa-file-text-o"></i>简历设置</h5>
            <ul>
                <li><a href="<{:url('/index/User/resume_modify')}>">修改简历</a></li>
                <li><a href="<{:url('/index/Talent/get_resume_info',['userinfo_id'=>$userInfo['info']['userinfo_id']])}>">简历预览</a></li>
            </ul>
        </div>
        <div class="jiben">
            <h5><i class="fa fa-file-text-o"></i>快速入口</h5>
            <ul>
                <li><a href="<{:url('/index/Job/index')}>">企业招聘</a></li>
                <li><a href="<{:url('/index/Talent/index')}>">人才库</a></li>
                <li><a href="<{:url('/index/Train/index')}>">培训信息</a></li>
            </ul>
        </div>
    </div>
		<!-- body -->
		{block name="content"}{/block}
    </div>
    <!-- body结束 -->

		<!-- footer -->
        <div class="footer">
            <div class="footerBox contant">
                <p>Copyright @2013 All Rright Reserve 免责声明 安徽易服商务服务有限公司 版权所有 皖ICP备16008153号 </p>
                <p>地址：合肥市政务区龙图路与怀宁路交口置地广场C座2403室 </p>
                <p>电话：0551-63530530</p>
            </div>
        </div>
    </body>
</html>
