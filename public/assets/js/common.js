/**
 * 跳转
 */
$("[mini='show']").click(function()
{
    var href = $(this).attr("data-url");

    location.href=href;
})

/**
 * 弹出层，100%宽高
 */
$("[mini='iframe_show']").click(function()
{
    var that = $(this);
    layer.open({
        type: 2,
        title: that.attr('data-title'),
        shadeClose: true,
        shade: 0,
        area: ['100%', '100%'],
        content: that.attr('data-url') //iframe的url
    });
})

/**
 * 排序
 */
$("[mini='sort']").click(function(){
    var url = $(this).attr('data-url');
    var sort = [];

    $(".orderby").each(function(i){
        var tmpObj = {};
        var  pkName = $(this).attr("pk_name");
        tmpObj[pkName] = $(this).attr('pk');
        tmpObj['orderby'] = $(this).val()

        sort[i] = tmpObj;
    });

    $.post(url,{
        orderby:sort
    },function(data){
        if (data.code){
            layer.alert(data.msg,{icon:2,title:'提示'})
        } else {
            layer.msg('排序成功',{
                icon:1,
                time:2000,
            },function()
            {
                location.reload()
            })
        }
    },'json');
})

/**
 * 删除单个
 */
$("[mini='del']").click(function(){
    var that = $(this)
    layer.confirm($(this).attr('data-title'),function(index){
        $.post(that.attr('data-url'),{
            pk_name : that.attr('pk_name'),
            id:that.attr('data-id')
        },function(data){
            if (data.code){
                layer.msg(data.msg,{
                    icon:2,
                    time:2000,
                })
            }else{
                layer.msg('操作成功',{
                    icon:1,
                    time:2000,
                },function(){
                    location.reload()
                })
            }
        },'json')
    })
})

/**
 * 批量删除
 */
$("[mini='deletesome']").click(function(){
    var url = $(this).attr('data-url');
    var pk_name = $(this).attr('pk_name');
    var ids = []
    $(".check:checked").each(function(){
        ids.push($(this).val());
    });

    layer.confirm($(this).attr('data-title'),function(){
        $.post(url,{
            ids:ids,
            pk_name:pk_name
        },function(data){
            if (data.code){
                layer.msg(data.msg,{
                    icon:2,
                    time:2000,
                })
            }else{
                layer.msg('操作成功',{
                    icon:1,
                    time:2000,
                },function() {
                    location.reload()
                })
            }
        },'json')
    })
})

//全选
$('#checkall').click(function(){
    if($('#checkall').is(":checked")){
        $('.check').prop('checked',true)
    }else{
        $('.check').prop('checked',false)
    }
});

/**
 * 表单提交
 */
$("#formdata [type='submit']").click(function(e)
{
    e.preventDefault();
    var formdata = new FormData($("#formdata")[0])

    $.ajax({
        url:$("#formdata").attr("action"),
        data:formdata,
        type:'POST',
        dataType:'json',
        processData: false,  // 不处理数据
        contentType: false,   // 不设置内容类型
        success:function(res) {
            if (res.code) {
                layer.alert(res.msg, {icon:2, title:'提示'});
            }
            else {
                layer.msg(res.msg, {icon:1}, function()
                {
                    location.reload();
                })
            }
        }
    })
})

/**
 * 上传图片
 */
$("#upimg").change(function() {
    var formData = new FormData();
    var index = 0;
    var url = $(this).attr('data-url');
    formData.append('file', $('#upimg')[0].files[0]);

    $.ajax({
        url: url,
        type: 'POST',
        cache: false,
        data: formData,
        dataType:'json',
        processData: false,
        contentType: false,
        beforeSend:function() {
            index = layer.load(2, {time: 5*1000});
        },
        success:function(res) {
            if (res.code) {
                layer.alert(res.msg, {icon:2, title:'提示'});
            }

            $("#upload input[type='hidden']").val(res.file_path)
            $(".view-img img").attr('src', res.file_path);
            $(".view-img").removeAttr('hidden');
        },
        complete:function() {
            layer.close(index)
        }
    });
})

/**
 * 常规操作，不询问
 */
$("[mini='common']").click(function() {
    var that = $(this);
    $.get(that.attr('data-url'),function(data){
        if (data.code){
            layer.msg(data.msg,{
                icon:1,
                time:2000,
            })
        }else{
            layer.msg('操作成功',{
                icon:2,
                time:2000,
            },function(){
                location.reload()
            })
        }
    },'json')
})



