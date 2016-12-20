<?php
if (isset($_POST['email'])){
	session_start();	
	
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

	$email = utf8_decode($_POST['email']);
	$recuperar = utf8_decode($_POST['recuperar']);

	$usuarios = mysqli_query($link, "select * from Usuario where Email='$email' and Recuperar='$recuperar'"); 

	$cont= mysqli_num_rows($usuarios);
	if( ($cont==1) )
	{
		//session_start();
		$_SESSION['user'] = $email;
		$_SESSION['usertype'] = "seguro";
	
		$var = $_SESSION['user'];
		//print ("<P>Valor de la variable de sesión: $var</P>\n");
		header("location:cambiarcontrasena.html");
	}
	
	else if (!isset($_SESSION['intentos']))
	{
		$_SESSION['intentos'] = 1;
		echo "<script languaje='javascript'>alert('ERROR!! Intentalo de nuevo amigo')</script>";	
	}
	
	else if ($_SESSION['intentos'])
	{	
		$_SESSION['intentos'] ++;
		if ($_SESSION['intentos'] > 2)
		{
			session_destroy();
			header("location:layout.html");
		}
		else
		{
			echo "<script languaje='javascript'>alert('ERROR!! Intentalo de nuevo amigo')</script>";
		}	
	}  
mysqli_close($link); 
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Recuperar Contrasena</title>
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
        <p class="clearpara"></p>
        <!--/topwrap-->
      </div>
      <div class="logo">  
        <p class="clearpara"></p>
        <!--/logo-->
		</div>	
      <div class="latest-project">

        <div class="post">
          
         <div  class="postmeta">
         </div>
		<form action="recuperar.php" method="post">           
		<h4>¿Olvidó la Contrasena? </h4> 
		<br>
		<p> Ingresa tu dirección de email: </p>
		<h5> Email:<input type="email"  required name="email" size="40" value="" /> </h5> 
		<p> ¿Cuál es tu pueblo favorito? </p>
		<h5>Respuesta: <input type="password" required name="recuperar" size="30" value="" /> </h5>
		<br>
		<p> <input id="input_2" type="submit" />
		</form>
         <p class="clearpara"></p>
        </div>
      </div>
      <p class="clearpara"></p>
      <div class="categories">
        <ul>
			<li><a href="layout.html">Volver</a></li>
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
