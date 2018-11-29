<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>肥东服务外包网管理后台</title>
    <link type="text/css" rel="stylesheet" href="/assets/fontsawesome/css/font-awesome.css"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/style.css"/>
</head>
<body>
<div class="header">
    <div class="logo">
        <a href="<{:url('index/index')}>"><img src="/assets/images/logo.png"/></a>
    </div>
    <div class="nav">
        <ul class="clearfix">
            <?php foreach ($menus as $val){if(!$val['parent_id']){ ?>
            <li>
                <i class="<{$val.icon}> font_lager"></i>
                <p data-id="<{$val.menu_id}>"><{$val.menu_name}></p>
            </li>
            <?php }} ?>
        </ul>
    </div>
    <div class="nav_roll f_left" style="display:none;">
        <div class="f_left">
            <i class="fa fa-caret-left fa-1x"></i>
        </div>
        <div class="f_right">
            <i class="fa fa-caret-right fa-1x"></i>
        </div>
    </div>
    <ul class="login_msg">
        <li>欢迎登录系统后台</li>
        <li><a href="<{:url('login/logout')}>">退出</a></li>
    </ul>
</div>
<!--top end-->
<div class="main_left">
    <h2><i class="menu_icon fa fa-reorder"></i></h2>
    <ul class="menu">
        <?php foreach($menus as $v){ if($v['parent_id']){ ?>
        <li>
            <i class="menu_icon <{$v.icon}>"></i>
            <a href="javascript:void(0);" data-id="<{$v.parent_id}>" data-href="/admin/<{$v.url}>"><{$v.menu_name}></a>
        </li>
        <?php } }?>
    </ul>
</div>
<!--left end-->
<div class="main_right">
    <iframe src="<{:url('index/home')}>" name="cont_box" frameborder="0" width="100%" height="100%" seamless></iframe>
</div>
<!--desktop end-->
<!--javascript include-->
<script src="/assets/js/jquery-2.2.1.min.js"></script>
<script src="/assets/js/tipSuppliers.js"></script>
<script>
    $("iframe[name='cont_box']").on("load",function(){
        $(".loading").hide();
        setTimeout(function(){$("iframe[name='cont_box']").css("opacity","1");},500);
    });
    $(function(){
        $(".loading").hide();
        setTimeout(function(){$("iframe[name='cont_box']").css("opacity","1");},500);
        $(".nav li:first").trigger("click");
    });
    jQuery("body").jrdek({Mtop:".header",Mleft:".main_left",Mright:".main_right",foldCell:".main_left h2"});
    $(".logo").click(function(){
        $("iframe[name='cont_box']").prop("src","<{:url('index/home')}>");
    });
</script>
</body>
</html>