<?php

$db_host="mysql.hostinger.es";
$db_user="u390657429_mikel";
$db_password="73737373";
$db_name="u390657429_quiz";
$db_table_name="Usuario";

$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

$query = "SELECT * FROM Usuario";

$result = mysqli_query($connection, $query);

echo "<table>";
echo "<table border=1> 
<tr> 
<th> NOMBRE </th> <th> APELLIDOS </th> <th> Email </th> <th> CONTRASENA </th> <th> TELEFONO </th> <th> ESPECIALIDAD </th> 
</tr>";

while($row = mysqli_fetch_array($result)){
echo "<tr><td>" . $row['Nombre'] . "</td><td>" . $row['Apellido'] . "</td><td>". $row['Email'] . "</td><td>". $row['Contrasena'] . "</td><td>". $row['Telefono'] . "</td><td>". $row['Especialidad'] . "</td></tr>";
}
echo "</table>";

$result->close();
mysqli_close($connection);

?>