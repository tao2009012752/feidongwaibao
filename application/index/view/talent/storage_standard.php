{extend name="index/base" /}
{block name="tdk"}
<title>服务外包人才信息综合服务平台</title>
{/block}
{block name="content"}
<!--入库标准-->
<div class="talentDetail contant">
    <div class="talentDetailBox">
        <div class="erjiTit">
            <span class="rightnow">当前位置：<a href="#">入库标准</a></span>
        </div>
        <div class="talentDetailCon">
            <div class="leftBox fl">
                <h4 class="huangTit">入库标准</h4>
                <div class="talentText">
                    <p>以核心人才任职资格标准为基础，结合其培养与储备性选拔的要求，从任职资格中选择适合甄选鉴别的要项，并根据核心人才特点，适当增加反映核心人才更深层素质的考察要项，明确核心人才的入库选拔标准。</p>
                </div>
            </div>
            <div class="rightBox fr talentTextRight">
                <div class="one">
                    <h4 class="huangTit">人才库相关</h4>
                    <div class="rightCon">
                        <a href="<{:url('/index/Talent/talent_model',['type'=>'talent_introduction'])}>"><img src="<{$img}>/talent01.png"/></a>
                        <a href="<{:url('/index/Talent/talent_model',['type'=>'storage_standard'])}>"><img src="<{$img}>/talent02.png"/></a>
                        <a href="<{:url('/index/Talent/talent_model',['type'=>'storage_process'])}>"><img src="<{$img}>/talent03.png"/></a>
                        <a href="<{:url('Reg/perReg')}>"><img src="<{$img}>/talent04.png"/></a>
                    </div>
                </div>
                <div class="two">
                    <h4 class="huangTit">最新人才</h4>
                    <div class="rightCon">
                        <ul>
                            {volist name="resumeInfo" id="v"}
                            <li>
                                <div><a href="<{:url('/index/Talent/get_resume_info',['userinfo_id'=>$v.userinfo_id])}>"><{$v.name}></a><span class="time"><{$v.update_time}></span></div>
                                <div><span><{$v.degree}></span><span class="ge">|</span><span><{$v.working_years}>年</span><span class="ge">|</span><span>意向：<{$v.intentional_position}></span></div>
                            </li>
                            {/volist}
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
{/block}

