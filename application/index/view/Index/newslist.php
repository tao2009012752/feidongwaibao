{extend name="index/base" /}
{block name="tdk"}
<title>新闻列表</title>
{/block}
{block name="content"}
<!--新闻列表-->
<div class="newsList contant pageJs">
	<div class="newsListBox">
		<div class="erjiTit">
			<span class="rightnow">当前位置：<a href="<{:url('newslist',['cate'=>$catedata['news_cate_id']],'html',true)}>"><{$catedata.cate_name}></a></span>
		</div>
		<div class="fl leftBox">
			<ul class="titBoxs">
				<li><a href="<{:url('newslist','','',true)}>">通知公告<span class="fr rightArrow">></span></a></li>
				<li><a href="<{:url('newslist',['cate'=>3],'html',true)}>">行业资讯<span class="fr rightArrow">></span></a></li>
				<li><a href="<{:url('newslist',['cate'=>4],'html',true)}>">政策法规<span class="fr rightArrow">></span></a></li>
				<li><a href="<{:url('newslist',['cate'=>6],'html',true)}>">考试信息<span class="fr rightArrow">></span></a></li>
				<li><a href="<{:url('newslist',['cate'=>5],'html',true)}>">培训信息<span class="fr rightArrow">></span></a></li>
			</ul>
			<div class="hotNews">
				<div class="titleEx">
					<span>热点新闻</span>
				</div>
				<div class="hotBox">
					<ul>
						{volist name="rdlist" id="v"}
						<li><a href="<{v.news_id}>"><{v.title}></a></li>
						{/volist}
					</ul>
				</div>
			</div>
			<div class="hotCons">
				<div><a href="<{:url('newsList','','html',true)}>"><img src="<{$img}>/hotimg1.png"/></a></div>
				<div class="aboutLink"><a href="<{:url('about','','html',true)}>"><img src="<{$img}>/hotimg2.png"/></a></div>
			</div>
		</div>
		<div class="fr rightBox">
			<div class="titleEx">
				<span><{$catedata.cate_name}></span>
			</div>
			<ul class="listBox">
				{volist name = "pagelist" id="v"}
				<li>
					<a href="<{$v.news_id}>"><{$v.title}></a>
					<span class="fr date"><{$v.add_time|date="Y-m-d",###}></span>
				</li>
				{/volist}
			</ul>
			<!--分页-->
			<div class="pageList">
				<{$pagelist->render()}>
			</div>
		</div>
	</div>
</div>
<script>
	$(function(){
		News.Menu();//左侧导航特效切换
	})
</script>
{/block}