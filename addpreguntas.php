<?php
if (isset($_POST['email'])){
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

$email = $_POST['email'];
$pass = $_POST['pass'];

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
$pregunta = $_POST['pregunta'];
$respuesta = $_POST['respuesta'];
$dificultad = $_POST['dificultad']; 
$subject = $_POST['subject'];


$sql="INSERT INTO Preguntas(Pregunta, Respuesta, Dificultad, Subject, Email) 
VALUES ('$pregunta','$respuesta','$dificultad','$subject','$email')";
    

	if (!mysqli_query($link ,$sql))

	{
	die('Error: ' . mysqli_error($link));
	}

 echo "";


if (file_exists('preguntas.xml')) {
    $xml = @simplexml_load_file('preguntas.xml');
	if ($xml){
	$assessmentItem = $xml->addChild('assessmentItem','');
	$assessmentItem->addAttribute('complexity',$dificultad);
	$assessmentItem->addAttribute('subject',$subject);
	$itemBody = $assessmentItem ->addChild('itemBody','');
	$p = $itemBody->addChild('p',$pregunta);
	$correctResponse = $assessmentItem->addChild('correctResponse','');
	$value = $correctResponse->addChild('value',$respuesta);
	$xml->saveXML('preguntas.xml' );
	echo "La pregunta se ha insertado correctamente en preguntas XML";				
	}else{
	echo "Error al insertar en preguntas XML";	
	}

} else {
    echo "ERROR!! Abriendo archivo preguntas.xml";	
}


 }	
	else 	
	{
		echo "Error al introducir los datos. Inténtelo de nuevo";
	} 
mysqli_close($link); 

}
?>


