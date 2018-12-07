{include file="public:header" /}
<style>
    [type=number] {
        width:60px;
        border-radius: 4px;
        text-align: center;
        border:1px solid #ccc;
    }
</style>
<div class="main_box">
    <h2><span></span>招聘信息列表</h2>
    <div class="count">
        <div class="left">
            <!--<button type="button" class="btn btn_info" mini="show" data-url="<{:url('Recruitment/create')}>" /><i class="fa fa-plus"></i> 新增招聘 </button>-->
            <button type="button" class="btn btn_dsure" mini="deletesome" pk_name="job_id" data-url="<{:url('Recruitment/deleteSome')}>" data-title="确定删除这些招聘信息么"  /><i class="fa fa-trash-o"></i> 批量删除</button>
        </div>
        <div class="right">共搜出 <{$count}> 条数据</div>
        <div class="clear"></div>
    </div>
    <div class="cont_box">
        <table border="0" cellspacing="0" cellpadding="0" class="table" id="table_box">
            <thead>
            <tr>
                <th><input type="checkbox" id="checkall"></th>
                <th>ID</th>
                <th>招聘岗位</th>
                <th>企业名</th>
                <th>申请人</th>
                <th>性别</th>
                <th>学历</th>
                <th>经验（年）</th>
                <th>期望薪资（元）</th>
                <th width="268">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list_array as $v) {?>
                <tr >
                    <td><input type="checkbox" class="check" value="<{$v['job_id']}>"></td>
                    <td><{$v.apply_id}></td>
                    <td><{$v.job_name}></td>
                    <td><{$v.company_name}></td>
                    <td><{$v.name}></td>
                    <td><{$v.sex}></td>
                    <td><{$v.degree}></td>
                    <td><{$v.work_exprience}></td>
                    <td><{$v.salary}></td>
                    <td>
                        <a href="javascript:void(0);"
                           class="table_btn table_info detail_btn"
                           mini="show"
                           data-url="<{:url('Recruitment/viewDetail',['job_id' => $v['job_id']])}>"
                        >
                            <i class="fa fa-reorder"></i>
                            <span>查看详情</span>
                        </a>
                        <!--<a href="javascript:void(0);"
                           class="table_btn table_edit edit_btn"
                           mini="show"
                           data-url="<{:url('Recruitment/edit',['job_id' => $v['job_id']])}>"
                        >
                            <i class="fa fa-edit"></i>
                            <span>编辑</span>
                        </a>-->
                        <!--<a href="javascript:void(0);"
                           data-url="<{:url('Recruitment/delete')}>"
                           mini="del" pk_name="job_id"
                           data-id="<{$v.job_id}>"
                           data-title="确实删除该招聘么？"
                           class="table_btn table_del del_btn"
                        >
                            <i class="fa fa-trash"></i>
                            <span>删除</span>
                        </a>-->
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <{$list->render()}>
    </div>
</div>
{include file="public:footer" /}
