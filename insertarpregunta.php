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

$subs_email = utf8_decode($_POST['email']);
$subs_pass = utf8_decode($_POST['pass']);

$usuarios = mysqli_query($link, "select * from Usuario where Email='$subs_email' and Contrasena='$subs_pass'"); 
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
   
$subs_question = utf8_decode($_POST['pregunta']);
$subs_answer = utf8_decode($_POST['respuesta']);
$subs_level = utf8_decode($_POST['dificultad']); 
$subs_subject = utf8_decode($_POST['subject']);


$sql="INSERT INTO Preguntas(Pregunta, Respuesta, Dificultad, Subject, Email) 
VALUES ('$subs_question','$subs_answer','$subs_level','$subs_subject','$subs_email')";
    

	if (!mysqli_query($link ,$sql))

	{
	die('Error: ' . mysqli_error($link));
	}

 echo "<script languaje='javascript'>alert('La pregunta se ha registrado correctamente en tabla preguntas ')</script>";

 }	
	else 	
	{
		echo "<script languaje='javascript'>alert('ERROR!! Try again')</script>";
	} 
mysqli_close($link); 


if (file_exists('preguntas.xml')) {
    $xml = @simplexml_load_file('preguntas.xml');
	if ($xml){
	 $assessmentItem = $xml->addChild('assessmentItem','');
	$assessmentItem->addAttribute('complexity',$subs_level);
	$assessmentItem->addAttribute('subject',$subs_subject);
	$itemBody = $assessmentItem ->addChild('itemBody','');
	$p = $itemBody->addChild('p',$subs_question);
	$correctResponse = $assessmentItem->addChild('correctResponse','');
	$value = $correctResponse->addChild('value',$subs_answer);
	echo $xml->saveXML('preguntas.xml' );
	echo "<script languaje='javascript'>alert('La pregunta se ha insertado correctamente en preguntas XML')</script>";				
	}else{
	echo "<script languaje='javascript'>alert('Error al insertar en preguntas XML')</script>";	
	}

} else {
    echo "<script languaje='javascript'>alert('ERROR!! Abriendo archivo preguntas.xml')</script>";	
}

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Preguntas</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<link rel="stylesheet" href="style.css" type="text/css" media="screen" >

</head>
<body id="pagetop" >
<div class="pagewrap">
  <div class="wrap">
    <div class="content">
      <div class="topwrap">
        <div id="search">
          <form name="gs" method="get" action="#">
            <input type="text" name="q" size="30" maxlength="2048" class="ip" value="" >
            <button>Busqueda</button>
          </form>
          <div class="clearpara"></div>
        </div>
        <div id="menu">
          <ul>
			 <li><a href="layout.html">LOGOUT</a></li>
          </ul>
          <p class="clearpara"></p>
          <!--/menu-->
        </div>
        <p class="clearpara"></p>
        <!--/topwrap-->
      </div>
      <div class="logo">
        <p class="clearpara"></p>
        <!--/logo-->
      </div>
      <div class="latest-project">
        <div class="section_header">
          <h2> EDITAR PREGUNTA </h2>
          <p class="clearpara"></p>
        </div>
        <div class="post">
          
          <div  class="postmeta">
          </div>
		  <form id="registro" name="registro" action= "insertarpregunta.php" method="post">
		    
			<h5>Identificación de usuario </h5>                
			<p> Email   : <input type="email"  required name="email" size="21" value="" />                
			Password: <input type="password" required name="pass" size="21" value="" />
			<p class="clearpara"></p>
			<br>
			<h5><span>Datos de la pregunta:</span></h5>
			<p>Enunciado Pregunta: <input type="text" required name="pregunta" id="pregunta" size="30" value="">
			<br>
			<p>Respuesta correcta: <input type="text" required name="respuesta" id="respuesta" size="30" value="">		
			<br>
			<p>Dificultad (1 a 5): <input type="text" name="dificultad" id="dificultad" size="30" value="">   	
			<br>
			<p>Subject: <input type="text" required name="subject" id="subject" size="30" value="">
			<br>			
			<input type="submit" value="Insertar Pregunta">
		 </form>
          <p class="clearpara"></p>
        </div>
      </div>
      <p class="clearpara"></p>
      <div class="categories">
        <ul>
			<li><a href="loginok.html">Volver a Inicio</a></li>
        </ul>
        <!--/categories-->
      </div>
      <div class="footer lhs"> &copy; copyright 2016 <a href="#">Sistemas Web</a>. All Rights Reserved | <span class="sitecredits">Site designed by <a href="http://chilligavva.com/">Lakshmi Mareddy.</a></span>
        <p class="clearpara"></p>
        <div class="rssfeeds">
          <ul>
            <li><a href="http://es.wikipedia.org/wiki/Quiz">Que es un Quiz?</a></li>
			<li><a href="https://github.com">Link GITHUB</a></li>
          </ul>
        </div>
        <!-- /footer -->
      </div>
      <p class="clearpara"></p>
      <p class="clearpara"></p>
      <!--/content-->
    </div>
    <p class="clearpara"></p>
    <!--/wrap-->
  </div>
  <p class="clearpara"></p>
  <!--/pagewrap-->
</div>
</body>
</html>
