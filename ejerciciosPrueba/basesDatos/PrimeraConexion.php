<?php

//Poner un @ antes de un método para que no muestre los warnings
$dwes = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
//Para cambiar en un momento dado la base de datos
//$dwes->select_db('dwes');
//Mostrar información de la conexión con la BBDD
//echo $dwes -> server_info;
//Si ha habido algún error se para la ejecución
if ($dwes->connect_errno) {
    //echo 'ERROR';
    die($dwes->connect_error);
}

$dwes->set_charset('utf8'); //utf8mb4 para poder mostrar los emoticonos
//Una instrucción query debe de ir entre comillas simples
$dwes->query('update stock set unidades=10 where producto="EEEPC1005PXD"');
//echo $dwes->errno."-".$dwes->error;
if (!$dwes->errno) {
    echo "Se han modificado " . $dwes->affected_rows . " filas<br>";
}

$dwes->close();

//Otra manera
//$dwes = mysqli_connect('localhost', 'dwes', 'abc123.', 'dwes');
//echo mysqli_get_server_info($dwes);
?>