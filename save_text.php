<?php
$db_host="db3.ho.ua";
$db_name="rubygarage";
$username="rubygarage";
$password="awdasd";



$db_con=mysql_connect($db_host,$username,$password);
$connection_string=mysql_select_db($db_name);
// Connection
mysql_connect($db_host,$username,$password);
mysql_select_db($db_name);

if(isset($_GET['newText'])){
$newText= $_GET['newText'];
$insertText_sql = 'INSERT INTO MYTABLE (newText) VALUES('. $newText .')';
$insertText= mysql_query($insertText_sql) or die(mysql_error());
echo $newText;
} else { 
echo 'Error! Please fill all fileds!';
}
?>