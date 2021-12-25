<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body background="1.jpg">
<?php
include("mysql_connect.inc.php");

$id = $_POST['id'];
if($_SESSION['username'] != null)
{
	$sql = "SELECT * FROM member_table where username like '%$id%'";
    $result = mysql_query($sql);
	while($row = mysql_fetch_row($result))
        {
                 echo "$row[0] - 名字(帳號)：$row[1], " . 
                 "電話：$row[3], 地址：$row[4], 備註：$row[5]<br>";
        }
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
echo "<form name=\"form\" method=\"post\" action=\"member.php\">";
echo "<input type=\"submit\" name=\"button\" value=\"取消\" />";
echo "</form>";
?></body>