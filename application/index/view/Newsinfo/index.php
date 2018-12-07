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

        <!-- 列表 -->
        <div class="fr rightBox">
            <div class="titleEx">
                <span><{$catedata.cate_name}></span>
            </div>
            <ul class="listBox">
                {volist name = "pagelist" id="v"}
                <li>
                    <a href="<{:url('Newsinfo/listdetail',['id'=>$v['news_id']])}>"><{$v.title}></a>
                    <span class="fr date"><{$v.add_time|date="Y-m-d",###}></span>
                </li>
                {/volist}
            </ul>
            <!--分页-->
            <div class="pageList">
                <{$page}>
            </div>
        </div>
        <!-- 列表结束 -->
    </div>
</div>
<script>
    $(function () {
        News.Menu('<{$catedata.cate_name}>');//左侧导航特效切换
    })
</script>
{/block}