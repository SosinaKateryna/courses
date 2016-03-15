<?php
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }


if (empty($login) or empty($password)) 
{
exit ("Вы не ввели логин или пароль");
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

// Выбираем базу данных:
mysql_select_db($db)//параметр в скобках ("имя базы, с которой соединяемся")
 or die("<p>Ошибка выбора базы данных! ". mysql_error() . "</p>");


$result = mysql_query("SELECT id FROM users WHERE login='".$login."'");
$myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
	else{
	$result2 = mysql_query("INSERT INTO users (login,password) VALUES ('".$login."','".$password."')");
		if ($result2=='TRUE')
		{
			echo '<script type="text/javascript">'; 
		  	echo 'window.location.href="index.php";'; 
		   	echo '</script>'; ;
		}
		else {
		echo "Ошибка,проверьте ввод";
		     }
	 }




?>