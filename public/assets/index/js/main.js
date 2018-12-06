
/*模板页js*/
Base = {
    //导航切换效果
    Menu : function(){
        var url = window.location.href;
        if(url.search('newslist')>0||url.search('listdetail')>0){
            $('.navBox li').eq(1).addClass('liAction');
        }else if(url.search('Talent/index')>0){
            $('.navBox li').eq(2).addClass('liAction');
        }else if(url.search('Job')>0){
            $('.navBox li').eq(4).addClass('liAction');
        }else{
            $('.navBox li').eq(0).addClass('liAction');
        }
    },
    //搜索
    Search : function(){
        $('.searchBtn').click(function(){
            var keywords = $('input[name="keywords"]').val();
            console.log(keywords);
            if(keywords){
                $('#search').submit();
            }
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