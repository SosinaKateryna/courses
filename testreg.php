<?php
session_start();

if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

if (empty($login) or empty($password)) 
{
exit ("Error!Empty password or login");
}
$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

$login = trim($login);
$password = trim($password);


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
 
mysql_select_db($db)//параметр в скобках ("имя базы, с которой соединяемся")
 or die("<p>Ошибка выбора базы данных! ". mysql_error() . "</p>");
$result = mysql_query("SELECT * FROM users WHERE login='".$login."'"); 
$myrow = mysql_fetch_array($result);
if (empty($myrow['password']))
{
exit ("Логин или пароль не правильный");
}
else {
          if ($myrow['password']==$password) {
          $_SESSION['login']=$myrow['login']; 
          $_SESSION['id']=$myrow['id'];
          echo '<script type="text/javascript">'; 
		  echo 'window.location.href="todo.php?id='.$_SESSION['id'].'";'; 
		   echo '</script>'; ;
    }else {
        exit ("Логин или пароль не правильный");
	}
}
?>
