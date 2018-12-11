{extend name="index/base" /}
{block name="tdk"}
<title>服务外包人才信息综合服务平台</title>
{/block}
{block name="content"}
<!--人才库简介-->
<div class="talentDetail contant">
    <div class="talentDetailBox">
        <div class="erjiTit">
            <span class="rightnow">当前位置：<a href="#">人才库简介</a></span>
        </div>
        <div class="talentDetailCon">
            <div class="leftBox fl">
                <h4 class="huangTit">人才库简介</h4>
                <div class="talentText">
                    <p>人才库（Talent pool ），即企业(或者团体)储备各类人才的场所，也有“人才池”之说。因此，人才库是展示企业(团体)员工各种能力的“人才池”，现代企业中，每一位员工经过各项能力评估后，进入人才库管理，并按技术序列、职衔等级排序。企业(团体)有规律、周期性地对各类人才进行能力评估，确定其职衔等级。人才库也是企业(团体)组建团队、承接任务、选拔角色时的重要的人才源头。</p>
                    <p>（1）公司员工的储备。本公司员工有的可以适应好几个岗位，当这此岗位空缺时，可以考虑内部培养、调动。</p>
                    <p>（2）面试应聘者储备。有些面试者因当时岗位招满而没录用的，可以与之沟通，将他录入人才库，当有更适合他的岗位时再与他联系，在录用他之前最好与他保持联系，一方面可以了解他的状况，另一方面还可以增加面试者对自己公司的良好印象。</p>
                    <p>（3）简历储备。可以就公司常招的一些岗位搜索一些简历储备起来，当有需要的时候再联系。</p>
                </div>
            </div>
            <div class="rightBox fr talentTextRight">
                <div class="one">
                    <h4 class="huangTit">人才库相关</h4>
                    <div class="rightCon">
                        <a href="<{:url('Talent/index',['type'=>'talent_introduction'])}>"><img src="<{$img}>/talent01.png"/></a>
                        <a href="<{:url('Talent/index',['type'=>'storage_standard'])}>"><img src="<{$img}>/talent02.png"/></a>
                        <a href="<{:url('Talent/index',['type'=>'storage_process'])}>"><img src="<{$img}>/talent03.png"/></a>
                        <a href="<{:url('/Reg/perReg')}>"><img src="<{$img}>/talent04.png"/></a>
                    </div>
                </div>
                <div class="two">
                    <h4 class="huangTit">最新人才</h4>
                    <div class="rightCon">
                        <ul>
                            {volist name="resumeInfo" id="v"}
                            <li>
                                <div><a href="#"><{$v.name}></a><span class="time"><{$v.update_time}></span></div>
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

