
/*模板页js*/
Base = {
    //导航切换效果
    Menu : function(){
        var url = window.location.href;
        if(url.search('newslist')>0||url.search('listdetail')>0){
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
    Menu : function(cate){
        var info = {1:'0',3:'1',4:'2',6:'3',5:'4'};
        $('.leftBox .titBoxs li a').eq(info[cate]).addClass('erjiListAction');
    }
}