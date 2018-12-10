
$(function(){
	if($(".indexPage").length>0){
		//	轮播图
		jQuery(".slideBox").slide({mainCell:".bd ul",autoPlay:true});
		//	选项卡
		jQuery(".slideTxtBox").slide();
		//企业录滚动
		jQuery(".picMarquee-left").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",vis:5,interTime:50});
	}


	//登录切换
	$(".tapText").click(function(){
		$(this).addClass("liActions").siblings(".tapText").removeClass("liActions");
		if($(".yongTap").hasClass("liActions")){
			$(".yonghuBox").css("display","block");
			$(".qiyeBox").css("display","none");

		}else{
			$(".qiyeBox").css("display","block");
			$(".yonghuBox").css("display","none")
		}
	})

	/*if($(".pageJs").length>0){
		//分页
		$("#pagination3").pagination({
			currentPage: 4,
			totalPage: 16,
			isShow: true,
			count: 7,
			homePageText: "首页",
			endPageText: "尾页",
			prevPageText: "上一页",
			nextPageText: "下一页",
			callback: function(current) {
				$("#current3").text(current)
			}
		});
	}*/
	//新闻滚动
	if($(".gundong").length>0){
		jQuery(".txtMarquee-left").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",interTime:50,trigger:"click"});
	}
	if($(".qiehuan").length>0){
		//	选项卡
		jQuery(".slideTxtBox").slide();
	}
	if($(".talentPic").length>0){
		//	选项卡
		jQuery(".picScroll-left").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:8,trigger:"click",delayTime:500});
	}

	//登录选项卡
	$(".changeLogin li").click(function(){
		$(this).addClass("changeLoginAction").siblings().removeClass("changeLoginAction");
		var indexs = $(this).index();
		$(".loginWrap").eq(indexs).css("display","block").siblings(".loginWrap").css("display","none")

	})


})
