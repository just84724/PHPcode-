<?php

// �����û����ͷ���
$UserID=$_POST["username"];			// user name
$hiscore=$_POST["score"];
$hiGscore=$_POST["Gscore"];				// user score

// �������ݿ�
$myData=mysqli_connect( "localhost" ,"root" ,"bio1234" );
if ( mysqli_connect_errno()) 
{
	echo mysqli_connect_error();
	return;
}

// У���û����Ƿ�Ϸ�(��ֹSQLע��)
$UserID=mysqli_real_escape_string($myData,$UserID);

// ѡ�����ݿ�
mysqli_query($myData,"set names utf8") ;
mysqli_select_db( $myData ,"myscoresdb" );


// ����������
$sql="insert into hiscores value( NULL, '$UserID','$hiscore','$hiGscore')";
mysqli_query($myData,$sql);

//???�u?
mysqli_close($myData); 

echo 'upload '.$UserID.":".$hiscore.":".$hiGscore;

?>