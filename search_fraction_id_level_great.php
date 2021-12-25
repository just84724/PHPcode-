<?php session_start(); ?>
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
  </br></br>
  <h1><font color="blue">關卡最佳紀錄</font>
  </h1>
  <hr color='#000000'>  
  <table border="1" align="center" cellpadding="4">
<tr><td align="center"><pre>玩家</pre></td><td align="center"><pre>城鎮</pre></td ><td align="center" ><pre>關卡</pre></td><td align="center"><pre>分數</pre></td><td align="center"><pre>時間</pre></td></tr>
<?php
include("mysql_connect.inc.php");
$id = $_SESSION['username'];
$town=$_POST['town'];
$level=$_POST['level'];
if($_SESSION['username'] != null)
{
	$sql = "SELECT * FROM fraction where town ='$town' AND level = $level AND username='$id' order by hiscore DESC LIMIT 1";
    $result = mysql_query($sql);
	while($row=mysql_fetch_row($result))
        {
			
                 echo "<pre><tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><tr></pre>";
			
		}
}?>
</table>
</br>
<input type="button" value="確定" style="width:140px;height:60px;font-size:40px;" onClick="location.href='member2.php'">
<div></body>


