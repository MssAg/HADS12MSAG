<?php
	session_start();	
	
	if($_SESSION['usertype'] != "seguro" ){ 
		header("location:layout.html");
		exit();
	} 

$db_host="mysql.hostinger.es";
$db_user="u390657429_mikel";
$db_password="73737373";
$db_name="u390657429_quiz";
$db_table_name="Usuario";
	$link = mysqli_connect($db_host, $db_user, $db_password, $db_name); 

if (isset($_POST['pass1']))
{

	$email = $_SESSION['user'];
	$pass = utf8_decode($_POST['pass1']);
	$password = password_hash($pass, PASSWORD_DEFAULT);

	if (!$link)
	{
		die ("Fallo al intentar conectarse a MySQL".mysqli_error($link));
	}

	mysqli_select_db ($link ,$db_name ) or die(mysqli_error()); 

	$usuarios = mysqli_query($link, "select * from Usuario where Email='$email'"); 

	$cont= mysqli_num_rows($usuarios);
	if( ($cont==1) )
		{
			mysqli_query($link,"update Usuario set Contrasena='$password' WHERE Email='$email'");
			echo "<script languaje='javascript'>alert('La contraseña se ha actualizado correctamente!!')</script>";
			session_destroy();
		}	
	else 
	{
		echo "<script languaje='javascript'>alert('ERROR!!  Intentalo de nuevo amigo')</script>";	
		
	}
}
	mysqli_close($link); 
?>
<br>
<p align="center"><a href='cambiarcontrasena.html'>Volver</a></p>
<br>
<p align="center"><a href='logout.php'>Pagina Principal</a></p>