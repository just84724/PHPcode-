<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body background="1.jpg">
<?php
include("mysql_connect.inc.php");
echo "<form name=\"form\" method=\"post\" action=\"logout.php\">";
echo "<input type=\"submit\" name=\"button\" value=\"登出\" /><br><br>";

//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
if($_SESSION['username'] != null)
{
        ?><input type="button" value="修改" onclick="location.href='update2.php'"><?php
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?></body>