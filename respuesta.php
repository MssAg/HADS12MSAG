<?php

$db_host="mysql.hostinger.es";
$db_user="u390657429_mikel";
$db_password="73737373";
$db_name="u390657429_quiz";
$db_table_name="Preguntas";

$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);
$id = $_GET["q"];
$query = "SELECT * FROM Preguntas";
$result = mysqli_query($connection, $query);

while($row = mysqli_fetch_array($result)){
	if ($row['ID'] == $id ){
		echo '<input type="text" id="respuestaText" name="respuestaText" style="visibility:hidden" value="' . $row['Respuesta'] . '" readonly>';
	}
}
echo "<br>";

$result->close();
mysqli_close($connection);

?>