<?php
$dwes = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
if ($dwes->connect_errno) {
    //echo 'ERROR';
    die($dwes->connect_error);
}
$dwes->set_charset('utf8');

$result = $dwes->query('select * from producto');
//Para saber cuantos resultados devuelve usar num_rows2
echo "Se han mostrado ". $result->num_rows ." resultados";

if (!$dwes->errno) {
    while ($fila = $result->fetch_object()) {
        echo '<br>Código: ' . $fila->cod . '<br><br>';
        echo 'Nombre: ' . $fila->nombre_corto . '<br><br>';
        echo 'Descripción: ' . $fila->descripcion . '<br><br>';
        echo 'Precio: ' . $fila->PVP . '<br><br>';
        echo "================================";
    }
}
//Otra forma de mostrar resultados
/*
if (!$dwes->errno) {
    while ($fila = $result->fetch_object()) {
        echo '<br>Código: ' . $fila['cod'] . '<br><br>';
        echo 'Nombre: ' . $fila['nombre_corto'] . '<br><br>';
        echo 'Descripción: ' . $fila['descripcion'] . '<br><br>';
        echo 'Precio: ' . $fila['PVP'] . '<br><br>';
        echo "================================";
    }
}
*/
$dwes->close();