<?php

// 连接数据库
$myData=mysqli_connect( "localhost" ,"root" ,"bio1234" );
if ( mysqli_connect_errno())
{
	echo mysqli_connect_error();
	return;
}

// 选择数据库
mysqli_query($myData,"set names utf8") ;
mysqli_select_db( $myData ,"myscoresdb" );


// 查讯
$sql = "SELECT * FROM hiscores ORDER by score DESC LIMIT 20 ";

$result = mysqli_query($myData,$sql)or die("<br>SQL error!<br/>");
$num_results = mysqli_num_rows($result);

// 准备发送数据到Unity
$arr =array();

for($i = 0; $i < $num_results; $i++)
{
	$row = mysqli_fetch_array($result ,MYSQLI_ASSOC);

	$id=$row['id'];
	$username=$row['username'];
	$score=$row['score'];
	$Gscore=$row['Gscore'];
	$arr[$id]['id']=$id;
	$arr[$id]['username']=$username;
	$arr[$id]['score']=$score;
	$arr[$id]['Gscore']=$Gscore;
	//发送用户名和得分
//echo $data[$i][0];
	//echo $data[$i][1];
	
}

mysqli_free_result($result);

// 关闭数据库
mysqli_close($myData); 

// 发送
echo  json_encode($arr);

?>