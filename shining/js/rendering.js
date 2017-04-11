//轮播图
var imgs = $(".scroll_img a img");
var dots = $(".dots span");
var index = 0;
var timer;

//改变点击原点时图片的透明度
function animate_img(index){
	for (var i = 0; i < imgs.length; i++) {
		if(imgs.eq(i).attr("class") == "img1"){
			imgs.eq(i).removeClass('img1');
		}	
		imgs.eq(index).addClass('img1');
	}
}
//改变点击的原点样式
function dots_style(index){
	for (var i = 0; i < dots.length; i++) {
		if(dots.eq(i).attr("class") == "dot"){
			dots.eq(i).removeClass('dot');
		}	
		dots.eq(index).addClass('dot');
	}	
}
//原点的点击事件
function dots_play(){
	for (var i = 0; i < dots.length; i++) {
		dots.on("click",function(){	
			stop1();		
			var myIndex = parseInt($(this).attr("index"));			
			index = myIndex;
			dots_style(index);
			animate_img(index);
			play1();
		});
	}
}

//轮播图的执行函数
function play1(){
	timer = setInterval(function(){
		if(index >= 2){
			index = -1;
		}
		index++;
		dots_play();
		dots_style(index);
		animate_img(index);
	},3000)
}
play1();

function stop1(){
	clearInterval(timer);
}


//瀑布流
// var 
function waterfall(){
    var $aPin = $( ".waterfall ul li" );
    var iPinW = $aPin.eq( 0 ).width();// 一个块框pin的宽
    var num = Math.floor( $( window ).width() / iPinW );//每行中能容纳的pin个数【窗口宽度除以一个块框宽度】
    //oParent.style.cssText='width:'+iPinW*num+'px;ma rgin:0 auto;';//设置父级居中样式：定宽+自动水平外边距
    var wH = $aPin[$aPin.length-1].offsetTop + Math.floor($aPin[$aPin.length-1].offsetHeight);
    $( ".waterfall" ).css({
        'height' : wH
    });
    var pinHArr=[];//用于存储 每列中的所有块框相加的高度。
    $aPin.each( function( index, value ){
        var pinH = $aPin.eq( index ).height();
        if( index < num ){
            pinHArr[ index ] = pinH; //第一行中的num个块框pin 先添加进数组pinHArr
        }else{
            var minH = Math.min.apply( null, pinHArr );//数组pinHArr中的最小值minH
            var minHIndex = $.inArray( minH, pinHArr );
            $( value ).css({
                'position': 'absolute',
                'top': minH + 15,
                'left': $aPin.eq( minHIndex ).position().left
            });
            //数组 最小高元素的高 + 添加上的aPin[i]块框高
            pinHArr[ minHIndex ] += $aPin.eq( index ).height() + 15;//更新添加了块框后的列高
        }
    });
}
waterfall();
var dataInt={'data':[{'src':'1.jpg'},{'src':'2.jpg'},{'src':'3.jpg'},{'src':'4.jpg'}]};
window.onscroll=function(){
    if(checkscrollside()){
        $.each( dataInt.data, function( index, value ){
            var $oPin = $('<li>').appendTo( $( ".waterfall ul" ) );
            $('<a>').appendTo( $oPin );
            var $oBox = $('<a>').appendTo( $oPin );
            $('<img>').attr({src:'../images/w' + $( value).attr( 'src') }).appendTo($oBox);
            $('<span>').append($oBox);
        });
        waterfall();
    };
}

window.onresize = function() {
	waterfall();
}

function checkscrollside(){
	var $aPin = $( ".waterfall ul li" );
    var scrollTop = $( window ).scrollTop()//注意解决兼容性
    var documentH = $( document ).width();//页面高度
    return (documentH > scrollTop ) ? true : false;//到达指定高度后 返回true，触发waterfall()函数
}






















