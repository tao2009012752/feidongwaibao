<div class="erjiTit">
	<span class="rightnow">当前位置：<a href="<{:url('newslist',['cate'=>$catedata['news_cate_id']])}>"><{$catedata.cate_name}></a></span>
</div>
<div class="fl leftBox">
	<ul class="titBoxs">
		{volist name="lmlist" id="v"}
		<li data="<{$v.cate_name}>"><a href="<{:url('newslist',['cate'=>$v['news_cate_id']])}>"><{$v.cate_name}><span class="fr rightArrow">></span></a></li>
		{/volist}
	</ul>
	<div class="hotNews">
		<div class="titleEx">
			<span>热点新闻</span>
		</div>
		<div class="hotBox">
			<ul>
				{volist name="rdlist" id="v"}
				<li><a href="<{:url('Index/listdetail',['id'=>$v['news_id']])}>"><{$v.title}></a></li>
				{/volist}
			</ul>
		</div>
	</div>
	<div class="hotCons">
		<div><a href="<{:url('newsList')}>"><img src="<{$img}>/hotimg1.png"/></a></div>
		<div class="aboutLink"><a href="<{:url('about')}>"><img src="<{$img}>/hotimg2.png"/></a></div>
	</div>
</div>