<?php
$db_host="mysql.hostinger.es";
$db_user="u390657429_mikel";
$db_password="73737373";
$db_name="u390657429_quiz";
$db_table_name="Usuario";
   $db_connection = mysqli_connect($db_host, $db_user, $db_password,$db_name);
 
if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}
$subs_name = $_POST[name];
$subs_last = $_POST[apellido];
$subs_email = $_POST[mail];
$subs_telef = $_POST[telefono];
$subs_pass = $_POST[pass];
$subs_esp = $_POST[especialidad];

	

$retry_value = mysqli_query($db_connection, 'INSERT INTO Usuario (Nombre, Apellido, Email, Telefono, Contrasena, Especialidad) VALUES ($subs_name, $subs_last, $subs_email,$subs_telef,$subs_pass, $subs_esp)');

 
if (!$retry_value) {
   echo "test";
   header('Location: fail.html');
   mysql_close($db_connection);
}
	
header('Location: VerUsuarios.php');

 
mysql_close($db_connection);
		
?>				