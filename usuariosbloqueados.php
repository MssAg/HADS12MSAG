<?php

$db_host="mysql.hostinger.es";
$db_user="u390657429_mikel";
$db_password="73737373";
$db_name="u390657429_quiz";
$db_table_name="Usuario";

$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

$query = "SELECT * FROM Usuario WHERE Estado='bloqueado'";

$result = mysqli_query($connection, $query);

echo '<select name="usuario">';
echo '<option value="" disabled selected style="display:none;">Usuarios bloqueados</option>';
while($row = mysqli_fetch_array($result)){
echo '<option value="' . $row['Email'] . '">'. $row['Email'] .'</option>';
}
echo "</select>";
echo "<br>";

$result->close();
mysqli_close($connection);

?>