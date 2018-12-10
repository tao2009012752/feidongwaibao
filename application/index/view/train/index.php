{extend name="index/base" /}
{block name="tdk"}
<title>培训信息</title>
{/block}
{block name="content"}
		<!--新闻列表-->
		<div class="newsList contant pageJs">
			<div class="newsListBox">
				<div class="erjiTit">
					<span class="rightnow">当前位置：<a href="#">培训信息</a></span>
				</div>
				
				<div class="fl rightBox">
					<div class="titleEx">
						<span>培训信息</span>
					</div>
					<ul class="listBox">
                                                {volist name="list" id="v"}
						<li><a href="<{:url('Newsinfo/listdetail',['id'=>$v['news_id']])}>"><{$v.title}></a><span class="fr date"><{$v.add_time|date='Y-m-d',###}></span></li>
                                                {/volist}
					</ul>
					<!--分页-->
					<div class="pageList ">
						<div class="box">
							<div id="pagination3" class="page fl"></div>
						</div>
					</div>
				</div>
				<div class="fr leftBox ">
					<ul>
						<li><a href="<{:url('Train/ncsoin')}>"><img src="<{$img}>/ncso01.png"/></a></li>
						<li><a href="<{:url('Train/ncsoke')}>"><img src="<{$img}>/ncso02.png"/></a></li>
						<li><a href="<{:url('Train/ncsozheng')}>"><img src="<{$img}>/ncso03.png"/></a></li>
						<li><a href="<{:url('Train/ncsoyou')}>"><img src="<{$img}>/ncso04.png"/></a></li>
						<li><a href="<{:url('Train/ncsohe')}>"><img src="<{$img}>/ncso05.png"/></a></li>
						<li><a href="<{:url('Train/ncsofu')}>"><img src="<{$img}>/ncso06.png"/></a></li>
					</ul>
					<div class="hotCons">
                                            <div><a href="<{:url('Newsinfo/index',['cate'=>22])}>"><img src="<{$img}>/hotpei.jpg"/></a></div>
					</div>
				</div>
			</div>
			
		</div>
{/block}
