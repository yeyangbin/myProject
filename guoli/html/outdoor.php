<?php
	require("conn.php");	
//	$area = $_GET["area"];
	$sql = "SELECT * FROM outdoor ORDER BY id DESC LIMIT 1,10";

?>

<!doctype html>
<html>
	<head>
	    <meta charset="utf-8">
	    <title>果粒网-查路线</title>
	    <meta name="keywords" content="户外,徒步,骑行,人文,亲子,滑雪">
	    <meta name="google-site-verification" content="ZRIqJ5yEOtfzmyJCs5FaiyFFQe1RsDLysEiiTGERVAU">
	  	<link rel="stylesheet" href="../css/layout.css" />
	  	<link rel="stylesheet" href="../css/outdoor.css" />
	  	<style>
	  		.n_content_left ul a:nth-child(2) li{
				background-color: rgb(255,153,51);
			}
	  	</style>
	</head>
	<body>
		<div id="header"></div>
		<!--中间查路线的条件-->
		<div id="way_wrap">
			<div class="w_content">
				<!--区域行-->
				<div class="row_area w_row">
					<span>区域</span>
					<a href="javascript:void(0);" class="row_active">不限</a>
					<a href="javascript:void(0);">华东</a>
					<a href="javascript:void(0);">华中</a>
					<a href="javascript:void(0);">华南</a>
					<a href="javascript:void(0);">东北</a>
					<a href="javascript:void(0);">西南</a>
					<a href="javascript:void(0);">西北</a>
					<a href="javascript:void(0);">华北</a>
				</div>
				<!--活动主题行-->
				<div class="row_subject w_row">
					<span>活动主题</span>
					<a href="javascript:void(0);" class="row_active">不限</a>
					<a href="javascript:void(0);">帆船/皮划艇</a>
					<a href="javascript:void(0);">踏青赏花</a>
					<a href="javascript:void(0);">山地徒步</a>
					<a href="javascript:void(0);">花湖骑行</a>
					<a href="javascript:void(0);">篝火露营</a>
					<a href="javascript:void(0);">沙漠穿越</a>
					<a href="javascript:void(0);">海岛海钓</a>
					<a href="javascript:void(0);">漂流溯溪</a>
					<a href="javascript:void(0);">家庭亲子</a>
					<a href="javascript:void(0);">红色建党</a>
					<a href="javascript:void(0);">止境禅修</a>
				</div>
				<!--价格行-->
				<div class="row_price w_row">
					<span>价格</span>
					<a href="javascript:void(0);" class="row_active">不限</a>
					<a href="javascript:void(0);">600元以下</a>
					<a href="javascript:void(0);">600-1200元</a>
					<a href="javascript:void(0);">1200-2000元</a>
					<a href="javascript:void(0);">2000-3500元</a>
					<a href="javascript:void(0);">3500元以上</a>
				</div>
				<!--天数-->
				<div class="row_days w_row">
					<span>天数</span>
					<a href="javascript:void(0);" class="row_active">不限</a>
					<a href="javascript:void(0);">当天返回</a>
					<a href="javascript:void(0);">2天1夜</a>
					<a href="javascript:void(0);">3天2夜</a>
					<a href="javascript:void(0);">4天3夜及以上</a>
				</div>
			</div>
		</div>
		<!--筛选的结果-->
		<div id="way_menu">
			<div class="menu_center">
				<!--头部选项卡-->
				<div class="menu_title">
					<a class="menu_choose" href="javascript:void(0);">推荐</a>
					<a class="menu_price" href="javascript:void(0);">价格
						<span class="ico_order_prcie"></span>
					</a>
				</div>
				<!--详细信息-->
				<div class="phpDOM">
				<?php
					$res = $db->query($sql);	
					while ($arr = mysqli_fetch_assoc($res)) {
				?>
				<div class="menu_item">
					<!--该方式的图片-->
					<div class="item_left">
						<a href="<?php echo $arr["id"];?>.html" target="_blank">
							<img class="item_left_img" id="_item_left_img" src="../imgs/outdoor/<?php echo $arr["pic"];?>" alt="" />
						</a>
					</div>
					<!--该方式的详细信息-->
					<div class="item_right">
						<h3><a href="<?php echo $arr["id"];?>.html" target="_blank" title="<?php echo $arr["h1"];?>"><?php echo $arr["h1"];?>	</a></h3>
						<div class="item_right_address">
							<?php
	                		$theme = json_decode($arr["theme"], true);
		                		for ($i = 0; $i < count($theme); $i++) {
		                	?>
		                	<span><?php echo $theme[$i]; ?></span>
		                	<?php
		                		}
		                	?>	          
							<!--<span>篝火露营</span>-->
							<!--<span>海岛海钓</span>-->
						</div>
						<div class="item_right_table">
							<div>
								<span>适合团队人数:</span>
								<span><?php echo $arr["person"];?></span>
							</div>
							<div>
								<span>适合团队:</span>
								<span><?php echo $arr["team"];?></span>
							</div>
							<div>
								<span>行程天数:</span>
								<span><?php echo $arr["days"];?></span>
							</div>
							<div>
								<span>最佳出行月份:</span>
								<span><?php echo $arr["bestmonth"];?></span>
							</div>
						</div>
						<label>￥<span class="item_left_price" id="_item_left_price"><?php echo $arr["price"];?>.00</span>/人起</label>
						<a target="_blank" href="<?php echo $arr["id"];?>.html" class="btn_details" id="_btn_details">详情</a>
					</div>
				</div>
				<?php
					}
				?>									
				</div>
				<div class="btn_page_group">
                    <?php
                    // 获取数据库有多少记录
                        $sql = "SELECT * FROM outdoor";
                        $res = $db->query($sql);
                        $num =  mysqli_num_rows($res);
                        $pagesize = 10;
                        $pageNum = ceil($num / $pagesize);
                        for($i = 0; $i < $pageNum;$i++){
                     ?>
                        <a href="javascript:void(0);" class="<?php if ($i == 0) {echo 'btn_page_group_active' ;} ?>"><?php echo ($i+1); ?></a>
                    <?php
                        }
                    ?>
<!--                    <a href="javascript:void(0);" class="btn_page_group_active">1</a>-->
<!--					<a href="javascript:void(0);">2</a>-->
<!--					<a href="javascript:void(0);">3</a>-->
<!--					<a href="javascript:void(0);">4</a>-->
<!--					<a href="javascript:void(0);">5</a>-->
<!--					<a href="javascript:void(0);">6</a>-->
<!--					<a href="javascript:void(0);">7</a>-->
<!--					<a href="javascript:void(0);">8</a>-->
<!--					<a href="javascript:void(0);">9</a>-->
<!--					<a href="javascript:void(0);">10</a>-->
					<a href="javascript:void(0);">>></a>
				</div>
			</div>
			<!--底部页码-->
			
		</div>
		<div id="footer"></div>
	</body>
	<script type="text/javascript" src="../js/jquery.js" ></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#header").load("header.html");
	        $("#footer").load("footer.html");
	        //查找路线条件中的a标签点击效果
	        //所有的a标签
	        var lastA = [ $(".row_area a").eq(0), $(".row_subject a").eq(0),$(".row_price a").eq(0) ,$(".row_days a").eq(0)];
	        var allA = [ $(".row_area a"),$(".row_subject a"),$(".row_price a"),$(".row_days a")];
	        var arr1 = null;

	        function showBorder(obj,last){
		        obj.on("click",function(){
	        		last.removeClass("row_active");
	        		$(this).addClass("row_active");
	        		last = $(this);
	        		//点击筛选的a标签 获取条件
	        		var dataArr = new Array();
					for(var i = 0;i < $(".w_row a").length;i++){
						if($(".w_row a").eq(i).hasClass("row_active")){
							dataArr.push($(".w_row a").eq(i).html());
						}
					}
						//ajax
					Ajax(dataArr,"","");
                    var isClick =false;
					$(" .menu_price").on("click",function(){
			       		if (isClick) {
			       			Ajax(dataArr,"desc","");
			       			isClick = false;
			       		}else{
			       			Ajax(dataArr,"esc","");
			       			isClick = true;
			       		}	       			
			       	});
                    $(".btn_page_group a:not(a:last)").on("click",function(){
                        var pagenum = $(this).html();
                        if (isClick) {
                            Ajax(dataArr,"desc",pagenum);
                            isClick = false;
                        }else{
                            Ajax(dataArr,"esc",pagenum);
                            isClick = true;
                        }
                    });
		        });
	        }
	        for(var i = 0;i<lastA.length;i++){
	        		showBorder(allA[i],lastA[i]);
	        }
            //页脚的按钮
            var lastBtn = $(".btn_page_group a").eq(0);
            $(".btn_page_group a:not(a:last)").on("click",function(){
                lastBtn.removeClass("btn_page_group_active");
                $(this).addClass("btn_page_group_active");
                lastBtn = $(this);
            });
	        //推荐 价格
	        var lastChoose = $(".menu_choose");
	       	$(".menu_choose, .menu_price").on("click",function(){
	       		lastChoose.css({"borderBottom":"1px solid #ddd","backgroundColor":"#f6f6f6","color":"#5a5a5a"});
	       		$(this).css({"borderBottom":"1px solid white","backgroundColor":"white","color":"#f28000"});
	       		lastChoose = $(this);	       		
	       	})
		});
		//ajax
		function Ajax(myarr,sort,pagenum){
			$.ajax({
				type:"get",
				url:"outdoorhandle.php",
				async:true,
				data:{
					arr:myarr,
					sort:sort,
                    page:pagenum
				},
                success:function(str){
//					console.log(str);
					$(".phpDOM").html("");
					var res = $.parseJSON(str);
					for (var i = 0; i < res.length; i++) {
						var _theme = res[i].theme;
						var zz = /\]*\[*\"*/g;
						_theme = _theme.replace(zz,"");
						_theme = _theme.split(",");
//						console.log(_theme);
						var items = createDiv(res[i].h1,_theme,res[i].person,res[i].team,res[i].days,res[i].bestmonth,res[i].price,res[i].pic);

						$(".phpDOM").append(items);
					}
//					console.log($.parseJSON(str));
				}
			});	
		}
		function createDiv(h1, theme, person, team, days, bestmonth, price, pic) {
			function themes(theme){
				var spanstr = "";
				for (var i = 0; i < theme.length; i++) {					
					spanstr += "<span>"+theme[i]+"</span>";					
				}
				return spanstr;
			}
			var spanstr = themes(theme);
			var divitem = '<div class="menu_item"> ' +
				'<div class="item_left">' +
				'<a href="">' +
				'<img class="item_left_img" id="_item_left_img" src="../imgs/outdoor/'+pic+'" alt="" />' +
				'</a>' +
				'</div>' +
				'<div class="item_right">' +
				'<h3><a href="javascript:void(0);" target="_blank" title=" ' + h1 + ' "> ' + h1 + '</a></h3>' +
				'<div class="item_right_address">' +
				spanstr+
				'</div>' +
				'<div class="item_right_table">' +
				'<div>' +
				'<span>适合团队人数:</span>' +
				'<span> ' + person + '  </span>' +
				'</div>' +
				'<div>' +
				'<span>适合团队:</span>' +
				'<span> ' + team + '  </span>' +
				'</div>' +
				'<div>' +
				'<span>行程天数:</span>' +
				'<span> ' + days + ' </span>' +
				'</div>' +
				'<div>' +
				'<span>最佳出行月份:</span>' +
				'<span> ' + bestmonth + ' </span>' +
				'</div>' +
				'</div>' +
				'<label>￥<span class="item_left_price" id="_item_left_price"> ' + price + '.00</span>/人起</label>' +
				'<a target="_blank" href="###" class="btn_details" id="_btn_details">详情</a>' +
				'</div>' +
				'</div>';
				return divitem;
			}
		
	</script>
</html>