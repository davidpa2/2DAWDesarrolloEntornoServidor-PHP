<!-- Según la información que figura en la tabla stock de la base de datos dwes, la tienda 1
(CENTRAL) tiene 2 unidades del producto de código 3DSNG y la tienda 3 (SUCURSAL2)
ninguno. Suponiendo que los datos son esos (no hace falta que los compruebes en el
código), utiliza una transacción para mover una unidad de ese producto de la tienda 1 a la
tienda 3.
Deberás hacer una consulta de actualización (para poner unidades=1 en la tienda 1) y otra
de inserción (pues no existe ningún registro previo para la tienda 3).
Comprueba que se ejecuta bien solo la primera vez, pues en ejecuciones
posteriores ya no es posible insertar la misma fila en la tabla. 
-->
<?php
$dwes =new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
$dwes->set_charset('utf8mb4');

if ($dwes->connect_errno){
    echo 'ERROR';
    die($dwes->connect_error);
    
} else {
    $dwes->autocommit(false);
    $dwes->query('update stock set unidades=unidades-1 where producto="3DSNG" and tienda="1"');
    $dwes->query('insert into stock values ("3DSNG", 3, 1)');
    
    if (!$dwes->errno) {
    echo "Se han modificado ". $dwes->affected_rows ." filas";
    $dwes->commit();
    } else {
        $dwes->rollback();
        echo'Ha habido un error';
    }
}
$dwes->autocommit(true);
$dwes->close();