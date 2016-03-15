<?php
session_start();?>
<html>
<head>
<title>Главная</title>
</head>
<body>
<form action="testreg.php" method="post">
  <p>
    <label>Логин:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
  </p>
  <p>
    <label>Пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
  </p>
<p>
<input type="submit" name="submit" value="Войти">
<br>
<a href="reg.php">Зарегестрироватся</a> 
</p></form>
<br>
</body>
</html>
