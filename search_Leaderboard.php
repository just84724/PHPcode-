<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>排行榜</title>
<style type="text/css">
body,td,th {
	font-size: 40px;
}
</style>
<body background="1.jpg">
<style type="text/css">

 </style>
  <div align="center"  valgin="middle">
  <h1><font color="blue">排行榜</font>
  </h1>
  <hr color='#000000'>
<table border="1" align="center" cellpadding="4">
<tr><td align="center"><pre>玩家</pre></td><td align="center"><pre>城鎮</pre></td ><td align="center" ><pre>關卡</pre></td><td align="center"><pre>分數</pre></td><td align="center"><pre>時間</pre></td></tr>
<?php
include("mysql_connect.inc.php");
$sql = "SELECT * FROM fraction order by hiscore DESC LIMIT 10";
	$result = mysql_query($sql);

while($row = mysql_fetch_row($result)){  
//判斷是否還有資料沒有取完，如果取完，則停止while迴圈。
echo "<pre><tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><tr></pre>";
}
?>
</table></br>
<input type="button" value="確定" style="width:140px;height:60px;font-size:40px;" onclick="location.href='member2.php'">
</div>
</body>
