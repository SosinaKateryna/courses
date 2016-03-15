<?php
$host = "db3.ho.ua";
$user = "rubygarage";
$pass = "awdasd";
$db="rubygarage";
// Производим попытку подключения к серверу MySQL:
$dbcnx=@mysql_connect($host, $user, $pass); 
if (!$dbcnx) //если дескриптор равен 0, соединение не установлено 
{ 
exit("<p>В настоящий момент сервер базы данных недоступен</p>"); 
} 

// Выбираем базу данных:
mysql_select_db($db)//параметр в скобках ("имя базы, с которой соединяемся")
 or die("<p>Ошибка выбора базы данных! ". mysql_error() . "</p>");
 $result2 = mysql_query("Update users set projects= '".$_POST['mas']."' where id=".$_POST['id']."");

?>