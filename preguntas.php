<?php

$db_host="mysql.hostinger.es";
$db_user="u390657429_mikel";
$db_password="73737373";
$db_name="u390657429_quiz";
$db_table_name="Preguntas";

$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

$query = "SELECT * FROM Preguntas";

$result = mysqli_query($connection, $query);

echo "<table>";
echo "<table border=1> 
<tr> 
<th> PREGUNTA </th> <th> DIFICULTAD </th> <th> AUTOR </th>
</tr>";

while($row = mysqli_fetch_array($result)){
echo "<tr><td>" . $row['Pregunta'] . "</td><td>" . $row['Dificultad'] .  "</td><td>". $row['Email'] . "</td></tr>";
}
echo "</table>";
echo "<br>";
echo "<a href='layout.html'>Volver a Pagina Principal</a>"; 

$result->close();
mysqli_close($connection);

?>