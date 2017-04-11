<?php
	require("conn.php");
//	if($_GET["arr"] == "desc") {
//		$sql = "SELECT * FROM outdoor ORDER BY price desc";	
//		$res = $db->query($sql);		
//		$array = array();
//		if(mysqli_num_rows($res) > 0){
//			while($arr = mysqli_fetch_assoc($res)){
//				$array[] = $arr;
//			}
//			echo json_encode($array, JSON_UNESCAPED_UNICODE);
//		}else {
//			echo '{"err":"1","msg":"获取失败"}';
//		}
//	}else if($_GET["arr"] == "esc") {
//		$sql = "SELECT * FROM outdoor ORDER BY price";	
//		$res = $db->query($sql);		
//		$array = array();
//		if(mysqli_num_rows($res) > 0){
//			while($arr = mysqli_fetch_assoc($res)){
//				$array[] = $arr;
//			}
//			echo json_encode($array, JSON_UNESCAPED_UNICODE);
//		}else {
//			echo '{"err":"1","msg":"获取失败"}';
//		}
//	}else {
		$arr = $_GET["arr"];
		function con($con){
			$cons = array();	
			if ($con[0] != "不限" ) {
				$cons["area"] = " like "."'".$con[0]."'";
			}
			else {
				$cons["area"] = " like "."'%'";
			}
			if ($con[1] != "不限" ) {
				$cons["theme"] = " like "."'%".$con[1]."%'";
			}
			else {
				$cons["theme"] = " like "."'%'";
			}
			if ($con[2] != "不限" ) {
				if ($con[2] == "600元以下") {
					$cons["price"] = " < 600";
				}
				if ($con[2] == "600-1200元") {
					$cons["price"] = " BETWEEN 600 AND 1200";
				}
				if ($con[2] == "1200-2000元") {
					$cons["price"] = " BETWEEN 1200 AND 2000";
				}
				if ($con[2] == "2000-3500元") {
					$cons["price"] = " BETWEEN 2000 AND 3500";
				}
				if ($con[2] == "3500元以上") {
					$cons["price"] = " > 3500";
				}
			}else {
				$cons["price"] = " > 0";
			}				
			if ($con[3] != "不限" ) {
			    if ($con[3] == "当天返回" ) {
                    $cons["day"] = " BETWEEN 0 AND 2.0 ";
                }
                if ($con[3] == "2天1夜" ) {
                    $cons["day"] = " BETWEEN 2.0 AND 3.1 ";
                }
                if ($con[3] == "3天2夜" ) {
                    $cons["day"] = " BETWEEN 3.1 AND 4.2 ";
                }
                if ($con[3] == "4天3夜及以上" ) {
                    $cons["day"] = " > 4.2 ";
                }
			}else {
				$cons["day"] = " > 0 ";
			}		
			return $cons;		
		}	
		$cons = con($arr);
	
	    $s="";
		foreach ($cons as $key => $val ) {
			$c = $key.$val;
			$s= $s.$c." and ";		
		}	
		$c=rtrim($s,'and ');
		
	//	echo $sql;
        $pagenum = $_GET["page"];
        if ($pagenum == 1 || $pagenum == "") {
            $pagenum = 0;
        }else {
            $pagenum = ($pagenum - 1)  * 10;
        }

		if ($c) {
			if($_GET["sort"] == "") {
				$sql = "SELECT * FROM outdoor WHERE $c LIMIT $pagenum,10";
			}else if ($_GET["sort"] == "desc") {
				$sql = "SELECT * FROM outdoor WHERE $c ORDER BY price DESC LIMIT $pagenum,10";
			}else if ($_GET["sort"] == "esc") {
				$sql = "SELECT * FROM outdoor WHERE $c ORDER BY price LIMIT $pagenum,10";
			}
		}else{
			if ($_GET["sort"] == "desc") {
				$sql = "SELECT * FROM outdoor WHERE $c ORDER BY price DESC LIMIT $pagenum,10";
			}else if ($_GET["sort"] == "esc") {
				$sql = "SELECT * FROM outdoor WHERE $c ORDER BY price LIMIT $pagenum,10";
			}
		}
		
//		echo $sql;
		$res = $db->query($sql);

		$array = array();
		if(mysqli_num_rows($res) > 0){
			while($arr = mysqli_fetch_assoc($res)){
				$array[] = $arr;
			}
			echo json_encode($array, JSON_UNESCAPED_UNICODE);
		}else {
			echo '{"err":"1","msg":"获取失败"}';
		}
?>