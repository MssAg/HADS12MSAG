<?php
$db_host="mysql.hostinger.es";
$db_user="u390657429_mikel";
$db_password="73737373";
$db_name="u390657429_quiz";
$db_table_name="Usuario";
$link  = mysqli_connect($db_host, $db_user, $db_password, $db_name);
   
$subs_name = utf8_decode($_POST['name']);
$subs_last = utf8_decode($_POST['apellido']);
$subs_email = utf8_decode($_POST['mail']); 
$subs_telef = utf8_decode($_POST['telefono']);
$subs_pass = utf8_decode($_POST['pass']);
$subs_esp = utf8_decode($_POST['especialidad']);
$subs_otro = utf8_decode($_POST['otro']);

if (!filter_var($subs_email,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[a-z]+[0-9]{3}@ikasle.ehu.(es|eus)$/"))))
{
   die('Error: El correo es incorrecto');
}

if ($subs_esp == otros){
	
	$subs_esp = $subs_otro;
}
$sql="INSERT INTO Usuario(Nombre, Apellido, Email, Contrasena, Telefono, Especialidad) 
VALUES ('$subs_name','$subs_last','$subs_email','$subs_pass','$subs_telef','$subs_esp')";
    
if (!mysqli_query($link ,$sql))
{
	die('Error: ' . mysqli_error($link));
}

header("Location: ok.html");

mysqli_close($link); 
?>