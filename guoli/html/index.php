<?php
    require("conn.php");
//    $sql = "SELECT pic FROM outdoor";
//    $res = $db->query($sql);
//    $picarray = array();
//    while ($picarr = mysqli_fetch_assoc($res)) {
//        $picarray[] = $picarr;
//    }
?>
<!doctype html>
<html>
	<head>
	    <meta charset="UTF-8"/>
	    <meta name="keywords" content="户外,徒步,骑行,人文,亲子,滑雪">
	    <meta name="google-site-verification" content="ZRIqJ5yEOtfzmyJCs5FaiyFFQe1RsDLysEiiTGERVAU">
	    <link rel="stylesheet" href="../css/layout.css" />
	    <link rel="stylesheet" href="../css/index.css" />
	    <title>果粒网-团队力量超乎想象</title>
	    <style>
	  		.n_content_left ul a:nth-child(1) li{
				background-color: rgb(255,153,51);
			}
	  	</style>
	</head>
	<body>
		<!--头部-->
	    <div id="header"></div>
	    <!--中间-->
	    <div id="center">
	    		<!--轮播图-->
	    		<div class="slider_box">
	    			<div class="slider" style="display: block;">
	    				<a href="">
	    					<img src="../imgs/1_170322103845532.jpg" alt=""/>
	    				</a>
	    			</div>
	    			<div class="slider">
	    				<a href="">
	    					<img src="../imgs/1_170315165757436.jpg" alt=""/>
	    				</a>
	    			</div>
	    			<div class="slider">
	    				<a href="">
	    					<img src="../imgs/1_170221183921296.jpg" alt=""/>
	    				</a>
	    			</div>
	    			<div class="slider">
	    				<a href="">
	    					<img src="../imgs/1_170314161948402.jpg" alt="" />
	    				</a>
	    			</div>
	    			<!--小圆点-->
	    			<ul>
	    				<li class="circle slider_active"></li>
	    				<li class="circle"></li>
	    				<li class="circle"></li>
	    				<li class="circle"></li>
	    			</ul>
	    		</div>
	    		<div class="c_steps">
	    			<div class="steps_box">
	    				<img src="../imgs/homepage_ourad.png" alt="" />
	    			</div>
	    		</div>
	    </div>
	    <!--当季精选-->
	    <div id="selects">
	    		<div class="selects_wrap">
	    			<h1>当季精选</h1>
	    			<div class="items_box">
	    				<ul>
                            <?php
                                $sql = "SELECT * FROM outdoor ORDER BY id DESC LIMIT 1,8";
                                $res = $db->query($sql);
                                while($arr = mysqli_fetch_assoc($res)) {
                                    ?>
                                    <a href="<?php echo $arr["id"]; ?>.html">
                                        <li>
                                            <img src="../imgs/outdoor/<?php echo $arr["pic"]; ?>" alt=""/>
                                            <?php
                                            $theme = json_decode($arr["theme"], true);
                                            $countT = count($theme);
                                            if($countT > 2){
                                                $countT = 2;
                                            }
                                            for ($i = 0; $i < $countT; $i++) {
                                                ?>
                                                <h3><?php echo $theme[$i]; ?></h3>
                                                <?php
                                            }
                                            ?>
                                            <h4><?php echo $arr["h1"]; ?></h4>
                                            <p class="item_price">￥<span><?php echo $arr["price"]; ?>.00</span>/人起</p>
                                        </li>
                                    </a>
                                    <?php
                                }
                            ?>
<!--	    					<a href="">-->
<!--	    						<li>-->
<!--	    							<img src="../imgs/1_161111095821724.jpg" alt="" />-->
<!--	    							<h3>山地徒步</h3>-->
<!--	    							<h4>寻宝定向赛丨徒步婺源去探花 景德镇瑶里好风光</h4>-->
<!--	    							<p class="item_price">￥<span>1425.00</span>/人起</p>-->
<!--	    						</li>-->
<!--	    					</a>-->
<!--	    					<a href="">-->
<!--	    						<li>-->
<!--	    							<img src="../imgs/1_20161102111929.jpg" alt="" />-->
<!--	    							<h3>山地徒步</h3>-->
<!--	    							<h4>徒步龙脊梯田丨骑行阳朔 团队协作大考验</h4>-->
<!--	    							<p class="item_price">￥<span>5940.00</span>/人起</p>-->
<!--	    						</li>-->
<!--	    					</a>-->
<!--	    					<a href="">-->
<!--	    						<li>-->
<!--	    							<img src="../imgs/1_20161031155539.jpg" alt="" />-->
<!--	    							<h3>山地徒步</h3>-->
<!--	    							<h4>团队挑战｜徒步黄南古道 江南长城“烽火三国</h4>-->
<!--	    							<p class="item_price">￥<span>850.00</span>/人起</p>-->
<!--	    						</li>-->
<!--	    					</a>-->
<!--	    					<a href="">-->
<!--	    						<li>-->
<!--	    							<img src="../imgs/1_170315142754632.jpg" alt="" />-->
<!--	    							<h3>帆船/皮划艇</h3>-->
<!--	    							<h4>滴水湖帆船对抗赛｜智者乐水 集结团队力量驶向终点</h4>-->
<!--	    							<p class="item_price">￥<span>500.00</span>/人起</p>-->
<!--	    						</li>-->
<!--	    					</a>-->
<!--	    					<a href="">-->
<!--	    						<li>-->
<!--	    							<img src="../imgs/1_170317175309685.jpg" alt="" />-->
<!--	    							<h3>山地徒步</h3>-->
<!--	    							<h4>峡谷探幽·夏日亲水丨 溯溪徒步 海滩露营 嗨翻檀头山岛！</h4>-->
<!--	    							<p class="item_price">￥<span>1200.00</span>/人起</p>-->
<!--	    						</li>-->
<!--	    					</a>-->
<!--	    					<a href="">-->
<!--	    						<li>-->
<!--	    							<img src="../imgs/1_170323120644656.jpg" alt="" />-->
<!--	    							<h3>止境禅修</h3>-->
<!--	    							<h4>灵山精舍禅修丨禅悦我心,团建隐逸之旅</h4>-->
<!--	    							<p class="item_price">￥<span>1600.00</span>/人起</p>-->
<!--	    						</li>-->
<!--	    					</a>-->
<!--	    					<a href="">-->
<!--	    						<li>-->
<!--	    							<img src="../imgs/1_170324133953641.jpg" alt="" />-->
<!--	    							<h3>篝火露营</h3>-->
<!--	    							<h4>穿越腾格里丨通往神秘边塞 团队探索沙漠之旅</h4>-->
<!--	    							<p class="item_price">￥<span>3499.00</span>/人起</p>-->
<!--	    						</li>-->
<!--	    					</a>-->
	    				</ul>
	    				<a href="" class="more_road">更多路线</a>
	    			</div>
	    		</div>
	    </div>
	    	<!--团队建设-->
	    	<div id="buildTeam">
	    		<h1>团队建设</h1>
	    		<ul>
	    			<a href="sample01.html" target="_blank">
	    				<li>
	    					<img src="../imgs/homepage_tj01.jpg" alt="" />
	    					<h3>定向赛</h3>
	    				</li>
	    			</a>
	    			<a href="sample02.html" target="_blank">
	    				<li>
	    					<img src="../imgs/homepage_tj02.jpg" alt="" />
	    					<h3>基地拓展</h3>
	    				</li>
	    			</a>
	    			<a href="sample03.html" target="_blank">
	    				<li>
	    					<img src="../imgs/homepage_tj03.jpg" alt="" />
	    					<h3>主题拓展</h3>
	    				</li>
	    			</a>
	    			<a href="sample04.html" target="_blank">
	    				<li>
	    					<img src="../imgs/homepage_tj04.jpg" alt="" />
	    					<h3>沙盘课程</h3>
	    				</li>
	    			</a>
	    		</ul>
	    	</div>
		<!--明星领队-->
		<div id="star_lead">
			<h1>明星领队</h1>
			<ul class="star_box">
				<div class="move_box">
					<li class="star_slider_first star_slider">
						<div class="person_item">
							<div class="person_pic">
								<img src="../imgs/1_161121160537789.jpg" alt="" />
							</div>
							<h3>爱军</h3>
							<p>果粒网专业户外领队，擅长带领徒步穿越、亲子户外团队、户外骑行、露营等线路。性格开朗、热情、细心、暖男，具备专业的户外知识，摄影技术佳。</p>
								<div>服务过<span id="custom">816</span>客户</div>
						</div>
						<div class="person_item">
							<div class="person_pic">
								<img src="../imgs/1_161121160252651.jpg" alt="" />
							</div>
							<h3>棒冰</h3>
							<p>果粒网资深领队，有丰富的戈壁沙漠徒步等户外经验，服务过中欧商学院等多家社团组织及企业。多次组织大型团队定向赛、公司年会等活动。</p>
							<div>服务过<span id="custom">1200</span>客户</div>
						</div>
						<div class="person_item">
							<div class="person_pic">
								<img src="../imgs/1_161121160606313.jpg" alt="" />
							</div>
							<h3>Oliver</h3>
								<p>果粒网专业户外领队，专业骑行10余年，服务过多家沪上知名大型企业，具备专业的职业素养和户外知识，性格热情、阳光。</p>
								<div>服务过<span id="custom">420</span>客户</div>
						</div>
						<div class="person_item">
							<div class="person_pic">
								<img src="../imgs/1_161121160549311.jpg" alt="" />
							</div>
							<h3>东东</h3>
							<p>果粒网金牌户外教练，具备十年以上领队经验，曾在沪上知名大型拓展公司担任拓展培训师，熟练操作户外急救措施
性格开朗、热心、做事严谨。</p>
							<div>服务过<span id="custom">816</span>客户</div>
						</div>
					</li>
					<li  class="star_slider_two star_slider">
						<div class="person_item">
							<div class="person_pic">
								<img src="../imgs/1_161121160214637.jpg" alt="" />
							</div>
							<h3>丽丽</h3>
							<p>果粒网专业领队，08年加入人众人集团上海学校，一直活跃在培训第一线，丰富的工作经验，主攻心理咨询、EAP员工发展计划项目，热爱培训行业。</p>
								<div>服务过<span id="custom">1300</span>客户</div>
						</div>
						<div class="person_item">
							<div class="person_pic">
								<img src="../imgs/1_161121160309331.jpg" alt="" />
							</div>
							<h3>明明</h3>
							<p>果粒网专业户外领队，在常规场地，拓展野外项目以及室内体验式培训等方面均有丰富的实战经验曾参与主持过“思维定向”、“七巧板”等大型拓展培训课程。</p>
							<div>服务过<span id="custom">1500</span>客户</div>
						</div>
						<div class="person_item">
							<div class="person_pic">
								<img src="../imgs/1_161121160524766.jpg" alt="" />
							</div>
							<h3>小言</h3>
								<p>果粒网资深户外领队，热情阳光的80后大男孩，静如处子动如脱兔。有多年户外登山露营经验，服务过沪上多家大型团队的户外定向赛。</p>
								<div>服务过<span id="custom">412</span>客户</div>
						</div>
						<div class="person_item">
							<div class="person_pic">
								<img src="../imgs/1_161121160511677.jpg" alt="" />
							</div>
							<h3>元元</h3>
								<p>果粒网专业户外领队，极强的安全意识，获国际户外体验式培训国际认证及安全指导资质证，中国红十字会急救证书，曾在济南军区某部侦查大队服役。</p>
							<div>服务过<span id="custom">2100</span>客户</div>
						</div>
					</li>
					<li  class="star_slider_three star_slider">
						<div class="person_item">
						<div class="person_pic">
							<img src="../imgs/1_161121160431421.jpg" alt="" />
						</div>
						<h3>郭子</h3>
						<p>果粒网专业户外领队，丰富的团队拓展培训经验，多次带领客户野外生存挑战和徒步穿越，具有强烈使命感、责任心，极强的亲和力及应变能力。</p>
						<div>服务过<span id="custom">1620</span>客户</div>
					</div>
						<div class="person_item">
							<div class="person_pic">
								<img src="../imgs/1_161121160232398.jpg" alt="" />
							</div>
							<h3>小歪</h3>
							<p>果粒网专业户外领队，服务过数家企业团队、社团活动、亲子活动的户外徒步、骑行、定向赛活动。具有亲和力，深受客户好评。</p>
							<div>服务过<span id="custom">350</span>客户</div>
						</div>
						<div class="person_item">
							<div class="person_pic">
								<img src="../imgs/1_161121160404996.jpg" alt="" />
							</div>
							<h3>胖虎</h3>
							<p>果粒网专业户外领队，非常酷爱户外运动，有丰富的户外徒步经验。精于亲子活动策划，执行工作严谨却又不失幽默性格热情大方有“开心果”教练之美称。</p>
							<div>服务过<span id="custom">235</span>客户</div>
						</div>
						<div class="person_item">
							<div class="person_pic">
								<img src="../imgs/1_161121160321258.jpg" alt="" />
							</div>
							<h3>浩子</h3>
								<p>果粒网专业户外领队，曾服役于广州军区某英雄部队，擅长军事拓展、企业培训、魔训青少年素质培训及野外穿越有很好的服务意识和安全意识责任心强。</p>
							<div>服务过<span id="custom">1450</span>客户</div>
						</div>
					</li>
				</div>
			</ul>
			<div class="star_lead_btns">
				<div class="btn_left"></div>
				<div class="btn_right"></div>
			</div>
		</div>
		<!--尾部-->
	<div id="footer"></div>
	</body>
	<script src="../js/jquery.js"></script>
	<script>
	    $(document).ready(function(){
	        $("#header").load("header.html")
	        $("#footer").load("footer.html");
		    //首页自动轮播
		    var circles = $(".circle");
		    var sliders = $(".slider");
		    var index = 0;
		    var timer = null;
		    var _this = 0;
		    timer = setInterval(Next,3000);
			function Play(fadein,last){
				sliders.eq(last).fadeOut(0);
				circles.eq(last).removeClass("slider_active");
				sliders.eq(fadein).fadeIn(100);
				circles.eq(fadein).addClass("slider_active");
			}
			function Next(){
				index ++;
				if(index == 4){
					index = 0;
				}
				var last = index - 1;  //自动轮播时 的last
				Play(index,last);
				_this = index;  //保存hover前的最后那个index
			}
			circles.hover(function(){
				var index1 = $(this).index(".slider_box ul li");//获取到我hover的那个li的索引
				clearInterval(timer); //清楚定时器
				Play(index1,_this);  //停止定时器后 手动轮播(鼠标指到谁 显示谁)
				_this = index1;			//中间变量保存 索引
			},function(){
				index = _this;  //鼠标移出的时候  更新一下之前自动轮播的index 让他等于我们最后hover的那个所以
				timer = setInterval(Next,3000);  //再次启动定时器
			});
			//轮播图结束
			
			//底部轮播图
            var moveBox = $(".move_box");
            var moveNum_index = 0;
            var _timer = null;
            var index_left = 0;//接受hover时的moveNum_index
            var index_right = 0; //点击右滑按钮时  保存上次左滑按钮结束时的index_left
            function move_fn(i){
                var moveNum = 0;
                moveNum = -1220 * i;
                moveBox.css({left:moveNum + "px"});
            }
            function next(){
                moveNum_index ++;
                if(moveNum_index == 3){
                    moveNum_index = 0;
                }
                move_fn(moveNum_index);
                index_left = moveNum_index;
            }
            $(".btn_left, .btn_right").on("click",function(){
                if($(this).hasClass("btn_left")){
                    if(index_left == 2){
                        index_left = 2;
                    }else{
                        index_left++;
                    }
                    move_fn(index_left);
                    index_right = index_left;
                }else if($(this).hasClass("btn_right")){
                    if(index_right == 0){
                        index_right = 0;
                    }else{
                        index_right--;
                    }
                    move_fn(index_right);
                    index_left = index_right;
                }
            });

            $(".move_box li, .btn_left, .btn_right").hover(function(){
                clearInterval(_timer);
            },function(){
                moveNum_index = index_left
                _timer = setInterval(next,5000);
            })
		});
	</script>
</html>