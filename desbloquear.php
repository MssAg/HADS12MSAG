<?php

$db_host="mysql.hostinger.es";
$db_user="u390657429_mikel";
$db_password="73737373";
$db_name="u390657429_quiz";
$db_table_name="Usuario";

$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);
$subs_sel = utf8_decode($_POST['usuario']);
$query = "UPDATE Usuario SET Estado='activo' WHERE Email= '$subs_sel'";

if (!mysqli_query($connection, $query)){

echo "SE HA PRODUCIDO UN ERROR";
}
else{
echo "CUENTA DESBLOQUEADA";

}
echo "<p><a href='desbloquearcuenta.php'>Volver</a></p>";

mysqli_close($connection);

?>