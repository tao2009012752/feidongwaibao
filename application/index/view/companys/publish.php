{extend name="Companys/base" /}
{block name="right"}
<div class="fr rightBox">
    <div class="rightWrap comXiu jianliXiu">
        <h6>发布职位</h6>
        <div class="jibenCon">
            <div class="jibenTit">职位资料</div>
            <div class="tableCon">
                <p>
                    <label>职位名：</label>
                    <input type="text" name="name" value=""/>
                </p>
                <p>
                    <label>人数：</label>
                    <input type="text" name="num" value=""/>
                </p>
                <p>
                    <label>学历：</label>
                    <select name="degree">
                        <option value ="初中">初中</option>
                        <option value ="高中">高中</option>
                        <option value ="大专">大专</option>
                        <option value ="本科">本科</option>
                    </select>
                </p>
                <p>
                    <label>地区：</label>
                    <input type="text" name="location" value=""/>
                </p>
                <p>
                    <label>工资：</label>
                    <input type="text" name="minsalary" style="width: 100px" value=""/>-<input type="text" name="maxsalary" style="width: 100px" value=""/>
                </p>
                <p>
                    <label>工作地点：</label>
                    <input type="text" name="place" value=""/>
                </p>
                <!--p>
                    <label>联系方式：</label>
                    <input type="text"  value="user001"/>
                </p-->
                <div class="jibenTit">任职要求</div>
                <div class="tableCon">
                    <p>
                        <label >任职要求：</label>
                        <textarea name="require" rows="5" cols="60" style="vertical-align:top;"></textarea>
                    </p>
                </div>
                <div class="jibenTit">工作职责</div>
                <div class="tableCon">
                    <p>
                        <label >工作职责：</label>
                        <textarea name="due" rows="5" cols="60" style="vertical-align:top;"></textarea>
                    </p>
                </div>

            </div>
            <div class="submitBoxCenter">
                <a href="javascript:void(0)" class="sub">提交</a>
            </div>
        </div>
    </div>

</div>
<script>
    $(function(){
        Company.Publish();
    })
</script>
{/block}
