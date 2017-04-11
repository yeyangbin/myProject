//服务介绍图片的鼠标移上和移出效果
// function service_imgs(ev){
	$("ul.service_list").eq(0).hover(function() {
		$(this).find('img').attr('src', '../images/service_img_1_1.png');
	}, function() {
		$(this).find('img').attr('src', '../images/service_img_1_0.png');
	});
	$("ul.service_list").eq(1).hover(function() {
		$(this).find('img').attr('src', '../images/service_img_2_1.png');
	}, function() {
		$(this).find('img').attr('src', '../images/service_img_2_0.jpg');
	});
	$("ul.service_list").eq(2).hover(function() {
		$(this).find('img').attr('src', '../images/service_img_3_1.jpg');
	}, function() {
		$(this).find('img').attr('src', '../images/service_img_3_0.jpg');
	});
// }
	
	$("ul.service_list").hover(function() {
		$(this).find("li.service_border").css({
			background: 'rgba(207, 219, 0, 1)',
			transition: 'background .2s linear'
		});
	}, function() {
		$(this).find("li.service_border").css({
			background: 'rgba(176, 176, 176, 1)',
			transition: 'background .2s linear'
		});
	});



$("ul.service_list").each(function(index, el) {
	
});
