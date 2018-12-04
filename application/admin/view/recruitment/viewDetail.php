{include file="public:header" /}

<style>
    span{
        line-height: 36px;
    }
</style>
<div class="main_box">
    <h2>职位详情：</h2>
    <div class="cont_box">
        <ul class="addpro_box adduser_box">
            <li>
                <label>岗位名称：</label>
                <span><{$detail.job_name}></span>
            </li>
            <li>
                <label>招聘公司：</label>
                <span><{$detail.company_name}></span>
            </li>
            <li>
                <label>招聘人数：</label>
                <span><{$detail.need_num}>&nbsp;人</span>
            </li>
            <!--<li>
                <label>招聘人数：</label>
                <span><{$detail.job_name}></span>
            </li>-->
            <li>
                <label>学历要求：</label>
                <span><{$detail.degree}></span>
            </li>
            <li>
                <label>性别要求：</label>
                <span><{$detail.sex_value}></span>
            </li>
            <li>
                <label>薪资待遇：</label>
                <span><{$detail.salary}></span>
            </li>
            <li>
                <label>工作经验：</label>
                <span><{$detail.exprience}>年</span>
            </li>
            <li>
                <label>工作职责：</label>
                <textarea rows="6" cols="30" disabled><{$detail.due}></textarea>
            </li>
            <li>
                <label>任职要求：</label>
                <textarea rows="6" cols="30" disabled><{$detail.requirements}></textarea>
<!--                <span><{$detail.requirements}></span>-->
            </li>
            <li>
                <label>工作地点：</label>
                <span><{$detail.work_place}></span>
            </li>
        </ul>
    </div>
</div>
{include file="public:footer" /}
