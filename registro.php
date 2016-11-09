<?php
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');

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

$soapclient1 = new nusoap_client( 'http://cursodssw.hol.es/comprobarmatricula.php?wsdl',true);

$result1 = $soapclient1->call('comprobar', array('x'=>$_POST['mail']));

$soapclient2 = new nusoap_client('http://swma.esy.es/ProyectoSW/comprobarcontrasena.php?wsdl', false);

$result2 = $soapclient2->call('comprobarpass', array('pass'=>$_POST['pass']));


if ($result1 == "SI" && $result2 == "VALIDA"){

	if (!filter_var($subs_email,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[a-z]+[0-9]{3}@ikasle.ehu.(es|eus)$/"))))
	{
	      die('Error: El correo es incorrecto');
	}

	if(empty($subs_name)){	
		die( '' );	
	}
	
	if(empty($subs_last)){		
		die('');
	}

	if(empty($subs_telef)){		
		die('');
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
        echo "<script languaje='javascript'>alert('REGISTRO COMPLETADO!! ')</script>";
        //header("Location: layout.html");
	
}
else{
       //die('Error: Datos Invalidos');
        echo "<script languaje='javascript'>alert('ERROR: DATOS INVALIDOS!! ')</script>";
}

mysqli_close($link); 

?>
<p>OPCIONES:</p>
<p><a href='layout.html'>Volver a Pagina Principal</a></p>
<p><a href='registro.html'>Volver a Registro</a></p>

