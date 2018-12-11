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
                    <p>人才库（Talent pool ），即企业(或者团体)储备各类人才的场所，也有“人才池”之说。因此，人才库是展示企业(团体)员工各种能力的“人才池”，现代企业中，每一位员工经过各项能力评估后，进入人才库管理，并按技术序列、职衔等级排序。企业(团体)有规律、周期性地对各类人才进行能力评估，确定其职衔等级。人才库也是企业(团体)组建团队、承接任务、选拔角色时的重要的人才源头。</p>
                    <p>人才库（Talent pool ），即企业(或者团体)储备各类人才的场所，也有“人才池”之说。因此，人才库是展示企业(团体)员工各种能力的“人才池”，现代企业中，每一位员工经过各项能力评估后，进入人才库管理，并按技术序列、职衔等级排序。企业(团体)有规律、周期性地对各类人才进行能力评估，确定其职衔等级。人才库也是企业(团体)组建团队、承接任务、选拔角色时的重要的人才源头。</p>
                    <p>人才库（Talent pool ），即企业(或者团体)储备各类人才的场所，也有“人才池”之说。因此，人才库是展示企业(团体)员工各种能力的“人才池”，现代企业中，每一位员工经过各项能力评估后，进入人才库管理，并按技术序列、职衔等级排序。企业(团体)有规律、周期性地对各类人才进行能力评估，确定其职衔等级。人才库也是企业(团体)组建团队、承接任务、选拔角色时的重要的人才源头。</p>
                    <p>人才库（Talent pool ），即企业(或者团体)储备各类人才的场所，也有“人才池”之说。因此，人才库是展示企业(团体)员工各种能力的“人才池”，现代企业中，每一位员工经过各项能力评估后，进入人才库管理，并按技术序列、职衔等级排序。企业(团体)有规律、周期性地对各类人才进行能力评估，确定其职衔等级。人才库也是企业(团体)组建团队、承接任务、选拔角色时的重要的人才源头。</p>
                    <p>人才库（Talent pool ），即企业(或者团体)储备各类人才的场所，也有“人才池”之说。因此，人才库是展示企业(团体)员工各种能力的“人才池”，现代企业中，每一位员工经过各项能力评估后，进入人才库管理，并按技术序列、职衔等级排序。企业(团体)有规律、周期性地对各类人才进行能力评估，确定其职衔等级。人才库也是企业(团体)组建团队、承接任务、选拔角色时的重要的人才源头。</p>
                    <p>人才库（Talent pool ），即企业(或者团体)储备各类人才的场所，也有“人才池”之说。因此，人才库是展示企业(团体)员工各种能力的“人才池”，现代企业中，每一位员工经过各项能力评估后，进入人才库管理，并按技术序列、职衔等级排序。企业(团体)有规律、周期性地对各类人才进行能力评估，确定其职衔等级。人才库也是企业(团体)组建团队、承接任务、选拔角色时的重要的人才源头。</p>
                    <p>人才库（Talent pool ），即企业(或者团体)储备各类人才的场所，也有“人才池”之说。因此，人才库是展示企业(团体)员工各种能力的“人才池”，现代企业中，每一位员工经过各项能力评估后，进入人才库管理，并按技术序列、职衔等级排序。企业(团体)有规律、周期性地对各类人才进行能力评估，确定其职衔等级。人才库也是企业(团体)组建团队、承接任务、选拔角色时的重要的人才源头。</p>
                    <p>人才库（Talent pool ），即企业(或者团体)储备各类人才的场所，也有“人才池”之说。因此，人才库是展示企业(团体)员工各种能力的“人才池”，现代企业中，每一位员工经过各项能力评估后，进入人才库管理，并按技术序列、职衔等级排序。企业(团体)有规律、周期性地对各类人才进行能力评估，确定其职衔等级。人才库也是企业(团体)组建团队、承接任务、选拔角色时的重要的人才源头。</p>
                </div>
            </div>
            <div class="rightBox fr talentTextRight">
                <div class="one">
                    <h4 class="huangTit">人才库相关</h4>
                    <div class="rightCon">
                        <a href="<{:url('Talent/index',['type'=>'talent_introduction'])}>"><img src="<{$img}>/talent01.png"/></a>
                        <a href="<{:url('Talent/index',['type'=>'storage_standard'])}>"><img src="<{$img}>/talent02.png"/></a>
                        <a href="<{:url('Talent/index',['type'=>'storage_process'])}>"><img src="<{$img}>/talent03.png"/></a>
                        <a href="<{:url('Reg/perReg')}>"><img src="<{$img}>/talent04.png"/></a>
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

