<?php
//http://aprenderaprogramar.es/index.php?option=com_content&view=article&id=585:leer-y-escribir-archivos-de-texto-con-php-funcion-fopen-modo-fgets-fputs-fclose-y-feof-ejemplo-cu00836b-&catid=70:tutorial-basico-programador-web-php-desde-cero&Itemid=193

require_once("lib/nusoap.php");
require_once("lib/class.wsdlcache.php");

$server = new soap_server;

$server->register('comprobarpass');

function comprobarpass ($pass){
	$fp = fopen("toppasswords.txt", "r");
	while(!feof($fp)) 
	{
		$linea = trim(fgets($fp));
		if ($linea == $pass){
			fclose($fp);
			return "INVALIDA";
		}
	}
	fclose($fp);
	return "VALIDA";
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? 
$HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
 
?>

	