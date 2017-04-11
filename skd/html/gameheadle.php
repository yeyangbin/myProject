<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>无标题</title>
</head>
<body>
	<?php
		// 接受用户信息
		$score = $_GET["score"];
		$openid = $_GET["openid"];
		$nickname = $_GET["nickname"];

		$db = new mysqli("localhost","root","123456");
		$db->select_db("wechat");
		$db->query("set names utf8");

		$sql = "SELECT * FROM skd WHERE openid = '{$openid}' ";
		$result = $db->query($sql);
		if (mysqli_num_rows($result) > 0) {
			$arr = mysqli_fetch_assoc($result);
			$oldscore = $arr["score"];
			if ($score > $oldscore) {
				$sql = "UPDATE skd SET score = '{$score}' WHERE openid = '{$openid}' ";
				$result = $db->query($sql);
				if ($db->affected_rows >0) {
					//echo $score;
					echo "更新成功";
				}else {
					echo "更新失败";
				}
			}else {
				echo "不需要更新";
			}
		}else {
			$sql = "INSERT INTO skd(openid,nickname,score) VALUES('{$openid}','{$nickname}','{$score}')";
			$result = $db->query($sql);
			if ($db->insert_id > 0) {
				echo "插入成功";
			}
			/*else {
				echo "插入失败";
			}*/
		}
	?>
</body>
</html>