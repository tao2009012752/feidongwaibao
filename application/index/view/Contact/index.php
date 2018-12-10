{extend name="index/base" /}
{block name="tdk"}
<title>联系我们-服务外包人才信息综合服务平台</title>
{/block}
{block name="content"}
<!--联系我们-->
<div class="newsList contant">
    <div class="newsListBox">
        <div class="erjiTit">
            <span class="rightnow">当前位置：<a href="/">首页</a> > 联系我们</span>
        </div>
        <div class="fl leftBox leftBoxNew companyDetail ">

            <div class="jibenBox">
                <h5>服务中心</h5>
                <div class="jibenText">
                    <ul>
                        <li style="font-weight: bold;">安徽皖信人力</li>
                        <li>综合服务：0551-63431150</li>
                        <li>员工服务：0551-63432400</li>
                        <li>招聘热线：0551-63410912</li>
                        <li>业务热线：0551-63430095</li>
                        <li>传真：0551-63431150</li>
                        <li>邮箱：ahwxhr@ahwxhr.com</li>
                    </ul>
                </div>
            </div>
            <div class="contactImg">
                <a href="<{:url('/index/About/index')}>"><img src="<{$img}>/aboutus.jpg" alt="" /></a>
            </div>
        </div>
        <div class="fr rightBox rightBoxNew">
            <div class="aboutUsBox">
                <div class="aboutUs">
                    <img src="<{$img}>/contactUs.jpg"/>
                </div>
                <div class="contactWrap">
                    <p class="biaoti">我们的服务热线</p>
                    <p class="duan">
                        综合服务：0551-63431150
                    </p>
                    <p class="duan">
                        员工服务：0551-63432400
                    </p>
                    <p class="duan">
                        招聘热线：0551-63410912
                    </p>
                    <p class="duan">
                        业务热线：0551-63430095
                    </p>
                    <p class="duan">
                        传真：0551-63431150
                    </p>
                    <p class="duan">
                        邮箱：ahwxhr@ahwxhr.com
                    </p>
                    <p class="biaoti">我们的地址</p>
                    <p class="duan">
                        合肥市政务区龙图路与怀宁路交口置地广场C座8楼
                    </p>
                    <!--百度地图容器-->
                    <div style="width:697px;height:550px;border:#ccc solid 1px;" id="dituContent"></div>

                </div>

            </div>




        </div>
    </div>

</div>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
<script type="text/javascript">

    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }

    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(117.230495,31.811245);//定义一个中心点坐标
        map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }

    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }

    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
    var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
    map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
    var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
    map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
    var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
    map.addControl(ctrl_sca);
    }

    //标注点数组
    var markerArr = [{title:"安徽皖信人力资源管理有限公司",content:"地址：合肥市政务区龙图路与怀宁路交口置地广场C座8楼<br/>综合服务：0551-63431150<br/>员工服务：0551-63432400<br/>招聘热线：0551-63410912",point:"117.230473|31.811821",isOpen:1,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
         ,{title:"我的标记",content:"我的备注",point:"117.233689|31.814045",isOpen:0,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
         ];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
            var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
            var iw = createInfoWindow(i);
            var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
            marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                        borderColor:"#808080",
                        color:"#333",
                        cursor:"pointer"
            });

            (function(){
                var index = i;
                var _iw = createInfoWindow(i);
                var _marker = marker;
                _marker.addEventListener("click",function(){
                    this.openInfoWindow(_iw);
                });
                _iw.addEventListener("open",function(){
                    _marker.getLabel().hide();
                })
                _iw.addEventListener("close",function(){
                    _marker.getLabel().show();
                })
                label.addEventListener("click",function(){
                    _marker.openInfoWindow(_iw);
                })
                if(!!json.isOpen){
                    label.hide();
                    _marker.openInfoWindow(_iw);
                }
            })()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }

    initMap();//创建和初始化地图
</script>
{/block}