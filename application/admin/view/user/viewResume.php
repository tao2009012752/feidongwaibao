{include file="public:header" /}
<style>

    body table, table {
        border: 1px solid silver;
        border-collapse: collapse;
        word-break: break-word;
    }

    body,td,th {
        font-size: 16px;
        color: #000;
    }

    body p {
        margin: 10px auto;
        text-indent: 0;
    }

    tr {
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
    }

    td {
        border: 1px solid silver;
        border-collapse: collapse;
        padding: 8px 14px;
    }

    tr td {
        text-align: center;
    }
</style>

<body>
<center>
    <p><b>个人简历</b></p>
    <table cellpadding="0" cellspacing="0" border="1">
        <td rowspan="6">基本信息</td>
        <tr>
            <td width="64" height="33">姓名</td>
            <td width="109"><{$detail.name}></td>
            <td width="73">性别</td>
            <td width="109"><{$detail.sex}></td>
            <td>年龄</td>
            <td><{$detail.age}></td>
            <td width="154" rowspan="4"><p ><img src="<{$detail.pic}>" width="154" height="203" /></p></td>
        </tr>
        <tr>
            <td height="31">籍贯</td>
            <td><{$detail.native_place}></td>
            <td>民族</td>
            <td><{$detail.nationality}></td>
            <td>婚姻状况</td>
            <td><{$detail.marital_status}></td>
        </tr>
        <tr>
            <td height="31">毕业院校</td>
            <td><{$detail.college}></td>
            <td>学历</td>
            <td><{$detail.degree}></td>
            <td>所学专业</td>
            <td><{$detail.major}></td>
        </tr>
        <tr>
            <td height="31">手机</td>
            <td><{$detail.phone}></td>
            <td>出生年月</td>
            <td><{$detail.birthday|date="Y-m-d",###}></td>
            <td>电子邮箱</td>
            <td><{$detail.email}></td>
        </tr>
        <tr>
            <td height="31">联系地址</td>
            <td colspan="6"><{$detail.address}></td>
        </tr>
        <tr>
            <td rowspan="2">求职意向</td>
            <td colspan="4">工作职位</td>
            <td colspan="3">期望薪资</p></td>
        </tr>
        <tr height="51">
            <td colspan="4"><{$detail.skill}></td>
            <td colspan="3"><{$detail.salary}></td>
        </tr>


        <tr height="120">
            <td>工作经验</td>
            <td colspan="7"><{$detail.work_exprience}></td>
        </tr>
        <tr height="120">
            <td>项目经验</td>
            <td colspan="7"><{$detail.project_exprience}></td>
        </tr>
        <tr height="120">
            <td>个人评价</td>
            <td colspan="7"><{$detail.evaluate}></td>
        </tr>
    </table>
    <p>&nbsp;</p>

</center>


</body>
{include file="public:footer" /}
