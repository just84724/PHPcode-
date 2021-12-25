<?php session_start(); ?>
<!DOCTYPE>
<html>
<head>
<meta charset="utf-8" />
<title>login</title>
</head>
<body background="1.jpg">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
echo "<form name=\"form\" method=\"post\" action=\"logout.php\">";
echo "<input type=\"submit\" name=\"button\" value=\"登出\" /><br><br>";

		?><input type="button" value="新增" onclick="location.href='register2.php'">
		<input type="button" value="修改" onclick="location.href='update.php'">
		<input type="button" value="刪除" onclick="location.href='delete.php'">
		<input type="button" value="查詢" onclick="location.href='search.php'"><?php

?></body>
</html>