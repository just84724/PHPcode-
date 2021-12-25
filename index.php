<!DOCTYPE>
<html>
<head>
<meta charset="utf-8" />
<title>login</title>
<style type="text/css">
body,td,th {
	font-size: 40px;
	text-align: center;
}
</style>
</head>
<body background="1.jpg">
<style type="text/css">
 </style>
  <div align="center"  valgin="middle">
  </br></br>
  <h1><font color="blue">請登入</font></br>
  </h1>
  <hr color='#000000'></br>
  <form name="login" method="post" action="actionlogin.php">
  <p>使用者:
    <input type="text" name="user" style="width:360px;height:40px;font-size:40px;" maxlength="16" />
  </p>
  <p>密碼:&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="password" name="pass" style="width:360px;height:40px;font-size:40px;" maxlength="16"/><br/>
    </br>
  </p>
  <hr color='#000000'></br>
  <input type="submit" value="登入" style="width:140px;height:60px;font-size:40px;" />
  <input type="button" value="註冊" style="width:140px;height:60px;font-size:40px;" onClick="location.href='register.php'">
</form>
</div>

</html>

