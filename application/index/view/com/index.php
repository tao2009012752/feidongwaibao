<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>企业详情-服务外包人才信息综合服务平台</title>
    <link rel="stylesheet" type="text/css" href="<{$css}>/style.css"/>
    <script src="<{$js}>/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="<{$js}>/jquery.SuperSlide.2.1.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="<{$js}>/index.js" type="text/javascript" charset="utf-8"></script>
    <script src="<{$js}>/main.js" type="text/javascript" charset="utf-8"></script>
</head>
<body style="background: #fff;">
<!--top-->
<div class="pageTop companyPage">
    <div class="pageTopBox contant companys">
        <ul>
            <li><a href="/">网站首页</a><span class="ge">|</span></li>
            <li><a href="<{:url('/index/Index/newslist')}>">资讯中心</a><span class="ge">|</span></li>
            <li><a href="<{:url('/index/Talent/index')}>">人才库</a><span class="ge">|</span></li>
            <li><a href="<{:url('/index/Train/index')}>">培训信息</a><span class="ge">|</span></li>
            <li><a href="<{:url('/index/Job/index')}>">人才招聘</a><span class="ge">|</span></li>
            <li><a href="/kaoshi/index.php?user-app-login">人才考评</a><span class="ge">|</span></li>
            <li><a href="/kaoshi/index.php?user-app-login">在线学习</a><span class="ge">|</span></li>
            <li><a href="<{:url('/index/About/index')}>">关于我们</a><span class="ge">|</span></li>
            <li><a href="<{:url('/index/Contact/index')}>">联系我们</a></li>
        </ul>
    </div>
</div>
<div class="companyWrap contant">
    <div class="top" style="background: url('<{$img}>/companyBg.jpg') no-repeat center;">
        <div class="companyTit">
            <{$com.company_name}>
        </div>
    </div>
    <div class="nav" style="background: url('<{$img}>/companyLine.jpg') repeat-x;">
        <ul>
            <li><a data="1" href="javascript:void(0)">公司首页</a><span class="ge1">|</span></li>
            <li><a data="2" href="javascript:void(0)">核心业务</a><span class="ge1">|</span></li>
            <li><a data="3" href="javascript:void(0)">热招职位</a><span class="ge1">|</span></li>
            <li><a data="4" href="javascript:void(0)">联系我们</a></li>
        </ul>
    </div>
    <div class="companyDetail">
        <div class="fl leftBox3">
            <div class="jibenBox">
                <h5>基本信息</h5>
                <div class="jibenText">
                    <ul>
                        <li><{$com.company_name}></li>
                        <li>所在地：<{$com.location}></li>
                        <li>核心业务：<{$com.core_business}></li>
                    </ul>
                    
                </div>
            </div>
            <div class="jibenBox" style="margin-top: 10px;">
                <h5>热招职位</h5>
                <div class="jibenText">
                    <ul>
                        {volist name= "comjob" id="v"}
                        <li><a href="<{:url('job/jobDetail',['id'=>$v['job_id']])}>"><{$v.job_name}></a></li>
                        {/volist}
                    </ul>
                </div>
            </div>
        </div>
        <div class="fr rightBox3 right1">
            <h5>公司简介</h5>
            <div class="companyImg">
                <img src="<{$com.image}>"/>
            </div>
            <div class="jianjie">
                <{$com.intro}>
            </div>
        </div>
        <div class="fr rightBox3 right2" style="display: none;">
            <h5>核心业务</h5>
            <div class="jianjie">
                <{$com.core_business}>
            </div>
        </div>
        <div class="fr rightBox3 right3" style="display: none;">
            <h5>热招职位</h5>
            <div class="jianjie">
                <ul class="hotzhao">
                    {volist name= "comjob" id="v"}
                    <li><a href="<{:url('job/jobDetail',['id'=>$v['job_id']])}>"><{$v.job_name}></a><span><{$v.update_time|substr=10}></span></li>
                    {/volist}
                </ul>
            </div>
        </div>
        <div class="fr rightBox3 right4" style="display: none;">
            <h5>联系我们</h5>
            <div class="jianjie">
                <table border="1" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="25%"  class="blueBg">地址</td>
                        <td><{$com.location}></td>
                    </tr>
                    <tr>
                        <td width="25%" class="blueBg">联系人</td>
                        <td><{$com.contact}></td>
                    </tr>
                    <tr>
                        <td width="25%" class="blueBg">电话</td>
                        <td><{$com.phone}></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<!--footer-->
<div class="footer">
    <div class="footerBox contant">
        <p>Copyright @2013 All Rright Reserve 免责声明 安徽皖信人力资源管理有限公司 版权所有 皖ICP备10203475号 </p>
				<p>地址：合肥市政务区龙图路与怀宁路交口置地广场C座8楼 </p>
				<p>电话：0551-63432400, 0551-63431150</p>
    </div>
</div>
<script>
    $(function(){
        Company.Change();//切换div
    })
</script>
</body>
</html>
