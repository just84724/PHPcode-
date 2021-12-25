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
   </br></br><font color="blue"><h1>請輸入城鎮及關卡</h1></font></br><hr color='#000000'>
<?php
include("mysql_connect.inc.php");
if($_SESSION['username'] != null)
{
        //將$_SESSION['username']丟給$id
        //這樣在下SQL語法時才可以給搜尋的值
        $id = $_SESSION['username'];
        //若以下$id直接用$_SESSION['username']將無法使用
echo "<form name=\"form\" method=\"post\" action=\"search_fraction_id_level.php\">";
echo "城鎮：
<select name = \"town\" style=\"font-size:40px;\">
<option value=\"0\" selected=\"true\">請選擇城市</option>
<option value=\"航海城\">航海城</option>
<option value=\"天皇城\">天皇城</option>
<option value=\"天龍城\">天龍城</option>
</select><br/>";
echo "關卡：
<select name = \"level\" style=\"font-size:40px;\">
<option value=\"0\" selected=\"true\">請選擇關卡</option>
<option value=\"1\">第一關</option>
<option value=\"2\">第二關</option>
<option value=\"3\">第三關</option>
</select><br/>";
?></br><hr color='#000000'></br><?php
        echo "<input type=\"submit\" value=\"確定\" style=\"width:140px;height:60px;font-size:40px;\" />";
?>&nbsp;<input type="button" value="取消" style="width:140px;height:60px;font-size:40px;" onClick="location.href='member2.php'"><?php
echo "</form>";

}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
<div>
</body>