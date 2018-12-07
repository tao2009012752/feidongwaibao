{extend name="index/base" /}
{block name="tdk"}
<title>服务外包人才信息综合服务平台</title>
{/block}
{block name="content"}
    <!--个人简历-->
    <div class="resumeBox contant">
        <div class="refumeCon">
            <div class="xinxiBox">
                <h5><img src="<{$img}>/jianBg.png"/></h5>
                <div class="tableBox">
                    <table border="1" cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td width="12%" rowspan="5" class="blueBg">基本信息</td>
                            <td width="12%" class="blueBg">姓名</td>
                            <td width="12%"><{$userInfo.name}></td>
                            <td width="12%" class="blueBg">性别</td>
                            <td width="12%"><{$userInfo.sex}></td>
                            <td width="12%" class="blueBg">年龄</td>
                            <td width="12%"><{$userInfo.age}></td>
                            <td width="14%" rowspan="4">
                                <img src="<{$userInfo.pic}>" class="jianliImg"/>
                            </td>
                        </tr>
                        <tr>
                            <td width="12%" class="blueBg">籍贯</td>
                            <td width="12%"><{$userInfo.native_place}></td>
                            <td width="12%" class="blueBg">民族</td>
                            <td width="12%"><{$userInfo.nationality}></td>
                            <td width="12%" class="blueBg">婚姻状况</td>
                            <td width="12%"><{$userInfo.marital_status}></td>
                        </tr>
                        <tr>
                            <td width="12%" class="blueBg">毕业院校</td>
                            <td width="12%"><{$userInfo.college}></td>
                            <td width="12%" class="blueBg">学历</td>
                            <td width="12%"><{$userInfo.degree}></td>
                            <td width="12%" class="blueBg">所学专业</td>
                            <td width="12%"><{$userInfo.major}></td>
                        </tr>
                        <tr>
                            <td width="12%" class="blueBg">手机</td>
                            <td width="12%"><{$userInfo.phone}></td>
                            <td width="12%" class="blueBg">出生年月</td>
                            <td width="12%"><{$userInfo.birthday}></td>
                            <td width="12%" class="blueBg">电子邮箱</td>
                            <td width="12%"><{$userInfo.email}></td>
                        </tr>
                        <tr>
                            <td width="12%" class="blueBg">联系地址</td>
                            <td colspan="6"><{$userInfo.address}></td>
                        </tr>
                        <tr>
                            <td width="12%" rowspan="2" class="blueBg">求职意向</td>
                            <td colspan="4" class="blueBg">工作职位</td>
                            <td colspan="3" class="blueBg">期望薪资</td>
                        </tr>
                        <tr>
                            <td colspan="4"><{$userInfo.intentional_position}></td>
                            <td colspan="3"><{$userInfo.salary}></td>
                        </tr>
                        <tr>
                            <td width="12%" class="blueBg">工作经验</td>
                            <td colspan="7">
                                <div><{$userInfo.work_exprience}></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </td>
                        </tr>
                        <tr>
                            <td width="12%" class="blueBg">项目经验</td>
                            <td colspan="7">
                                <div><{$userInfo.project_exprience}></div>
                                <div>项目经验1</div>
                                <div>项目经验1</div>
                                <div>项目经验1</div>
                            </td>
                        </tr>
                        <tr>
                            <td width="12%" class="blueBg">个人评价</td>
                            <td colspan="7">
                                <div><{$userInfo.evaluate}></div>
                                <div>个人评价1</div>
                                <div>个人评价1</div>
                                <div>个人评价1</div>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>

        </div>
    </div>
{/block}