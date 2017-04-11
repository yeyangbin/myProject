<?php
  require_once "common.php";
	$code = $_GET["code"];
	//echo $code;

	$appID = "wx8e2ff2c5adcdbcb4";
	$appsecret = "07450650b126f172bcca8d8abae97e29";

	$getTokenApi = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appID}&secret={$appsecret}&code={$code}&grant_type=authorization_code";

	$str = httpGet($getTokenApi);
	//echo $str;
	$arr = json_decode($str,true);
	$token = $arr["access_token"];
	$openid = $arr["openid"];

	$userinfoApi = "https://api.weixin.qq.com/sns/userinfo?access_token={$token}&openid={$openid}&lang=zh_CN";
	$str = httpGet($userinfoApi);
	$arr = json_decode($str,true);
	$nickname = $arr["nickname"];
	$headimgurl = $arr["headimgurl"];
	//echo $nickname;
	//echo "<img src='{$arr['headimgurl']}' alt='touxiang' >";
?>
<!doctype html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta charset="UTF-8" />
		<title>耐力大比拼</title>
		<link rel="stylesheet" type="text/css" href="../css/page.css"/>
	</head>
	<body>
		<div id="page">
			<div id="head">
				<img id="logo" src="../img/logo.png"/>
				<img class="new" src="../img/new.png" alt="" />
				<img class="text1" src="../img/text1.png"/>
				<div class="carA">
					<img class="car" src="../img/car.png" alt="" />
					<!--<img class="lz" src="../img/lz.png"/>-->
				</div>	
			</div>
			<div id="indexcont">
				<img class="text2" src="../img/text2.png"></img>
				<img class="text3" src="../img/text3.png"></img>
				<div class="txt4">
					<img class="text4" src="../img/text4.png"></img>
				</div>
			</div>			
			<div id="indexbtn">
				<img class="startgame" src="../img/startgame.png"></img>
			</div>
		</div>	
		<div id="game">
			<div class="gamebox">
				<canvas id="gamecanvas"></canvas>
				<div id="gamemask">
					<img id="gamerule" src="../img/rule.png"/>
					<img class="gameclose" src="../img/close.png"/>
				</div>
			</div>
		</div>	
		<div id="over">
			<div id="head">
				<img id="logo" src="../img/logo.png"/>
				<img class="new" src="../img/new.png" alt="" />
				<img class="text1" src="../img/text1.png"/>
				<div class="carA">
					<img class="car" src="../img/car.png" alt="" />
					<!--<img class="lz" src="../img/lz.png"/>-->
				</div>	
			</div>					
			<div id="overscore">
				<p>持续了<span class="timescore">2.68</span>分钟</p>
				<p>在全国持久力测试中排名第<span class="ranking">9999</span>位</p>
			</div>
			<img class="overtxt0" src="../img/overtxt0.png"/>
			<img class="overtxt1" src="../img/overtxt1.png"/>
			<img class="share" src="../img/share.png" alt="" />	
			<img class="again" src="../img/again.png" alt="" />						
			<div class="sharemask">
				<img class="sharepyq" src="../img/sharepyq.png"/>					
			</div>
		</div>
		<div id="not_winning">
			<div id="head">
				<img id="logo" src="../img/logo.png"/>
				<img class="new" src="../img/new.png" alt="" />
				<img class="text1" src="../img/text1.png"/>
				<div class="carA">
					<img class="car" src="../img/car.png" alt="" />
					<!--<img class="lz" src="../img/lz.png"/>-->
				</div>	
			</div>	
			<div id="locont">
				<img class="nowintxt1" src="../img/nowintxt1.png"/>
			</div>			
			<img class="focus" src="../img/focusbtn.png" alt="" />	
			<img class="test_drive" src="../img/test_drive.png" alt="" />						
			<div class="focusmask">
				<img class="focuswx" src="../img/focuswx.png"/>					
			</div>			
		</div>
		<div id="winning">
			<div id="head">
				<img id="logo" src="../img/logo.png"/>
				<img class="new" src="../img/new.png" alt="" />
				<img class="text1" src="../img/text1.png"/>
				<div class="carA">
					<img class="car" src="../img/car.png" alt="" />
					<!--<img class="lz" src="../img/lz.png"/>-->
				</div>	
			</div>	
			<div id="wincont">
				<p>
									<span>恭喜您! </span><br />
					抽中斯柯达《持久力大挑战》礼品<span class="gift">品牌T恤</span>一件。
					发送中奖页面截图至上海大众斯柯达微信，小柯给您颁奖哦！ <br />
					<span>活动时间：2014年10月27日-11月15日</span>
				</p>
			</div>			
			<img class="focus" src="../img/focusbtn.png" alt="" />	
			<img class="test_drive" src="../img/test_drive.png" alt="" />						
			<div class="focusmask">
				<img class="focuswx" src="../img/focuswx.png"/>					
			</div>			
		</div>
	</body>
	<script type="text/javascript">
		var openid = "<?php echo $openid; ?>";
		var nickname = "<?php echo $nickname; ?>";
		var headimgurl = "<?php echo $headimgurl ?>";
	</script>
	<script src="../js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/game.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/operating.js" type="text/javascript" charset="utf-8"></script>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script src="../js/over.js" type="text/javascript" charset="utf-8"></script>
	
</html>