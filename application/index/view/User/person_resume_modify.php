{extend name="user/base" /}
{block name="tdk"}
<title>简历修改</title>
{/block}
{block name="content"}
    <div class="fr rightBox jianliXiu">
        <div class="rightWrap">
            <h6>修改简历</h6>
            <div class="jibenCon">
                <div class="jibenTit">基本信息</div>
                <div class="tableCon">
                    <p>
                        <label>姓名：</label>
                        <input name="name" value="<{$userInfo.info.name}>" type="text" />
                    </p>
                    <p>
                        <label>性别：</label>
                        <input name="sex" type="radio" value="" class="radios" />男
                        <input name="sex" type="radio" value="" class="radios" />女
                    </p>
                    <p>
                        <label>年龄：</label>
                        <input name="age" value="<{$userInfo.info.age}>" type="text" />
                    </p>
                    <p>
                        <label>籍贯：</label>
                        <input name="native_place" value="<{$userInfo.info.native_place}>" type="text" />
                    </p>
                    <p>
                        <label>民族：</label>
                        <select>
                          <option value ="volvo">汉</option>
                          <option value ="saab">其他民族</option>
                        </select>
                    </p>
                    <p>
                        <label>婚姻状况：</label>
                        <select>
                          <option value ="volvo">已婚</option>
                          <option value ="saab">未婚</option>
                        </select>
                    </p>
                    <p>
                        <label>毕业院校：</label>
                        <input name="college" value="<{$userInfo.info.college}>" type="text" />
                    </p>
                    <p>
                        <label>学历：</label>
                        <select>
                          <option value ="volvo">初中</option>
                          <option value ="volvo">高中</option>
                          <option value ="volvo">大专</option>
                          <option value ="saab">本科</option>
                        </select>
                    </p>
                    <p>
                        <label>所学专业：</label>
                        <input name="major" value="<{$userInfo.info.major}>"  type="text" />
                    </p>
                    <p>
                        <label>手机号：</label>
                        <input name="phone" value="<{$userInfo.info.phone}>"  type="text" />
                    </p>
                    <p>
                        <label>出生年月：</label>
                        <input name="birthday" value="<{$userInfo.info.birthday|date='Y-m-d',###}>"  type="text" />
                    </p>
                    <p>
                        <label>电子邮箱：</label>
                        <input name="email" value="<{$userInfo.info.email}>"  type="text" />
                    </p>
                    <p>
                        <label>联系地址：</label>
                        <input name="address" value="<{$userInfo.info.address}>"  type="text" />
                    </p>

                </div>
                <div class="jibenTit">求职意向</div>
                <div class="tableCon">
                    <p>
                        <label>工作职位：</label>
                        <input name="intentional_position" value="<{$userInfo.info.intentional_position}>"  type="text" />
                    </p>
                    <p>
                        <label>期望薪资：</label>
                        <input name="salary" value="<{$userInfo.info.salary}>"  type="text" />
                    </p>
                </div>
                <div class="jibenTit">工作经验</div>
                <div class="tableCon">
                    <p>
                        <label >工作经验：</label>
                        <textarea name="work_exprience" rows="5" cols="60" style="vertical-align:top;"><{$userInfo.info.work_exprience}></textarea>
                    </p>
                </div>
                <div class="jibenTit">项目经验</div>
                <div class="tableCon">
                    <p>
                        <label >项目经验：</label>
                        <textarea name="project_exprience" rows="5" cols="60" style="vertical-align:top;"><{$userInfo.info.project_exprience}></textarea>
                    </p>
                </div>
                <div class="jibenTit">个人评价</div>
                <div class="tableCon">
                    <p>
                        <label >个人评价：</label>
                        <textarea name="evaluate" rows="5" cols="60" style="vertical-align:top;"><{$userInfo.info.evaluate}></textarea>
                    </p>
                </div>
                <div class="submitBoxCenter">
                    <a href="personalSucess.html">提交</a>
                </div>
            </div>
        </div>

    </div>
{/block}
