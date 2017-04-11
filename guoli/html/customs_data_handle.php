<?php
	header("Content-Type:text/html;charset=utf-8");
	require("conn.php");
	$user = $_GET["person_name"];//姓名
	$phone = $_GET["person_telphone"];//电话
	$email = $_GET["person_email"];//邮箱
	$contact = $_GET["contact"];//最佳联系时间
	$team_type = $_GET["team_type"];//团队类型
	$active_content = $_GET["active_content"];//活动内容
	$team_theme = $_GET["team_theme"];//团建主题
	$citys = $_GET["citys"];//出发城市
	$purpose = $_GET["purpose"];//意向地
	$other = $_GET["other"];//其他
	$budget = $_GET["budget"];//单人预算
	$person_num = $_GET["person_num"];//出行人数
	$days = $_GET["days"];//出行天数
	$dates = $_GET["dates"];//出发日期
    $content = "";
    $theme = "";
	for($i = 0;$i < count($active_content);$i++){
		$content .= $active_content[$i]." ";
	}
	for($i = 0;$i<count($team_theme);$i++){
		$theme .= $team_theme[$i]." ";
	}
	$sql = "INSERT into submit_custom (id,name,telphone,dates,days,person_count,email,contact_time,type_team,active_content,citys,purpose,budget,other,team_theme) values (null,'{$user}','{$phone}','{$dates}','{$days}','{$person_num}','{$email}','{$contact}','{$team_type}','{$content}','{$citys}','{$purpose}','{$budget}','{$other}','{$theme}')";
	$result = $db->query($sql);
	if($db->affected_rows > 0){
		echo '{"err":0,"msg":"更新成功"}';
	}else{
		echo '{"err":1,"msg":"更新失败"}';
	}
?>