<?php
	require("conn.php");
	$page = $_GET["page"];
	$sql = "SELECT * FROM outdoor WHERE id = {$page}";
	$res = $db->query($sql);
	$arr = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $arr["h1"]; ?></title>
		<link rel="stylesheet" href="../css/customize.css" />
		<link rel="stylesheet" type="text/css" href="../css/layout.css"/>
		<style>
			.n_content_left ul a:nth-of-type(2) li {
				background-color: rgb(255,153,51);
			}
		</style>
	</head>
	<body>
		<div id="header"></div>
		<div class="body_box">
			<div class="box_wrap">
				<!--上半部分------------------------------------------------------>
				<div class="wrap_up">
					<!--上半部分左边部分——————————————————————————————————————————-->
					<div class="left">
						<img src="../imgs/<?php echo $arr["pic"]; ?>" />
					</div>
					<!--上半部分右边部分——————————————————————————————————————————-->
					<div class="right">
						<h3><?php echo $arr["h1"]; ?></h3>
						<div class="plan-info-one">
							<label>行程：</label>
							<div class="con"><?php echo $arr["address"]; ?></div>
						</div>
						<div class="plan-info-one" style="margin-top: 5px;">
							<label>主题：</label>
							<div class="con">
								<ul class="tag">
                                    <?php
                                    $theme = json_decode($arr["theme"], true);
                                    for ($i = 0; $i < count($theme); $i++) {
                                        ?>
                                        <li><?php echo $theme[$i]; ?></li>
                                        <?php
                                    }
                                    ?>
								</ul>
							</div>
						</div>
						<div class="plan_price" style="color:#ff9900 ;">
						<label>
						    	<span>￥</span>
						    	<span style="font-size: 36px;"><?php echo $arr["price"]; ?></span>
						    	<span>/人起</span>
					    </label>
							<a class="price_info" href="###">
								<div class="pop_price">
									<ul>
										<li>1. 价格仅供参考，将根据您的定制要求（如人数，餐饮住宿要求、出行时间等）而上下浮动</li>
										<li>2. 此价格不包含机票、火车票等大交通费用</li>
									</ul>
								</div>
							</a>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<!--下半部分---------------------------------------------------->
				<div class="wrap_down">
					<!--下部左边详情部分--------------------------------------->
					<div class="details">
						<h4>果粒线路详情</h4>
						<div class="contene-box">
							<ul>
								<li>天数：<?php echo $arr["days"]; ?></li>
								<li>适合人数：<?php echo $arr["person"]; ?></li>
								<li>适合团队类型：<?php echo $arr["team"]; ?></li>
								<li>
                                    活动标签：<?php
                                    $theme = json_decode($arr["theme"], true);
                                    for ($i = 0; $i < count($theme); $i++) {
                                        ?>
                                    <?php echo $theme[$i]." "; ?>
                                    <?php
                                    }
                                    ?>
                                </li>
							</ul>
						</div>
					</div>
					<!--下部右边需求部分--------------------------------------->
                    <div class="require">
                        <h4><span class="orange">您的定制需求</span> ( <span class="orange">*</span> 为必填项)</h4>
                        <div class="require_box">
                            <ul>
                                <li>
                                    <span class="pd_r">出行天数：</span>
                                    <input style="width: 42px;height: 36px;" class="out_days input_text" type="text" value="5" data-type="number_days"/>&nbsp天
                                    <span class="tips_input"></span>
                                </li>
                                <li style="margin-top: 20px;margin-left: 42px;"><span class="orange">*</span>
                                    <span class="pd_r">出行人数：</span>
                                    <input data-type="number_num" style="width: 42px;height: 36px;" type="text" class="out_peoples input_text necessary_content"/>
                                    <span class="tips_input"></span>
                                </li>
                                <li style="margin-top: 26px;">
                                    <span class="pd_r">团队类型：</span>
                                    <select style="padding: 4px;" class="team_type_two">
                                        <option value="企业">企业</option>
                                        <option value="社团/学校">社团/学校</option>
                                        <option value="亲友">亲友</option>
                                        <option value="其他">其他</option>
                                    </select>
                                </li>
                                <li style="margin-left: 75px;margin-top: 34px;">
                                    <span class="pd_r">住宿：</span>
                                    <select class="hotels">
                                        <option value="经济型">经济型</option>
                                        <option value="社团/学校">三星级/舒适</option>
                                        <option value="四星级/高档">四星级/高档</option>
                                        <option value="五星级/豪华">五星级/豪华</option>
                                    </select>
                                </li>
                                <li style="margin-top: 28px;">
                                    <span class="orange">*</span>
                                    <span class="pd_r">出发城市:</span>
                                    <input data-type="Chinese" style="width: 127px;height: 36px;" type="text" class="start_citys input_text necessary_content"/>
                                    <span class="tips_input"></span>
                                </li>
                                <li style="margin-top: 19px;">
                                    <span class="orange">*</span>
                                    <span class="pd_r">出发日期:</span>
                                    <input data-type="date" style="width: 127px;height: 36px;" type="text"  class="start_dates input_text necessary_content"/>
                                    <span class="tips_input"></span>
                                </li>
                                <li style="margin-top: 20px;margin-left: 51px;">
                                    <span class="pd_r">单人预算：</span>
                                    <input data-type="number" style="width: 127px;height: 36px;" type="text" class="budget_one input_text"/>元
                                    <span class="tips_input"></span>
                                </li>
                                <li style="margin-top: 19px;">
                                    <span class="pd_r">其他需求：</span>
                                    <input style="height: 36px;" type="text" class="other_" size="60" placeholder="可填写行程目的，用餐标准，摄影摄像等内容" />
                                </li>
                            </ul>
                        </div>
                        <h4 style="margin-top:30px;"><span class="orange">您的联系方式</span></h4>
                        <div class="require_box">
                            <ul>
                                <li style="margin-top: 10px;">
                                    <span class="orange star-size">*</span>
                                    <span>姓名：</span>
                                    <input data-type="name" style="padding: 10px 0;" type="text"  placeholder="姓名" class="person_name_two input_text necessary_content"/>
                                    <span class="tips_input"></span>
                                </li>
                                <li style="margin-top: 20px;">
                                    <span class="orange star-size">*</span>
                                    <span>电话：</span>
                                    <input data-type="number_phone" style="padding: 10px 0;" type="text" class="telphone_two input_text necessary_content" placeholder="手机号" />
                                    <span class="tips_input"></span>
                                </li>
                                <li style="margin-left: 63px;margin-top: 19px;">
                                    <span>邮箱：</span>
                                    <input data-type="email" style="padding: 10px 0;" type="text" class="email_two input_text" placeholder="邮箱" />
                                    <span class="tips_input"></span>
                                </li>
                                <li style="margin-top: 19px;margin-bottom: 25px;">
                                    <span>验证码：</span>
                                    <input style="padding: 10px 0;" size="6" class="yzm" value="" />
                                    <img src="11.png" alt="验证码"/>
                                    <a class="change" href="###">换一张</a>
                                </li>
                            </ul>
                        </div>
                        <input class="sub_btn" type="button" value="提交需求" />
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div id="footer"></div>
    </body>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script src="../js/load_HeaderFooter.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(function(){
            var inputs = $(".input_text");
            inputs.blur(function(){
                var index = inputs.index($(this));
                if($(this).hasClass("necessary_content")){
                    //说明是必须
                    if($(this).val() == ""){
                        $(".tips_input").eq(index).text("该项不能为空！");
                    }else{
                        $(".tips_input").eq(index).text("");
                        var val = $(this).val();
                        var type = $(this).attr("data-type");
                        decideFunction(val,type,index);
                    }
                }else{
                    //不是用户必须输入的
                    if(!$(this).val() == ""){
                        var val = $(this).val();
                        var type = $(this).attr("data-type");
                        decideFunction(val,type,index);
                    }
                }
            })
            //正则函数
            function decideChar(str,reg){
                return reg.test(str);//结果
            }
            function decideFunction(val,type,index){
                if(type == "number_days"||type=="number_num"||type == "date"||type=="number"){//出行天数
                    var reg = /^[0-9]+.?[0-9]*$/;
                    if(decideChar(val,reg)){
                        $(".tips_input").eq(index).text("");
                    }else{
                        $(".tips_input").eq(index).text("请输入正确的格式！");
                    }
                }else if(type == "Chinese"){
                    var reg = /[\u4E00-\u9FA5\uF900-\uFA2D]/;
                    if(decideChar(val,reg)){
                        $(".tips_input").eq(index).text("");
                    }else{
                        $(".tips_input").eq(index).text("请输入正确的城市！");
                    }
                }else if(type == "name"){
                    var reg = /[\u4E00-\u9FA5\uF900-\uFA2D]/;
                    if(decideChar(val,reg)){
                        $(".tips_input").eq(index).text("");
                    }else{
                        $(".tips_input").eq(index).text("请输入正确的姓名！");
                    }
                }else if(type == "number_phone"){
                    reg = /^1(3|4|5|7|8)\d{9}$/;
                    if(decideChar(val,reg)){
                        $(".tips_input").eq(index).text("");
                    }else{
                        $(".tips_input").eq(index).text("请输入正确的号码！");
                    }
                }else if(type == "email"){
                    reg = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/;
                    if(decideChar(val,reg)){
                        $(".tips_input").eq(index).text("");
                    }else{
                        $(".tips_input").eq(index).text("请输入正确的邮箱！");
                    }
                }
            }
            $(".sub_btn").on("click",function(){
                var num_empty = 0;
                for(let i =0;i<$(".necessary_content").length;i++){
                    if($(".necessary_content").eq(i).val()==""){
                        $(".necessary_content + .tips_input").eq(i).text("该项不能为空")
                        num_empty++;
                    }
                }
                if(num_empty == 0){
                    $.ajax({
                        type:"get",
                        url:"customize_data_handle.php",
                        data:{
                            out_days:$(".out_days").val(), //出行天数
                            out_peoples:$(".out_peoples").val(),//出行人数
                            team_type_two:$(".team_type_two option:selected").val(),//团队类型
                            hotels:$(".hotels option:selected").val(), //宾馆
                            start_citys:$(".start_citys").val(),//出发城市
                            start_dates:$(".start_dates").val(),//出发日期
                            budget_one:$(".budget_one").val(),//预算
                            other_:$(".other_").val(),
                            person_name_two:$(".person_name_two").val(),
                            telphone_two:$(".telphone_two").val(),
                            email_two:$(".email_two").val()
                        },success:function(str){
                            var obj = $.parseJSON(str);
                            if(obj.err == 0){
                                alert("恭喜您，制定成功!");
                            }
                        }
                    });
                }
            })
        });
    </script>
</html>