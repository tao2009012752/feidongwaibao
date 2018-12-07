{extend name="index/base" /}
{block name="tdk"}
	<title>服务外包人才信息综合服务平台</title>
{/block}
{block name="content"}
<!--招聘首页-->
<div class="zhaoBox contant">
	<div class="zhaoCon">
		<div class="erjiTit">
			<span class="rightnow">搜索结果（<{$num}>）：</span>
		</div>
		<div class="zhaoList search">
			<div class="zhaoListTit">
				<ul>
					<li class="search-title">标题</li>
					<li class="search-source">来源</li>
					<li class="search-time">时间</li>
				</ul>
			</div>
			<div class="zhaoJobList">
				<ul>
					{volist name="newlist" id="v" key="i"}
					<li {if condition="$i%2==1"} class="recruitLi" {/if}>
						<ul class="jobList">
							<li class="search-title"><a href="<{:url('Newsinfo/listDetail',['id'=>$v['id']])}>"><{$v.title}></a></li>
							<li class="search-source"><{$v.source}></li>
							<li class="search-time"><span><{$v.add_time|date="Y-m-d",###}></span></li>
						</ul>
					</li>
					{/volist}
				</ul>
			</div>
			<!--分页-->
			<div class="pageList pageJs">
				<{$page}>
			</div>
		</div>
	</div>
</div>
{/block}
