{extend name="index/base" /}
{block name="tdk"}
	<title>职位详情-服务外包人才信息综合服务平台</title>
{/block}
{block name="content"}
		<!--招聘详细-->
		<div class="zhaoBox contant">
			<div class="zhaoCon">
				<div class="erjiTit">
                                    <span class="rightnow">当前位置：<a href="<{:url('job/index')}>">招聘列表</a> > 招聘信息</span>
				</div>
				<div class="zhaoDetailBox">
					<div class="fl leftBox1">
						<div class="top">
							<div class="fl">
								<div class="jobName"><{$detail.job_name}></div>
								<div class="companyName"><a href="<{:url('companys/index',['id'=>$detail.company_id])}>"><{$detail.company_name}></a></div>
								<div class="requireds"><{$detail.degree}><span class="ge">|</span><{$detail.need_num}>人<span class="ge">|</span><{$detail.work_place}></div>
								<!--<input type="button" name="" id="" value="投递简历" class="yingping"/>-->
                                                                <input data="<{$detail.job_id}>" class="yingping apply" type="button" value="投递简历" />
							</div>
							<div class="fr">
								<div class="xinzi"><{$detail.min_salary}>-<{$detail.max_salary}>元/月</div>
							</div>
						</div>
						<div class="yaoqiu">
							<h5><span class="shu"></span>任职要求</h5>
							<div class="jobContent">
								<p><{$detail.requirements}></p>
							</div>
						</div>
						<div class="yaoqiu">
							<h5><span class="shu"></span>工作地点</h5>
							<div class="jobContent">
								<p><{$detail.work_place}></p>
							</div>
						</div>
						<div class="yaoqiu">
							<h5><span class="shu"></span>联系方式</h5>
							<div class="jobContent">
								<p><{$detail.contact}></p>
								<p><{$detail.phone}></p>
							</div>
						</div>
					</div>
					<div class="fr rightBox1">
						<div class="rightBox2">
							<h5>公司信息</h5>
							<div class="companyText">
								<div class="name"><a href="<{:url('companys/index',['id'=>$detail.company_id])}>"><{$detail.company_name}></a></div>
								<div class="yewu"><{$detail.core_business}></div>
								<div class="contactUs">电话：<{$detail.phone}></div>
							</div>
						</div>
						<div class="rightBox2" style="margin-top: 15px;">
							<h5>最新招聘</h5>
							<div class="companyText">
								<ul>
                                                                        {volist name = "rencentJob" id="v"}
									<li>
                                                                                <div class="jobListName"><a href="<{:url('job/jobDetail',['id'=>$v.job_id])}>"><{$v.job_name}></a></div>
										<div class="jobListCompanyName"><a href="<{:url('companys/index',['id'=>$v.company_id])}>"><{$v.company_name}></a></div>
									</li>
                                                                        {/volist}
								</ul>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
                <script>
		$(function(){
			Job.Apply();
		})
	</script>
		
{/block}
