{extend name="Companys/base" /}
{block name="right"}
<div class="fr rightBox">
    <div class="rightWrap comXiu comShou">
        <h6>收到简历</h6>
        <ul class="shouUl">
            {volist name='list' id='v'}
            <li>
                <a href="<{:url('Talent/index',['userinfo_id'=>$v['userinfo_id']])}>" class="fl"><{$v.name}>|<{$v.degree}>|<{$v.age}></a>
                <span class="fr"><{$v.add_time|date="Y-m-d",###}></span>
            </li>
            {/volist}
        </ul>
    </div>
</div>
{/block}
