<script LANGUAGE="JavaScript">


function pedirDatos()
{
XMLHttpRequestObject = new XMLHttpRequest();
XMLHttpRequestObject.onreadystatechange = function()
	{
		if (XMLHttpRequestObject.readyState==4)
		{
		
		//tabla de respuestas
		document.getElementById('resultado').innerHTML= XMLHttpRequestObject.responseText;
		
		}
	}

	XMLHttpRequestObject.open("GET","verPreguntasXML.php",true); 
	XMLHttpRequestObject.send();
}

function ocultarDatos()
{
	document.getElementById('mensaje').innerHTML= "";
	document.getElementById("email").value = "";
	document.getElementById("pass").value = "";
    document.getElementById("pregunta").value = "";
    document.getElementById("respuesta").value = "";
    document.getElementById("dificultad").value = "";
    document.getElementById("subject").value = "";
}

function ocultarTabla()
{
	document.getElementById('resultado').innerHTML= "";
	document.getElementById('mensaje').innerHTML= "";
}

function insertarDatos(){
  
  var email_var = document.getElementById("email").value;
  var pass_var = document.getElementById("pass").value;
  var pregunta_var = document.getElementById("pregunta").value;
  var respuesta_var = document.getElementById("respuesta").value;
  var dificultad_var = document.getElementById("dificultad").value;
  var subject_var = document.getElementById("subject").value;
  var param= "email="+email_var+"&pass="+pass_var+"&pregunta="+pregunta_var+"&respuesta="+respuesta_var+"&dificultad="+dificultad_var+"&subject="+subject_var;
 
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
	{
	if(xmlhttp.readyState==4 && xmlhttp.status==200){
        document.getElementById('resultado').innerHTML= "";
	document.getElementById('mensaje').innerHTML=xmlhttp.responseText;}
	}
	xmlhttp.open("POST","addpreguntas.php",true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
	xmlhttp.send(param);
 
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
		  <form id="registro" name="registro" action= "gestionpreguntas.php" method="post">
		    
			<h5>Identificación de usuario </h5>                
			<p> Email   : <input type="text"  required name="email" id="email" size="21" value="" />                
			Password: <input type="password" required name="pass" id="pass" size="21" value="" />
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
			<input type="button" value="Insertar Pregunta" onclick ="insertarDatos()">
			<input type="button" value="VerPreguntas" onclick ="pedirDatos()">
			<input type="button" value="Ocultar Preguntas" onclick ="ocultarTabla()">
			<input type="button" value="Borrar Datos" onclick ="ocultarDatos()">
		 </form>
          <p class="clearpara"></p>
        </div>
	  <div id="mensaje"><b></b></div> 
	  <div id="resultado"><b></b></div> 
      </div>
      <p class="clearpara"></p>
      <div class="categories">
        <ul>
			<li><a href="loginok.html">Volver</a></li>
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
