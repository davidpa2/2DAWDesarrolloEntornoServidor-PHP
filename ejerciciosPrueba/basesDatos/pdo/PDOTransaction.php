<?php

//hacemos conexión
$dwes = new PDO('mysql:host=localhost; dbname=dwes; charset=utf8mb4', 'dwes', 'abc123.');
//transaction
$dwes->beginTransaction();

//realizamos consulta
$reg = $dwes->exec('update stock set unidades=unidades-1 where producto="PAPYRE62GB" and tienda=1;');
//si la consulta da error devuelve falso (=0), por lo que hay que tener cuidado con el if de comprobación,
//ya que el 0 puede referirse a que ha habido 0 líneas afectadas o que ha habido error, false=0
//para controlar esto, usamos el ===
if ($reg === false) {
    $dwes->rollBack();
    die('Error en la instrucción');
} else {

    //si no ha habido error hacemos insert
    $resultado = $dwes->exec('insert into stock (producto, tienda, unidades) values ("PAPYRE62GB", 2, 1);');
    if ($resultado === false) {
        echo 'Error insert';
        $dwes->rollBack();
    } else {
        echo 'Registros afectados update: ' . $reg . "<br>";
        echo 'Registros afectados insert: ' . $resultado;
        $dwes->commit();
    }
}