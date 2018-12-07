{extend name="index/base" /}
{block name="tdk"}
<title>新闻列表</title>
{/block}
{block name="content"}
<!--新闻列表-->
<div class="newsList contant pageJs">
	<div class="newsListBox">

		<!-- 左侧导航 -->
		{include file='Newsinfo/left'/}
		<!-- 左侧导航结束 -->

		<!-- 内容 -->
		<div class="fr rightBox">
			<div class="newsDetailBox">
				<h3><{$newsdata.title}></h3>
				<h4><span class="spanLine">来源：<{$newsdata.source}></span><span  class="spanLine">发布时间:<{$newsdata.add_time|date="Y-m-d",###}></span></h4>
				<div class="neirong">
					<{$newsdata.content}>
				</div>

				<div class="next">
					<div>
						<a href="
						{if condition="$prenext['pre']"}
						<{:url('Newsinfo/listdetail',['id'=>$prenext['pre']['news_id']],'html',true)}>
						{else /}
						javascript:void(0)
						{/if}">上一篇：{if condition="$prenext['pre']"}<{$prenext['pre']['title']}>{else /}没有了{/if}</a>
					</div>
					<div>
						<a href="
						{if condition="$prenext['next']"}
						<{:url('Newsinfo/listdetail',['id'=>$prenext['next']['news_id']],'html',true)}>
						{else /}
						javascript:void(0)
						{/if}">下一篇：{if condition="$prenext['next']"}<{$prenext['next']['title']}>{else /}没有了{/if}</a>
					</div>
				</div>
			</div>
		</div>
		<!-- 内容结束 -->

	</div>
</div>
<script>
	$(function(){
		News.Menu('<{$catedata.cate_name}>');//左侧导航特效切换
	})
</script>
{/block}