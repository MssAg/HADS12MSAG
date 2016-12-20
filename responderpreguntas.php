<script LANGUAGE="JavaScript">

var i = 0
var j = 0
var nombre = "Mr Anonimo";
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
	XMLHttpRequestObject.open("GET","preguntas3.php",true); 
	XMLHttpRequestObject.send();
}
function comprobarRespuesta(that)
{
XML = new XMLHttpRequest();
XML.onreadystatechange = function()
	{
		if (XML.readyState==4)
		{
		document.getElementById('respuestas').innerHTML= XML.responseText;
		}
	}

	XML.open("GET","respuesta.php?q=" +that,true); 
	XML.send();
}
function mostrarRespuesta()
{

var respUser = document.getElementById('respuestaUsuario').value;
var nickUser = document.getElementById('nick').value;
var resp = document.getElementById('respuestaText').value;
		if (respUser == resp){
			i++;
			alert("¡La respuesta de: " + nombre + " es correcta!");
			document.getElementById("correctas").innerHTML = i;
		}
		else{
			j++;
			alert("La respuesta de: " + nombre + " es incorrecta...");
			document.getElementById("incorrectas").innerHTML = j;
		}
}
function Reset() {
            i = 0;
			j = 0;
            document.getElementById("correctas").innerHTML = i;
			document.getElementById("incorrectas").innerHTML = j;
        }
function asignar() {
    var nick = document.getElementById('nick').value;
	nombre = nick;
	i = 0;
	j = 0;
    document.getElementById("correctas").innerHTML = i;
	document.getElementById("incorrectas").innerHTML = j;
            
}



</script>



<!DOCTYPE html>
<html>
<head>
<title>Responder Preguntas</title>
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
          <h2> RESPONDER PREGUNTAS </h2>
          <p class="clearpara"></p>
        </div>
        <div class="post">
          
          <div  class="postmeta">
          </div>
		  <input type="button" value="VerPreguntas" onclick ="pedirDatos()">
			<div id="resultado"><b></b></div> 
			<br>
			<h5><span>Nombre de usuario:</span></h5>
			<input type="text" id="nick" name="nick">
			<input type="button"  name="asignar" value="Asignar nombre" onclick = "asignar()">
			<br>
			<h5><span>¿Cual es tu respuesta?</span></h5>	
			<br>			
			<input type="text" id="respuestaUsuario" name="respuestaUsuario">
			<br>
			<input type="button"  name="boton" value="Contestar" onclick = "mostrarRespuesta()">
			<br>
			<p>Respuestas correctas: <span id="correctas">0</span></p>
			<p>Respuestas incorrectas: <span id="incorrectas">0</span></p>
			<input type="button"  name="reset" value="Reiniciar" onclick = "Reset()">
          <div id="respuestas"><b></b></div> 
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
