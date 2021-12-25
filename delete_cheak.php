<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body,td,th {
	font-size: 40px;
	
}
</style>
 <div align="center"  valgin="middle">
<body background="1.jpg">
<style type="text/css">

</style>
<h1></br></br>
<?php
include("mysql_connect.inc.php");
$id = $_POST['id'];
$sql1="SELECT*FROM member_table where username='$id'";
$result1= mysql_query($sql1);
$row1=@mysql_fetch_row($result1);
if($_SESSION['username'] != null)
{
	if($id !=null){
		if($id !=null&&$row1[0]==$id)
		{
		//刪除資料庫資料語法
?><font color="blue">確定是否刪除:</font></br>
<table border="1" align="center" cellpadding="4">
<tr><td align="center"><pre>玩家</pre></td><td align="center"><pre>密碼</pre></td ><td align="center" ><pre>電話</pre></td><td align="center"><pre>地址</pre></td><td align="center"><pre>備註</pre></td></tr>
<?php 
echo "<pre><tr><td>$row1[0]</td><td>$row1[1]</td><td>$row1[2]</td><td>$row1[3]</td><td>$row1[4]</td><tr></pre>";?></table><hr color='#000000'><?php
echo "<form name=\"form\" method=\"post\" action=\"delete_finish.php\">";
echo "<input type=\"hidden\" name=\"id\" style=\"width:360px;height:40px;font-size:40px;\" maxlength=\"16\" value=\"$id\" />";			
echo "<input type=\"submit\" value=\"確定\" style=\"width:140px;height:60px;font-size:40px;\" />";
?>&nbsp;<input type="button" value="取消" style="width:140px;height:60px;font-size:40px;" onClick="location.href='member.php'"><?php
echo "</form>";
       		
			}else{?> <h1><font color="red"><?php
                echo '刪除失敗,無此帳號';?></font></h1></strong><?php
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
		}
		
        
}else{
	?> <h1><font color="red"><?php
                echo '未輸入資料';?></font></h1></strong><?php
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
	
	}
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?></h1></div></body>