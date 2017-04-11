//服务邮箱的移上变色效果
$("#footer .email a").hover(function() {
	$(this).find('img').attr('src', '../images/mail_h.jpg');
}, function() {
	$(this).find('img').attr('src', '../images/mail.jpg');
});
//登入方式的移上变色效果
var logway = $("#footer .logWay a");
logway.eq(0).hover(function() {
	$(this).find('img').attr('src', '../images/facebook_h.jpg');
}, function() {
	$(this).find('img').attr('src', '../images/facebook.jpg');
});
logway.eq(1).hover(function() {
	$(this).find('img').attr('src', '../images/youtube_h.jpg');
}, function() {
	$(this).find('img').attr('src', '../images/youtube.jpg');
});
logway.eq(2).hover(function() {
	$(this).find('img').attr('src', '../images/linkedln_h.jpg');
}, function() {
	$(this).find('img').attr('src', '../images/linkedln.jpg');
});
logway.eq(3).hover(function() {
	$(this).find('img').attr('src', '../images/twitter_h.jpg');
}, function() {
	$(this).find('img').attr('src', '../images/twitter.jpg');
});