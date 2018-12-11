{extend name="index/base" /}
{block name="tdk"}
	<title>专家详情-服务外包人才信息综合服务平台</title>
{/block}
{block name="content"}
		<!--新闻列表-->
		<div class="newsList contant pageJs">
			<div class="newsListBox">
				<div class="erjiTit">
                                    <span class="rightnow">当前位置：<a href="<{:url('Zj/index')}>">专家平台</a>>详情</span>
				</div>
				<div class="fr rightBox trainDetail">
					<div class="newsDetailBox">
						<h3><{$detail.name}></h3>
						<h4><span class="spanLine">来源：<{$detail.source}></span><span  class="spanLine">发布时间:<{$detail.add_time|date="Y-m-d",###}></span></h4>
						<div class="zhuanjiaBox">
							<div class="zhuanImg">
                                                            <img src="<{$detail.pic}>"/>
							</div>
							
                                                    <div>
                                                        <{$detail.info}>
                                                    </div>
						</div>
						
					</div>
				
					
				</div>
			</div>
			
		</div>
		<!--footer-->
{/block}