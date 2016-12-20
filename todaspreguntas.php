 <?php
session_start();	
	
if($_SESSION['usertype'] != "alumno" )
{ 
	header("location:layout.html");
	exit();
} 	
	$db_host="mysql.hostinger.es";
	$db_user="u390657429_mikel";
	$db_password="73737373";
	$db_name="u390657429_quiz";
	$db_table_name="Usuario";
	$link = mysqli_connect($db_host, $db_user, $db_password, $db_name); 
	
	$email = $_SESSION['user'];
	
	$usuarioautenticado = mysqli_query($link, "select * from Preguntas where Email='$email'"); 
	$cont1= mysqli_num_rows($usuarioautenticado);
	
	$usuarios = mysqli_query($link, "select * from Preguntas"); 
	$cont2= mysqli_num_rows($usuarios);
	echo "<h6>Mis Preguntas/Todas las preguntas:  " .$cont1. " / ".$cont2."<h6>";
	
	mysqli_close($link);
		
?>
