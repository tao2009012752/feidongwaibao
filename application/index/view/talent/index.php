{extend name="index/base" /}
{block name="tdk"}
	<title>服务外包人才信息综合服务平台</title>
{/block}
{block name="content"}
<!--人才库-->
<div class="talentBox contant gundong">
    <div class="talentCon borderdc">
        <div class="txtMarquee-left">
            <div class="bd">
                <div class="fl newsText"><i class="fa fa-bullhorn"> 最新消息：</i></div>
                <div class="fl">
                    <ul class="infoList">
                        {volist name="jobs" id="v"}
                        <li><a href="<{:url('Com/index',['id'=>$v['companyInfo']['company_id']])}>"><{$v.companyInfo.company_name}></a> 发布了：<a href="<{:url('Job/jobDetail',['id'=>$v['job_id']])}>"><{$v.job_name}></a></li>
                        {/volist}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="talentTop borderdc">
        <div class="talentLeft fl">
            <ul>
                <li>
                    <a href="<{:url('/index/Talent/talent_model',['type'=>'talent_introduction'])}>"><img src="<{$img}>/talent01.png"/></a>
                </li>
                <li>
                    <a href="<{:url('/index/Talent/talent_model',['type'=>'storage_standard'])}>"><img src="<{$img}>/talent02.png"/></a>
                </li>
                <li>
                    <a href="<{:url('/index/Talent/talent_model',['type'=>'storage_process'])}>"><img src="<{$img}>/talent03.png"/></a>
                </li>
                <li>
                    <a href="<{:url('Reg/perReg')}>"><img src="<{$img}>/talent04.png"/></a>
                </li>
            </ul>
        </div>
        <div class="talentCenter fl">
            <div class="newsTap qiehuan newsTap1">
                <div class="slideTxtBox borderdc">
                    <div class="hd">
                        <ul class="tapUl">
                            <li>通知公告</li>
                            <li>行业资讯</li>
                        </ul>
                    </div>
                    <div class="bd">
                        <ul>
                            {volist name="gg" id="v"}
                            <li><span class="date"><{$v.add_time|date='Y-m-d',###}></span><a
                                    href="<{:url('/index/Newsinfo/listdetail',['id'=>$v['news_id']])}>" target="_blank"><{$v.title}></a>
                            </li>
                            {/volist}
                        </ul>
                        <ul>
                            {volist name="zx" id="v"}
                            <li><span class="date"><{$v.add_time|date='Y-m-d',###}></span><a
                                    href="<{:url('/index/Newsinfo/listdetail',['id'=>$v['news_id']])}>" target="_blank"><{$v.title}></a>
                            </li>
                            {/volist}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="talentRight fl borderdc">
            <div class="talentLoginBox">
                <div class="title">
                    <img src="<{$img}>/talentLogin.png"/>
                </div>
                <div class="talentInput">
                    <div>
                        <label for="">用户名：</label><input type="text" name="username" placeholder="请输入用户名" />
                    </div>
                    <div>
                        <label for="">密&nbsp;码：</label><input type="password" name="password" placeholder="请输入密码" />
                    </div>
                    <div class="submitBox">
                        <a href="##"><img  class="loginBtn" src="<{$img}>/talentBtn.png"/></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="talentPic borderdc">
        <div class="talentPicBox">
            <h4><span class="shu"></span>最新人才照片<a class="more1" href="#">更多></a></h4>
            <div class="pics">
                <div class="picScroll-left">
                    <div class="hd">
                        <a class="next"></a>
                        <ul></ul>
                        <a class="prev"></a>
                    </div>
                    <div class="bd">
                        <ul class="picList">
                            {volist name="users" id="v"}
                            <li>
                                <div class="pic">
                                    <a href="<{:url('/index/Talent/get_resume_info',['userinfo_id'=>$v['userinfo_id']])}>" target="_blank">
                                        <img src="<{$v.pic}>"/>
                                    </a>
                                </div>
                                <div class="title">
                                    <p>
                                        <a href="<{:url('/index/Talent/get_resume_info',['userinfo_id'=>$v['userinfo_id']])}>" target="_blank"><{$v.name}></a>
                                    </p>
                                    <p>
                                        <a href="<{:url('/index/Talent/get_resume_info',['userinfo_id'=>$v['userinfo_id']])}>"><{$v.major}></a>
                                    </p>
                                </div>
                            </li>
                            {/volist}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="talentPic borderdc">
        <div class="talentPicBox">
            <h4><span class="shu"></span>最新简历 <a class="more1" href="#">更多></a></h4>
            <div class="jianliBox">
                <div class="fl jian">
                    <ul>
                        {volist name="users" id="v"}
                        <li>
                            <div><a href="<{:url('/index/Talent/get_resume_info',['userinfo_id'=>$v['userinfo_id']])}>"><{$v.name}></a><span
                                    class="time"><{$v.add_time|date='Y-m-d',###}></span></div>
                            <div><span><{$v.degree}></span><span class="ge">|</span><span><{$v.work_exprience}></span><span
                                    class="ge">|</span><span>技能：<{$v.skill}></span></div>
                        </li>
                        {/volist}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="adverBox1">
        <div class="adBox">
            <a href="#"><img src="<{$img}>/adver01.png"/></a>
        </div>
    </div>
    <div class="talentPic borderdc">
        <div class="talentPicBox">
            <h4><span class="shu"></span>推荐职位 <a class="more1" href="#">更多></a></h4>
            <div class="recruitCon recruitCon1">
                {volist name="jobs" id="v"}
                <ul class="reBox fl">
                    <li class="recruitLi nomarr">
                        <a href="<{:url('job/jobDetail',['id'=>$v['job_id']])}>" class="fl job"><{$v.job_name}></a>
                        <a href="<{:url('companys/index',['id'=>$v.companyInfo.company_id])}>" class="fr"><{$v.companyInfo.company_name}></a>
                    </li>

                </ul>
                {/volist}
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        Index.Login(); //用户登录
    })
</script>

{/block}