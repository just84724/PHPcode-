<?php

// �������ݿ�
$myData=mysqli_connect( "localhost" ,"root" ,"bio1234" );
if ( mysqli_connect_errno())
{
	echo mysqli_connect_error();
	return;
}

// ѡ�����ݿ�
mysqli_query($myData,"set names utf8") ;
mysqli_select_db( $myData ,"myscoresdb" );


// ��Ѷ
$sql = "SELECT * FROM hiscores ORDER by score DESC LIMIT 20 ";

$result = mysqli_query($myData,$sql)or die("<br>SQL error!<br/>");
$num_results = mysqli_num_rows($result);

// ׼���������ݵ�Unity
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
	//�����û����͵÷�
//echo $data[$i][0];
	//echo $data[$i][1];
	
}

mysqli_free_result($result);

// �ر����ݿ�
mysqli_close($myData); 

// ����
echo  json_encode($arr);

?>