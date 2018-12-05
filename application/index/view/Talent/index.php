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
                                                            <li><a href="#"><{$v.companyInfo.company_name}></a> 发布了：<a href="#"><{$v.job_name}></a></li>
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
                                                    <a href=""><img src="<{$img}>/talent01.png"/></a>
						</li>
						<li>
							<a href="#"><img src="<{$img}>/talent02.png"/></a>
						</li>
						<li>
							<a href="#"><img src="<{$img}>/talent03.png"/></a>
						</li>
						<li>
							<a href="#"><img src="<{$img}>/talent04.png"/></a>
						</li>
					</ul>
				</div>
				<div class="talentCenter fl">
					<div class="newsTap qiehuan newsTap1">
						<div class="slideTxtBox borderdc">
							<div class="hd">
								<ul class="tapUl"><li>通知公告</li><li>行业资讯</li></ul>
							</div>
							<div class="bd">
								<ul>
                                                                        {volist name="gg" id="v"}
									<li><span class="date"><{$v.add_time|date='Y-m-d',###}></span><a href="listDetail.html" target="_blank"><{$v.title}></a></li>
									{/volist}
								</ul>
								<ul>
                                                                        {volist name="zx" id="v"}
									<li><span class="date"><{$v.add_time|date='Y-m-d',###}></span><a href="listDetail.html" target="_blank"><{$v.title}></a></li>
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
								<label for="">用户名：</label><input type="text" placeholder="请输入用户名" />
							</div>
							<div>
								<label for="">密&nbsp;码：</label><input type="text" placeholder="请输入密码" />
							</div>
							<div class="submitBox">
								<a href="#"><img src="<{$img}>/talentBtn.png"/></a>
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
                                                                                        <a href="<{url('/index/talent/userinfo')}>" target="_blank">
                                                                                            <img src="<{$v.info.pic}>"/>
											</a>
										</div>
										<div class="title">
											<p>
												<a href="#" target="_blank"><{$v.info.name}></a>
											</p>
											<p>
												<a href="#"><{$v.info.major}></a>
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
									<div><a href="#"><{$v.info.name}></a><span class="time"><{$v.add_time|date='Y-m-d',###}></span></div>
									<div><span><{$v.info.degree}></span><span class="ge">|</span><span><{$v.info.work_exprience}></span><span class="ge">|</span><span>技能：<{$v.info.skill}></span></div>
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
                                                                <a href="#" class="fl job"><{$v.job_name}></a>
                                                                <a href="#" class="fr"><{$v.companyInfo.company_name}></a>
                                                        </li>

                                                </ul>
                                            {/volist}
                                        </div>
				</div>
			</div>
		</div>
{/block}