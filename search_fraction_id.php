<?php session_start(); ?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body,td,th {
	font-size: 40px;
}
</style>
<body background="1.jpg">
<style type="text/css">
 </style>
  <div align="center"  valgin="middle">
  <h1><font color="blue">遊戲記錄</font>
  </h1>
  <hr color='#000000'>
<table border="1" align="center" cellpadding="4">
<tr><td align="center"><pre>玩家</pre></td><td align="center"><pre>城鎮</pre></td ><td align="center" ><pre>關卡</pre></td><td align="center"><pre>分數</pre></td><td align="center"><pre>時間</pre></td></tr>
  <?php
include("mysql_connect.inc.php");
$id = $_SESSION['username'];
        //若以下$id直接用$_SESSION['username']將無法使用
if($id!=null)
{
	$sql = "SELECT * FROM fraction where username='$id'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_row($result))
        {
				 echo "<pre><tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><tr></pre>";
        }
		echo "</br>";
}
?>
</table></br>
<input type="button" value="確定" style="width:140px;height:60px;font-size:40px;" onClick="location.href='member2.php'">
</br>
<div></body></html>



