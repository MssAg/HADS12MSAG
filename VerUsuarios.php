<?php

session_start();	
	
if($_SESSION['usertype'] != "profesor" ){ 
	header("location:layout.html");
	exit();
} 

$db_host="mysql.hostinger.es";
$db_user="u390657429_mikel";
$db_password="73737373";
$db_name="u390657429_quiz";
$db_table_name="Usuario";

$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

$query = "SELECT * FROM Usuario";

$result = mysqli_query($connection, $query);

echo "<table border=1> 
<tr> 
<th> NOMBRE </th> <th> APELLIDOS </th> <th> Email </th> <th> CONTRASENA </th> <th> TELEFONO </th> <th> ESPECIALIDAD </th> <th> FOTO </th> 
</tr>";

while($row = mysqli_fetch_array($result)){
echo '<tr><td>' . $row['Nombre'] . '</td><td>' . $row['Apellido'] . '</td><td>'. $row['Email'] . '</td><td>'. $row['Contrasena'] . 
'</td><td>'. $row['Telefono'] . '</td><td>'. $row['Especialidad'] . '</td><td><img src="'.$row['Foto']. '"/></td></tr>';
}
echo "</table>";

$result->close();
mysqli_close($connection);

?>
<br>
<a href='loginok.php'>Volver</a>