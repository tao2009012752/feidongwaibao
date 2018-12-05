
/*模板页js*/
Base = {
    //导航切换效果
    Menu : function(){
        var url = window.location.href;
        if(url.search('newslist')>0){
            $('.navBox li').eq(1).addClass('liAction');
        }else if(url.search('Talent/index')>0){
            $('.navBox li').eq(2).addClass('liAction');
        }else{
            $('.navBox li').eq(0).addClass('liAction');
        }
    }
}

/*资讯中心js*/
News = {
    //左侧导航切换效果
    Menu : function(){
        var url = window.location.pathname;
        var id = parseInt(url.replace(/[^0-9]/ig,""));
        if(!id)id = 0;
        var info = {0:'0',3:'1',4:'2',6:'3',5:'4'};
        $('.leftBox .titBoxs li a').eq(info[id]).addClass('erjiListAction');
    }
}