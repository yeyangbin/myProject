/**
 * Created by pc on 2017/3/21.
 */
var windowWidth = $(document).width(); // 获取当前网页的宽度
// 用来判断是否是宽度小于641时执行的JavaScript
if (windowWidth < 641) {	
	
	var flexbox = $(".flexslider");
	var liWidth = windowWidth * 0.85;
	var arrowLeft = $(".flexslider .flex-direction-nav li:nth-of-type(1) a");
	var arrowRight = $(".flexslider .flex-direction-nav li:nth-of-type(2) a");
	var tab = $(".flex-control-nav li a");
	var snap_slider = $("#snap .slides");
	var video_slider = $("#video .slides");
	var works_slider = $("#works .slides");
	var recommend_slider = $("#recommend .slides");
	var shop_slider = $("#shop .slides");
	var isUnfolded = false; // 一个判断菜单是否展开的开关
	var timer = null;
	var l = 0;
	var num = 0;
	
	snap_slider.width("3400%");
	video_slider.width("800%");
	works_slider.width("1200%");
	recommend_slider.width("2200%");
	shop_slider.width("1000%");
	
	$(".slides li").width(liWidth);
	$(".slides li").height(liWidth);
	$("#works .slides li").height(liWidth / 0.71599);
	$(".topics_connect a").height($(".topics_connect").width());
	$("#video_wrap ul.slides li").css('height','auto');
    navAnimate();
    showTopics();    
    $('.flexslider').flexslider({
	    animation: "slide",
	    slideshow: false,
	});
}
if (windowWidth > 640) {
	var isMore = false;
	$('.flexslider').flexslider({
	    animation: "slide",
	    itemWidth: 172,
	    slideshow: false,  
	    animationLoop: true,
    	itemMargin: 20
	});
	
	$("#works .more").on("click", function() {
		if(!isMore) {
			$("#works_wrap article").css({
				display: "block",
				animation:"mo 1.2s linear forwards"
			}); 
			$(this).css({
				background: "url(../img/close_bt.png) no-repeat"
			});
			isMore = true;
		}else {
			$("#works_wrap article").css({
				animation:"cl 1.2s linear forwards"
			}); 
			$(this).css({
				background: "url(../img/more_bt.png) no-repeat"
			});
			isMore = false;
		}
	});

	$(window).scroll(function(){
		if($(window).scrollTop() >= 100){
			$("#nav").css({
				position:"fixed",
				top:0
			});
		}else {
			$("#nav").css({
				position:"relative",
				top:"none"
			});
		}
		// console.log($(window).scrollTop());
	})
	
	
	// if () {

	// }
	
}

function navAnimate() {
    $("#header").on("touchstart", function () {
        if (isUnfolded != true) {
            $("#nav").css({
                animation: "navA .5s linear forwards"
            });
            isUnfolded = true;
        }else if (isUnfolded == true) {
            $("#nav").css({
                animation: "navB .5s linear forwards"
            });
            isUnfolded = false;
        }
    }); 
    $("#nav li").on("touchstart", function() {
    	$("#nav").css({
            animation: "navB .5s linear forwards"
        });
    });
}
function showTopics() {
	$("#show_more").on("touchstart", function () {
        $(".topics_first_li").css({
            marginTop:"0px",
            transition: "all .8s linear"
        });
        $("#show_more").css({
            opacity:"0",
            transition:"all .1s .8s linear"
        });
        $("#show_more_down").css({
            opacity:"1",
            transition:"all .1s .8s linear"
        });
    });
    $("#show_more_down").on("touchstart", function () {
        $(".topics_first_li").css({
            marginTop:"-130px",
            transition: "all .8s linear"
        });
        $("#show_more").css({
            opacity:"1",
            transition:"all .1s .8s linear"
        });
        $("#show_more_down").css({
            opacity:"0",
            transition:"all .1s .8s linear"
        });
    });
}
