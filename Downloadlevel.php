
<?php

// 连接数据库
include("mysql_connect.inc.php");


// 查讯
	$sql = "SELECT * FROM fraction where username='$id'order by level DESC LIMIT 1";
	$result = mysql_query($sql);

// 准备发送数据到Unity
$arr =array();

for($i = 0; $i < $num_results; $i++)
{
	$row = mysqli_fetch_array($result);

	$id=$row['username'];
	$town=$row['town'];
	$level=$row['level'];
	$hiscore=$row['hiscore'];
	$time=$row[time];
	$arr[$id]['id']=$id;
	$arr[$town]['town']=$town;
	$arr[$level]['level']=$level;
	$arr[$id]['hiscore']=$hiscore;
	$arr[$time]['time']=$time;
	//发送用户名和得分
	//echo $data[$i][0];
	//echo $data[$i][1];
	
}


// 发送
echo  json_encode($arr);

?>	