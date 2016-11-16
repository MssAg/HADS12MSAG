<?php
session_start();

//if (isset($_POST['email'])){
if (isset($_SESSION['user'])){

$db_host="mysql.hostinger.es";
$db_user="u390657429_mikel";
$db_password="73737373";
$db_name="u390657429_quiz";
$db_table_name="Usuario";
$link = mysqli_connect($db_host, $db_user, $db_password, $db_name); 

if (!$link)
{
	die ("Fallo al intentar conectarse a MySQL".mysqli_error($link));
}

mysqli_select_db ($link ,$db_name ) or die(mysqli_error()); 

$email = $_SESSION['user'];
$pass = $_SESSION['pass'];

$usuarios = mysqli_query($link, "select * from Usuario where Email='$email' and Contrasena='$pass'"); 
$cont= mysqli_num_rows($usuarios);
if($cont==1)
{
	mysqli_close($link); 
	$db_host="mysql.hostinger.es";
	$db_user="u390657429_mikel";
	$db_password="73737373";
	$db_name="u390657429_quiz";
	$db_table_name="Preguntas";
	$link  = mysqli_connect($db_host, $db_user, $db_password, $db_name);
   
	//print_r($_POST);
	$ID = $_POST['ID'];
	$pregunta = $_POST['pregunta'];
	$respuesta = $_POST['respuesta'];
	$dificultad = $_POST['dificultad']; 
	$subject = $_POST['subject'];


	$sql="UPDATE Preguntas
	SET Pregunta='$pregunta', Respuesta='$respuesta', Dificultad='$dificultad', Subject='$subject', Email='$email'
	WHERE ID=$ID";
    
	if (!mysqli_query($link ,$sql))
	{
		die('Error: ' . mysqli_error($link));
	}

	echo "La pregunta se ha insertado correctamente";

	mysqli_close($link); 


 }	
else 	
{
	echo "ERROR DESCONOCIDO";
} 

}
?>


