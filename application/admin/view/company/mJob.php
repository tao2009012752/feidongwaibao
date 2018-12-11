{include file="public:header" /}

<style>
    span{
        line-height: 36px;
    }
</style>
<div class="main_box">
    <h2>职位详情：</h2>
    <div class="cont_box">
        <form action="<{:url('Company/mJob',['company_id' => $company_id])}>" method="post" id="formdata">
        <ul class="addpro_box adduser_box">
            <li>
                <label>岗位名称：</label>
                <input type="text" placeholder="请输入职位名称" name="job_name" value="" />
            </li>
            <li>
                <label>需求人数：</label>
                <input type="number" placeholder="请输入需求人数（正整数）" name="need_num" value="" />
            </li>
            <li>
                <label>工作地址：</label>
                <input type="text" placeholder="请输入工作地址" name="work_place" value="" />
            </li>
            <li>
                <label>学历要求：</label>
                <input type="text" placeholder="请输入学历要求" name="degree" value="" />
            </li>
            <li>
                <label>性别要求：</label>
                <input type="radio" placeholder="" name="sex" value="1" style="display: inline-block;width: 20px;"/>男
                <br><input type="radio" placeholder="" name="sex" value="2" style="display: inline-block;width: 20px;"/>女
                <br><input type="radio" placeholder="" name="sex" value="3" style="display: inline-block;width: 20px;margin-left: 110px;"/>不限
            </li>
            <li>
                <label>薪资待遇：</label>
                <span><input type="number" placeholder="薪资低" name="min_salary" value="" />-<input type="number" placeholder="薪资高" name="max_salary" value="" /></span>
            </li>
            <li>
                <label>工作经验：</label>
                <input type="text" placeholder="工作经验" name="exprience" value="" />
            </li>
            <li>
                <label>工作职责：</label>
                <textarea rows="6" cols="30" placeholder="请输入工作职责" name='due'></textarea>
            </li>
            <li>
                <label>任职要求：</label>
                <textarea rows="6" cols="30" placeholder="请输入任职要求" name='requirements'></textarea>
            </li>
        </ul>
        <div class="probtn_box clearfix">
            <input type="submit" value="发布职位" class="btn blue_btn"/>
        </div>
        </form>
    </div>
</div>
{include file="public:footer" /}