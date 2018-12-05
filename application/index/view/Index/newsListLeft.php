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
				<li><a href="<{:url('Index/listdetail',['id'=>$v['news_id']],'html',true)}>"><{$v.title}></a></li>
				{/volist}
			</ul>
		</div>
	</div>
	<div class="hotCons">
		<div><a href="<{:url('newsList','','html',true)}>"><img src="<{$img}>/hotimg1.png"/></a></div>
		<div class="aboutLink"><a href="<{:url('about','','html',true)}>"><img src="<{$img}>/hotimg2.png"/></a></div>
	</div>
</div>