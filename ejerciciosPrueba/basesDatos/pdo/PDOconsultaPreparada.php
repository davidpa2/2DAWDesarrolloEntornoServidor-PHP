<?php

$dwes = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4', 'dwes', 'abc123.');

$result = $dwes->prepare("select * from producto where cod=:cod");

if ($result === false) {
    die("ERROR");
}
$codigo = "3DSNG";
$result->bindParam(":cod", $codigo);
$result->execute();

if ($result) {
    while ($fila = $result->fetchObject()) {
        echo 'Código: ' . $fila->cod . '<br>';
        echo 'Nombre: ' . $fila->nombre_corto. '<br>';
        echo 'PVP: ' . $fila->PVP . '<br><br>';
        echo '===============================<br>';
    }
}