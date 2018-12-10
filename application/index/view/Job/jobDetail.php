{extend name="index/base" /}
{block name="tdk"}
<title>服务外包人才信息综合服务平台</title>
{/block}
{block name="content"}
		<!--招聘详细-->
		<div class="zhaoBox contant">
			<div class="zhaoCon">
				<div class="erjiTit">
					<span class="rightnow">当前位置：<a href="#">招聘列表</a> > 招聘信息</span>
				</div>
				<div class="zhaoDetailBox">
					<div class="fl leftBox1">
						<div class="top">
							<div class="fl">
								<div class="jobName"><{$job_info.job_name}></div>
								<div class="companyName"><a href="<{:url('Companys/index',['id'=>$job_info['companyInfo']['company_id']])}>"><{$job_info.companyInfo.company_name}></a></div>
								<div class="requireds"><{$job_info.degree}><span class="ge">|</span><{$job_info.need_num}>人<span class="ge">|</span>包河区</div>
								<input type="button" name="" id="" value="应聘" class="yingping"/>
							</div>
							<div class="fr">
								<div class="xinzi"><{$job_info.min_salary}>-<{$job_info.max_salary}>元/月</div>
							</div>
						</div>
						<div class="yaoqiu">
							<h5><span class="shu"></span>任职要求</h5>
							<div class="jobContent">
								<p><{$job_info.requirements}></p>
							</div>
						</div>
						<div class="yaoqiu">
							<h5><span class="shu"></span>工作职责</h5>
							<div class="jobContent">
								<p><{$job_info.due}></p>
							</div>
						</div>
						<div class="yaoqiu">
							<h5><span class="shu"></span>工作地点</h5>
							<div class="jobContent">
                                <p><{$job_info.work_place}></p>
							</div>
						</div>
						<div class="yaoqiu">
							<h5><span class="shu"></span>联系方式</h5>
							<div class="jobContent">
                                <p><{$job_info.companyInfo.phone}></p>
							</div>
						</div>
					</div>
					<div class="fr rightBox1">
						<div class="rightBox2">
							<h5>公司信息</h5>
							<div class="companyText">
								<div class="name"><a href="<{:url('Companys/index',['id'=>$job_info['companyInfo']['company_id']])}>"><{$job_info.companyInfo.company_name}></a></div>
								<div class="yewu">金融<span class="ge">|</span>网络<span class="ge">|</span>科技</div>
								<div class="contactUs">电话：<{$job_info.companyInfo.phone}></div>
							</div>
						</div>
						<div class="rightBox2" style="margin-top: 15px;">
							<h5>热门招聘</h5>
							<div class="companyText">
								<ul>
                                    {volist name="hot_jobs" id="v"}
									<li>
										<div class="jobListName"><a href="<{:url('Job/jobDetail',['job_id'=>$v['job_id']])}>"><{$v.job_name}></a></div>
										<div class="jobListCompanyName"><a href="<{:url('Companys/index',['id'=>$job_info['companyInfo']['company_id']])}>"><{$job_info.companyInfo.company_name}></a></div>
									</li>
                                    {/volist}
								</ul>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
{/block}