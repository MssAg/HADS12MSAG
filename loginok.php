<?php
$db_host="mysql.hostinger.es";
$db_user="u390657429_mikel";
$db_password="73737373";
$db_name="u390657429_quiz";
$db_table_name="Preguntas";
$link  = mysqli_connect($db_host, $db_user, $db_password, $db_name);
   
$subs_email = utf8_decode($_POST['email']);



header("Location: insertarpregunta.html?email=" . $subs_email );

mysqli_close($link); 
?>
