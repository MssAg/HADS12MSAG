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

$email = utf8_decode($_POST['email']);
$pass = utf8_decode($_POST['pass']);

$usuarios = mysqli_query($link, "select * from Usuario where Email='$email' and Contrasena='$pass'"); 
$cont= mysqli_num_rows($usuarios);
if($cont==1)
{
header("location:loginok.html");
}
	else 
	{
		echo "<script languaje='javascript'>alert('ERROR!!  Intentalo de nuevo amigo')</script>";	
	}
  
mysqli_close($link); 
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
            <li><a href="registro.html">REGISTRARSE</a></li>
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
          <h2> ENTRADA </h2>
          <p class="clearpara"></p>
        </div>
        <div class="post">
          
         <div  class="postmeta">
         </div>
		<form action="login.php" method="post">           
		<h3>Identificación de usuario </h3>                
		<p> Email   : <input type="email"  required name="email" size="21" value="" />                
		Password: <input type="password" required name="pass" size="21" value="" />                
		<p> <input id="input_2" type="submit" />
		</form>
         <p class="clearpara"></p>
        </div>
      </div>
      <p class="clearpara"></p>
      <div class="categories">
        <ul>
			<li><a href="layout.html">Pagina Principal</a></li>
			<li><a href="creditos.html">Creditos</a></li>
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
