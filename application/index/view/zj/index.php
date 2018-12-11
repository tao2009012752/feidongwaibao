{extend name="index/base" /}
{block name="tdk"}
	<title>专家平台-服务外包人才信息综合服务平台</title>
{/block}
{block name="content"}
		<!--新闻列表-->
		<div class="newsList contant pageJs">
			<div class="newsListBox">
				<div class="erjiTit">
					<span class="rightnow">当前位置：<a href="#">专家平台</a></span>
				</div>
				<div class="fl leftBox">
					
					<div class="hotNews">
						<div class="titleEx">
							<span>热点新闻</span>
						</div>
						<div class="hotBox">
							<ul>
                                                                {volist name="rdlist" id="v"}
								<li><a href="<{:url('Newsinfo/listdetail',['id'=>$v['news_id']])}>"><{$v.title}></a></li>
								{/volist}
							</ul>
						</div>
					</div>
					
				</div>
				<div class="fr rightBox">
					<div class="titleEx">
						<span>专家平台</span>
					</div>
					<ul class="zhuanjiaUl">
                                                {volist name="zjlist" id="v"}
						<li>
                                                    <a href="<{:url('zj/zjDetail',['id'=>$v.zj_id])}>"><img src="<{$v.pic}>"/></a>
							<a href="<{:url('zj/zjDetail',['id'=>$v.zj_id])}>">
                                                            <{$v.name}>
							</a>
						</li>
                                                {/volist}
						
					</ul>
					<!--分页-->
					<div class="pageList ">
						<div class="box">
							<div id="pagination3" class="page fl"></div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<!--footer-->
{/block}
