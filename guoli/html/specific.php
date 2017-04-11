<?php
	require("conn.php");	
	$page = $_GET["page"]; 
	$sql = "SELECT * FROM case_specific WHERE id = {$page}";
	$res = $db->query($sql);	
	$arr = mysqli_fetch_assoc($res);
//	var_dump($arr);
?>

<!doctype html>
<html lang="zh-cn">
	<head>
	    <meta charset="utf-8">
	    <meta name="keywords" content="户外,徒步,骑行,人文,亲子,滑雪">
		<meta name="google-site-verification" content="ZRIqJ5yEOtfzmyJCs5FaiyFFQe1RsDLysEiiTGERVAU">
	    <title><?php echo $arr["h1"]; ?></title>
	    <link rel="stylesheet" href="../css/layout.css">
	    <link rel="stylesheet" href="../css/case.css">
        <style>
            .n_content_left ul a:nth-of-type(4) li {
                background-color: rgb(255,153,51);
            }
        </style>
	</head>
	<body>
	<div id="header">
	    <div class="h_content">
	        <!--左边logo-->
	        <div class="h_content_left">
	            <a href="index.html"></a>
	            <div></div>
	        </div>
	        <!--右边搜索-->
	        <div class="h_content_right">
	            <form id="h_form_search" action="post">
	                <div>
	                    <img src="../imgs/top/fangda.png" alt="" />
	                    <input class="h_text_input" type="text" name="search_top" placeholder="搜索目的地、路线、主题"/>
	                    <input class="h_search_input" type="button" value="搜索" />
	                </div>
	            </form>
	        </div>
	    </div>
	    <!--首页导航栏-->
	    <div class="nav">
	        <div class="n_content">
	            <div class="n_content_left">
	                <ul>
	                    <a href="index.html">
	                        <li>首页</li>
	                    </a>
	                    <a href="outdoor.html">
	                        <li>查线路</li>
	                    </a>
	                    <a href="custom.html">
	                        <li>要制定</li>
	                    </a>
	                    <a href="case.php">
	                        <li style="background-color: rgb(255,153,51);">用户说</li>
	                    </a>
	                </ul>
	            </div>
	            <div class="n_content_right">
	                <div class="n_phone">
	                    <img src="../imgs/top/phone.png" alt="" />
	                    <span>400-00-17940</span>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div id="specific_case">
	    <div class="s_c_header">
	        <h1>
	            <?php echo $arr["h1"]; ?>
	        </h1>
	        <ul class="C_tags">
	           <?php
            		$tags = json_decode($arr["tags"], true);
            		for ($i = 0; $i < count($tags); $i++) {
            	?>
            	<li><?php echo $tags[$i]; ?></li>
            	<?php
            		}
            	?>
	        </ul>
	        <p class="C_info">人数：<?php echo $arr["person"]; ?>人  ｜  天数：<?php echo $arr["time"]; ?>   ｜  车程：<?php echo $arr["distance"]; ?></p>
	    </div>
	    <div class="s_slider">
	        <div class="s_pic">
	            <ul>
	                <li>
	                    <img src="../imgs/case/<?php echo $arr["big_pic"]; ?> " alt="">
	                </li>
	            </ul>
	            <!--<a href=""></a>-->
	            <!--<a href=""></a>-->
	            <div class="s_num">
	                <ul>
	                    <li class="s_on"></li>
	                </ul>
	            </div>
	        </div>
	        <div class="introduction">
	            <div class="i_wrap">
	                <div class="i_logo">
	                    <img src="../imgs/case/<?php echo $arr["logo"]; ?> " alt="">
	                </div>
	                <div class="i_txt">
	                    <?php echo $arr["i_txt"]; ?> 
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="s_main">
	        <div class="m_left">
	            <div class="C_box m_wrap">
	                <div class="m_con">
	                	<?php
		            		$con = json_decode($arr["con"], true);
			            	for ($i = 0; $i < count($con); $i++) {
			            ?>
			            <img alt="" src="../imgs/case/<?php echo $con[$i]; ?>" />
			            <?php
			            	}
			            ?><!--	                  
	                    <img alt="" src="../imgs/case/20161121170929_19146.jpg" />
	                    <img alt="" src="../imgs/case/20161121170929_80066.jpg" />
	                    <img alt="" src="../imgs/case/20161121170929_55569.jpg" />
	                    <img alt="" src="../imgs/case/20161121170929_40788.jpg" />
	                    <img alt="" src="../imgs/case/20161121170929_77850.jpg" />-->
	                </div>
	                <div class="m_ico">
	                    <img src="../imgs/case/pic-expico.png" alt="">
	                </div>
	            </div>
	        </div>
	        <div class="m_right">
	            <div class="C_box m_say">
	                <div class="m_photo">
	                    <img src="../imgs/case/<?php echo $arr["user_pic"]; ?>" alt="">
	                </div>
	                <div class="m_saytxt">
	                    <dl>
	                        <dt>
	                            <strong>客户说：</strong>
	                        </dt>
	                        <dd>
	                            <?php echo $arr["user_txt"]; ?>
	                        </dd>
	                    </dl>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div id="footer">
	    <div class="f_Nav">
	        <div class="f_N_Left">
	            <div class="f_N_L_menu">
	                <a href="about.html">关于我们</a>
	                |
	                <a href="agreement.html">协议条款</a>
	                |
	                <a href="privacy.html">隐私政策</a>
	                |
	                <a href="help.html">帮助中心</a>
	                |
	                <a>服务热线：400-00-17940</a>
	            </div>
	            <div class="f_N_L_copyright">
	                <a>2016&copy;果粒网版权所有</a>
	                <a href="###">上海果粒国际旅行社有限公司</a>
	                <a href="http://www.miitbeian.gov.cn/">沪ICP备16007154号</a>
	            </div>
	        </div>
	        <div class="f_N_Right">
	            <img src="../imgs/footer/footer_ewm.png" alt="" width="106" height="106">
	            <p>扫一扫，关注我们</p>
	        </div>
	    </div>
	    <div class="f_Link">
	        <a href="http://www.zx110.org/" target="_blank">
	            <img src="../imgs/footer/footer_link_cx.png" alt="" width="98" height="55">
	        </a>
	        <a href="http://www.zx110.org/picp?sn=310108100038125" target="_blank">
	            <img src="../imgs/footer/footer_link_gb.png" alt="" width="98" height="55">
	        </a>
	        <a href="http://www.cyberpolice.cn/wfjb/" target="_blank">
	            <img src="../imgs/footer/footer_link_110.png" alt="" width="98" height="55">
	        </a>
	    </div>
	</div>
	</body>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/load_HeaderFooter.js"></script>
</html>