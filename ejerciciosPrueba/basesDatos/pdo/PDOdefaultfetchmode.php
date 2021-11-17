<?php
$options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
$dwes = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4', 'dwes', 'abc123.',$options);

$result = $dwes->query("select * from producto");

if ($dwes->errorCode() != 0){
    die('ERROR');
}

while ($fila=$result->fetch()){
    echo 'Código: '.$fila->cod.'<br>';
    echo 'Nombre: '.$fila->nombre_corto.'<br>';
    echo 'PVP: '.$fila->PVP.'<br><br>';
    echo '===============================<br>';
}