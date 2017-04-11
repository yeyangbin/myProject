<?php
	header("Content-Type:text/html;charset=utf-8");
	require("conn.php");
	$out_days = $_GET["out_days"]; //出行天数1
	$out_peoples = $_GET["out_peoples"];//出行人数1
	$team_type_two = $_GET["team_type_two"];//团队类型1
	$hotels = $_GET["hotels"];//住宿
	$start_citys = $_GET["start_citys"];//出发城市1
	$start_dates = $_GET["start_dates"];//出发日期1
	$budget_one = $_GET["budget_one"];//单人预算1
	$other_ = $_GET["other_"];//其他需求1
	$person_name_two = $_GET["person_name_two"];//姓名1
	$telphone_two = $_GET["telphone_two"];//电话1
	$email_two = $_GET["email_two"];//邮箱1
	
	$sql = "insert into submit_custom (id,name,telphone,dates,days,person_count,email,type_team,citys,budget,other,hotel) values (null,'{$person_name_two}','{$telphone_two}','{$start_dates}','{$out_days}','{$out_peoples}','{$email_two}','{$team_type_two}','{$start_citys}','{$budget_one}','{$other_}','{$hotels}')";
	$result = $db->query($sql);
	if($db->affected_rows > 0){
		echo '{"err":0,"msg":"提交成功"}';
	}else{
		echo '{"err":1,"msg":"提交失败"}';
	}
?>