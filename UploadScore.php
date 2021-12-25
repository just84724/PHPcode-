<?php

// 读入用户名和分数
$UserID=$_POST["username"];			// user name
$hiscore=$_POST["score"];
$hiGscore=$_POST["Gscore"];				// user score

// 连接数据库
$myData=mysqli_connect( "localhost" ,"root" ,"bio1234" );
if ( mysqli_connect_errno()) 
{
	echo mysqli_connect_error();
	return;
}

// 校验用户名是否合法(防止SQL注入)
$UserID=mysqli_real_escape_string($myData,$UserID);

// 选择数据库
mysqli_query($myData,"set names utf8") ;
mysqli_select_db( $myData ,"myscoresdb" );


// 插入新数据
$sql="insert into hiscores value( NULL, '$UserID','$hiscore','$hiGscore')";
mysqli_query($myData,$sql);

//???誹?
mysqli_close($myData); 

echo 'upload '.$UserID.":".$hiscore.":".$hiGscore;

?>