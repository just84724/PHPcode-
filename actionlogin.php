﻿<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body background="1.jpg">
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("mysql_connect.inc.php");
$id = $_POST['user'];
$pw = $_POST['pass'];

//搜尋資料庫資料
$sql = "SELECT * FROM member_table where username = '$id'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($id != null && $pw != null && $row[0] == $id && $row[1] == $pw&&$row[8]=="o")
{
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['username'] = $id;
        echo '登入成功!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=member.php>';
}
else if($id != null && $pw != null && $row[0] == $id && $row[1] == $pw&&$row[8]=="x")
{
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['username'] = $id;
        echo '登入成功!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=member.php>';
}
else
{
        echo '登入失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?></body>