{extend name="index/base" /}
{block name="tdk"}
<title>新闻列表</title>
{/block}
{block name="content"}
<!--新闻列表-->
<div class="newsList contant pageJs">
	<div class="newsListBox">
		<div class="erjiTit">
			<span class="rightnow">当前位置：<a href="#">行业资讯</a></span>
		</div>
		<div class="fl leftBox">
			<ul class="titBoxs">
				<li><a href="<{:url('newslist','','',true)}>" class="erjiListAction">通知公告<span class="fr rightArrow">></span></a></li>
				<li><a href="<{:url('newslist',['cate'=>3],'',true)}>">行业资讯<span class="fr rightArrow">></span></a></li>
				<li><a href="<{:url('newslist',['cate'=>4],'',true)}>">政策法规<span class="fr rightArrow">></span></a></li>
				<li><a href="<{:url('newslist',['cate'=>6],'',true)}>">考试信息<span class="fr rightArrow">></span></a></li>
				<li><a href="<{:url('newslist',['cate'=>5],'',true)}>">培训信息<span class="fr rightArrow">></span></a></li>
			</ul>
			<div class="hotNews">
				<div class="titleEx">
					<span>热点新闻</span>
				</div>
				<div class="hotBox">
					<ul>
						<li><a href="listDetail.html">《事业单位公开招聘分类考试公共科目笔试考试大纲解读》出版</a></li>
						<li><a href="#">公安部直属单位2018年度统一公开招考录用人民警察及工作人员公告</a></li>
						<li><a href="#">2017年新疆生产建设兵团面向内地招录执法勤务类人民警察公告</a></li>
						<li><a href="#">《事业单位公开招聘分类考试公共科目笔试考试大纲解读》出版</a></li>
						<li><a href="#">《事业单位公开招聘分类考试公共科目笔试考试大纲解读》出版</a></li>
						<li><a href="#">《事业单位公开招聘分类考试公共科目笔试考试大纲解读》出版</a></li>
						<li><a href="#">公安部直属单位2018年度统一公开招考录用人民警察及工作人员公告</a></li>
						<li><a href="#">2017年新疆生产建设兵团面向内地招录执法勤务类人民警察公告</a></li>
						<li><a href="#">《事业单位公开招聘分类考试公共科目笔试考试大纲解读》出版</a></li>
						<li><a href="#">《事业单位公开招聘分类考试公共科目笔试考试大纲解读》出版</a></li>
					</ul>
				</div>
			</div>
			<div class="hotCons">
				<div><a href="hotList.html"><img src="<{$img}>/hotimg1.png"/></a></div>
				<div class="aboutLink"><a href="#"><img src="<{$img}>/hotimg2.png"/></a></div>
			</div>
		</div>
		<div class="fr rightBox">
			<div class="titleEx">
				<span>行业资讯</span>
			</div>
			<ul class="listBox">
				<li><a href="listDetail.html">深入学习贯彻习近平总书记重要讲话精神 全力推动民营经济实现更大发展深入学习贯彻习近平总书记重要讲话精神 全力推动民营经济实现更大发展</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">我市召开全市危险化学品安全生产专题视频会议</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">海峡两岸（合肥）健康养老产业合作论坛开幕</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">宋国权主持召开市委理论学习中心组学习会议</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">深入学习贯彻习近平总书记重要讲话精神 全力推动民营经济实现更大发展</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">深入学习贯彻习近平总书记重要讲话精神 全力推动民营经济实现更大发展深入学习贯彻习近平总书记重要讲话精神 全力推动民营经济实现更大发展</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">我市召开全市危险化学品安全生产专题视频会议</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">海峡两岸（合肥）健康养老产业合作论坛开幕</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">宋国权主持召开市委理论学习中心组学习会议</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">深入学习贯彻习近平总书记重要讲话精神 全力推动民营经济实现更大发展</a><span class="fr date">2018-12-03</span></li><li><a href="#">深入学习贯彻习近平总书记重要讲话精神 全力推动民营经济实现更大发展深入学习贯彻习近平总书记重要讲话精神 全力推动民营经济实现更大发展</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">我市召开全市危险化学品安全生产专题视频会议</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">海峡两岸（合肥）健康养老产业合作论坛开幕</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">宋国权主持召开市委理论学习中心组学习会议</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">深入学习贯彻习近平总书记重要讲话精神 全力推动民营经济实现更大发展</a><span class="fr date">2018-12-03</span></li><li><a href="#">深入学习贯彻习近平总书记重要讲话精神 全力推动民营经济实现更大发展深入学习贯彻习近平总书记重要讲话精神 全力推动民营经济实现更大发展</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">我市召开全市危险化学品安全生产专题视频会议</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">海峡两岸（合肥）健康养老产业合作论坛开幕</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">宋国权主持召开市委理论学习中心组学习会议</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">深入学习贯彻习近平总书记重要讲话精神 全力推动民营经济实现更大发展</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">深入学习贯彻习近平总书记重要讲话精神 全力推动民营经济实现更大发展深入学习贯彻习近平总书记重要讲话精神 全力推动民营经济实现更大发展</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">我市召开全市危险化学品安全生产专题视频会议</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">海峡两岸（合肥）健康养老产业合作论坛开幕</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">宋国权主持召开市委理论学习中心组学习会议</a><span class="fr date">2018-12-03</span></li>
				<li><a href="#">深入学习贯彻习近平总书记重要讲话精神 全力推动民营经济实现更大发展</a><span class="fr date">2018-12-03</span></li>
			</ul>
			<!--分页-->
			<div class="pageList">
				<div class="box">
					<div id="pagination3" class="page fl"></div>
				</div>
			</div>
		</div>
	</div>

</div>
{/block}