<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body background="1.jpg">
<form name="form" method="post" action="register_finish.php">
帳號：<input type="text" name="id" /> <br>
密碼：<input type="password" name="pw" /> <br>
再一次輸入密碼：<input type="password" name="pw2" /> <br>
會員姓名：<input type="text" name="name" /> <br>
會員編號：<input type="text" name="number" /> <br>
會員類型：<input type="text" name="member" /> <br>
地址：<input type="text" name="address" /> <br>
性別：<input type="text" name="gender" /> <br>
生日：<textarea name="birthday" cols="45" rows="5"></textarea> <br>
<input type="submit" name="button" value="確定" />
<input type="button" value="取消" onclick="location.href='member.php'">
</form>
</body>