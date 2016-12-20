<?php

$db_host="mysql.hostinger.es";
$db_user="u390657429_mikel";
$db_password="73737373";
$db_name="u390657429_quiz";
$db_table_name="Preguntas";

$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

$query = "SELECT * FROM Preguntas";

$result = mysqli_query($connection, $query);

echo '<select name="pregunta" onchange="comprobarRespuesta(this.value);">';
echo '<option value="" disabled selected style="display:none;">Preguntas disponibles</option>';
while($row = mysqli_fetch_array($result)){
echo '<option value="' . $row['ID'] . '">'. $row['Pregunta'] .'</option>';
}
echo "</select>";
echo "<br>";

$result->close();
mysqli_close($connection);

?>