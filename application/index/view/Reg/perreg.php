{extend name="index/base" /}
{block name="tdk"}
	<title>服务外包人才信息综合服务平台</title>
{/block}
{block name="content"}
<!--注册-->
<div class="registerBox  contant">
	<div class="registerCon">
		<div class="top">
			<img src="<{$img}>/registerStep.png"/>
		</div>
		<div class="center">
			请选择注册类型
		</div>
		<div class="bottom">
			<a class="fl registerCompany" href="#">
				<div class="title"><img src="<{$img}>/companyIcon.png" alt="" />企业</div>
				<div class="registerComText">
					<p>1、多元化企业推广模式，有效提高企业知名度；</p>
					<p>1、提供丰富人才资源，免费发布最新招聘信息；</p>
				</div>
			</a>
			<a class="fr registerPeople" href="#">
				<div class="title"><img src="<{$img}>/gerenIcon.png" alt="" />个人</div>
				<div class="registerComText">
					<p>1、提供大量专业对口职位快速检索，及时获取最新培训、招聘信息</p>
					<p>2、支持在线应聘，发送简历到达对口企业；</p>
				</div>
			</a>
		</div>
	</div>
</div>
{/block}
