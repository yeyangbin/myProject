<?php
	$db = new mysqli("localhost","root","123456");
	$db->select_db("wechat");
	$db->query("set names utf8");

	$sql = "SELECT * FROM skd ORDER BY score DESC";
	$result = $db->query($sql);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta charset="UTF-8">
	<title>排行榜</title>
	<style type="text/css">
		img{
			width: 66px;
		}
	</style>
</head>
<body>
	<table border="1" cellspacing="0" collapsing="0">
		<tr>
			<td>名次</td>
			<td>昵称</td>
			<td>头像</td>
			<td>分数</td>
		</tr>
		<?php 
			$num = 0;
			while($arr = mysqli_fetch_assoc($result)){
				$num++;
		?>
		<tr>
			<td><?php echo $num; ?></td>
			<td><?php echo $arr["nickname"]; ?></td>
			<td><img src="<?php echo $arr["headimgurl"]; ?>" alt=""></td>
			<td><?php echo $arr["score"]; ?></td>
		</tr>

		<?php
			}
		?>
		
	</table>
</body>
</html>