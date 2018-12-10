
/*模板页js*/
Base = {
    //导航切换效果
    Menu : function(){
        var url = window.location.href;
        if(url.search('Newsinfo')>0||url.search('listdetail')>0){
            $('.navBox li').eq(1).addClass('liAction');
        }else if(url.search('Talent/index')>0){
            $('.navBox li').eq(2).addClass('liAction');
        }else if(url.search('Train')>0){
            $('.navBox li').eq(3).addClass('liAction');
        }else if(url.search('Job')>0){
            $('.navBox li').eq(4).addClass('liAction');
        }else if(url.search('About')>0){
            $('.navBox li').eq(7).addClass('liAction');
        }else if(url.search('Contact')>0){
            $('.navBox li').eq(8).addClass('liAction');
        }else{
            $('.navBox li').eq(0).addClass('liAction');
        }
    },
    //搜索
    Search : function(){
        $('.searchBtn').click(function(){
            var keywords = $('input[name="keywords"]').val();
            if(keywords)$('#search').submit();
        })
    }
}

/*首页*/
Index = {
    Login : function(url){
        $('.loginBtn').click(function(){
            var type = $(this).attr('data-type');

            if(type==1){
                var username = $('input[name="username"]').val();
                var password = $('input[name="password"]').val();
            }else{
                var username = $('input[name="cusername"]').val();
                var password = $('input[name="cpassword"]').val();
            }

            if(!username||!password){alert('用户名或密码不能为空！');return false;}
            $.post('/index/Login/loginAjax',{'username':username,'password':password},function(a){
                var data = $.parseJSON(a);
                if(data.code){
                    alert(data.msg);
                }else{
                    if(url){
                        location.href = url;
                    }else{
                        history.go(0);
                    }
                }
            })
        })
    }
}

/*资讯中心js*/
News = {
    //左侧导航切换效果
    Menu : function(catename){
        if($('li[data="'+catename+'"]').length>0){
            $('li[data="'+catename+'"]').find('a').addClass('erjiListAction');
        }else{
            $('.leftBox .titBoxs li a').eq(0).addClass('erjiListAction');
        }
    }
}

/*公司页面js*/
Company = {
    //切换效果
    Change : function(){
        $('.nav ul li a').click(function(){
            var data = $(this).attr('data');
            $('.rightBox3').hide();
            $('.right'+data).show();
        })
    },
    PassEdit : function(){
        $('.sub').click(function(){
            var password = $('input[name="password"]').val();
            var cpassword = $('input[name="cpassword"]').val();
            if(password != cpassword){alert('两次密码输入的不一致！');return false;}
            $.post('/index/Companys/passWordEdit',{'password':password},function(a){
                var data = $.parseJSON(a);
                alert(data.msg);
            })
        })
    },
    Publish : function(){
        $('.sub').click(function(){
            var name = $('input[name="name"]').val();
            var num = $('input[name="num"]').val();
            var place = $('input[name="place"]').val();
            var degree = $('select[name="degree"]').val();
            var location = $('input[name="location"]').val();
            var maxsalary = $('input[name="maxsalary"]').val();
            var minsalary = $('input[name="minsalary"]').val();
            var require = $('textarea[name="require"]').val();
            var due = $('textarea[name="due"]').val();
            var data = {'name':name,'num':num,'place':place,'degree':degree,'location':location,'maxsalary':maxsalary,'minsalary':minsalary,
                'require':require, 'due':due};
            console.log(data);
            if(!name){alert('工作名不能为空！');return false;}
            if(!num){alert('需求人数不能为空！');return false;}
            if(!place){alert('工作地点不能为空！');return false;}
            if(!location){alert('所在地不能为空！');return false;}
            if(maxsalary < minsalary || minsalary<0){alert('最大薪资不能小于最小薪资！');return false;}
            if(!require){alert('需求不能为空！');return false;}
            if(!due){alert('职责不能为空！');return false;}

            $.post('/index/Companys/publishAdd',data,function(a){
                var data = $.parseJSON(a);
                if(data.code){
                    alert(data.msg);
                }else{
                    location.href = '';
                }
            })

        })
    }
}

/*人才招聘*/
Job = {
    //投递简历
    Apply : function(){
        $('.apply').click(function(){
            var jid = $(this).attr('data');
            $.post('/index/Job/applyAjax',{'jid':jid},function(a){
                var data = $.parseJSON(a);
                if(data.code == 1){
                    alert(data.msg);
                }else if(data.code == 2){
                    location.href = '/index/Login/index';
                }else{
                    alert(data.msg);
                    history.go(0);
                }
            })
        })
    }
}

/*注册页*/
Reg = {
    //个人注册 url 为成功后跳转url
    Perreg : function(url){
        $('.regBtn').click(function(){
            var username = $('input[name="username"]').val();
            var phone = $('input[name="phone"]').val();
            var password = $('input[name="password"]').val();
            var cpassword = $('input[name="cpassword"]').val();
            var agree = $('input[name="agree"]').prop('checked');

            if(!username){alert('用户名不能为空！');return false;}
            if(!phone && phone.length != 11){alert('手机号不能为空！');return false;}
            if(!password){alert('密码不能为空！');return false;}
            if(password != cpassword){alert('两次密码输入不一致');return false;}
            if(!agree){alert('请在协议处点击我同意！');return false;}

            var data = {'username':username,'phone':phone,'password':password,'cpassword':cpassword};
            $.post('/index/Reg/perRegAjax',data,function(a){
                var data = $.parseJSON(a);
                if(data.code){
                    alert(data.msg);
                }else{
                    location.href = url;
                }
            })
        })
    },

    //企业注册
    Comreg : function(url,type){
        $('.regBtn').click(function(){
            var username = $('input[name="username"]').val();
            var password = $('input[name="password"]').val();
            var cpassword = $('input[name="cpassword"]').val();
            var logo = $('.upimg img').eq(0).attr('src');
            var name = $('input[name="name"]').val();
            var core = $('input[name="core"]').val();
            var image = $('.upimg img').eq(1).attr('src');
            var intro = $('textarea[name="intro"]').val();
            var contact = $('input[name="contact"]').val();
            var phone = $('input[name="phone"]').val();
            var email = $('input[name="email"]').val();
            var location = $('input[name="location"]').val();
            var agree = $('input[name="agree"]').prop('checked');

            if(!username && type==1){alert('用户名不能为空！');return false;}
            if(!password && type==1){alert('密码不能为空！');return false;}
            if(password != cpassword && type==1){alert('两次密码输入不一致');return false;}
            if(logo.indexOf("upload.png") >= 0){alert('公司logo不能为空');return false;}
            if(!name){alert('公司名称不能为空！');return false;}
            if(!core){alert('核心业务不能为空！');return false;}
            if(image.indexOf("upload.png") >= 0){alert('实景拍摄不能为空');return false;}
            if(!intro){alert('公司简介不能为空！');return false;}
            if(!contact){alert('联系人不能为空！');return false;}
            if(!phone && phone.length != 11){alert('手机号不能为空！');return false;}
            if(!email){alert('邮箱不能为空！');return false;}
            if(!location){alert('地址不能为空！');return false;}
            if(!agree && type==1){alert('请在协议处点击我同意！');return false;}

            var data = {'username':username,'password':password,'cpassword':cpassword,'logo':logo,'name':name,'core':core,
                'image':image,'intro':intro,'contact':contact,'phone':phone,'email':email,'location':location};
            var url = '';
            if(type==1){
                url = '/index/reg/comRegAjax';
            }else{
                url = '/index/companys/editsub';
            }
            $.post(url,data,function(a){
                var data = $.parseJSON(a);
                if(data.code){
                    alert(data.msg);
                }else{
                    if(type==2)alert(data.msg);
                    location.href = url;
                }
            })
        })
    }
}

/**************** 普通函数 ********************/

Common = {
    /**
     * 上传图片
     */
    ImgUpload : function(){
        $(".upimg").click(function() {
            $(this).siblings('input').click();
            $(this).siblings('input').on("change", function(){
                var formData = new FormData();
                var url = $(this).attr('data-url');
                formData.append('file', $(this)[0].files[0]);
                var fh = $(this);
                $.ajax({
                    url: url,
                    type: 'POST',
                    cache: false,
                    data: formData,
                    dataType:'json',
                    processData: false,
                    contentType: false,
                    success:function(res) {
                        if (res.code)alert(res.msg);
                        fh.siblings('a').find('img').attr('src', res.file_path);
                    }
                });
            });
        })
    }
}