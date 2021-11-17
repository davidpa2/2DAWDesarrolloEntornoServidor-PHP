<?php

$dwes = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4', 'dwes', 'abc123.');
$results = $dwes->exec("update stock set unidades=10 where producto='ACERAX3950'");
if ($results === 0) {
    echo "Registros afectados: " . $results;
} else {
    $dwes->errorCode();//Devuelve el código de error SQL
    $dwes->errorInfo();//Devuelve un array [0]->Error de la consulta [1]->Código de error SQL [2]->Mensaje de error
}

$dwes->beginTransaction(); //Comenzar la transacción (poner el autocommit a 0)
$dwes->commit(); //Realizar los cambios
$dwes->rollBack(); //Volver a como estaba al comenzar la transacción