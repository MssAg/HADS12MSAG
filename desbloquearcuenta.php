 <?php
	session_start();	
	
	if($_SESSION['usertype'] != "profesor" ){ 
		header("location:layout.html");
		exit();
	} 
?>


<script LANGUAGE="JavaScript">


function pedirDatos()
{
XMLHttpRequestObject = new XMLHttpRequest();
XMLHttpRequestObject.onreadystatechange = function()
	{
		if (XMLHttpRequestObject.readyState==4)
		{
		document.getElementById('resultado').innerHTML= XMLHttpRequestObject.responseText;
		}
	}
	XMLHttpRequestObject.open("GET","usuariosbloqueados.php",true); 
	XMLHttpRequestObject.send();
}

</script>



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
                  <li><a href="logout.php">LOGOUT</a></li>
                  <li style="color: white; margin:5px"><?php echo ($_SESSION['user']); ?></li>
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
          <h2> CUENTAS BLOQUEADAS </h2>
          <p class="clearpara"></p>
        </div>
        <div class="post">
          
          <div  class="postmeta">
          </div>
                        <form id="desbloquear" name="desbloquear" action= "desbloquear.php" method="post">
		        <input type="button" value="Ver Usuarios" onclick ="pedirDatos()">
			<div id="resultado"><b></b></div> 
			<br>
			<h5><span>¿Desea restaurar una cuenta de usuario?</span></h5>	
			<br>			
			<input type="submit"  id="submit" value="Desbloquear Cuenta">
			<br>
                        </form>
             
        </div> 
		
      </div>
      <p class="clearpara"></p>
      <div class="categories">
        <ul>
		<li><a href="loginok.php">Volver</a></li>	
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
