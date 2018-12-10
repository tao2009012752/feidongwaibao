
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
            var username = $('input[name="username"]').val();
            var password = $('input[name="password"]').val();

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