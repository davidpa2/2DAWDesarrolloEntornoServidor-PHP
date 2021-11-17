<?php
//Establecer la conexión
$dwes = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');

$stmt = $dwes->stmt_init(); //Inicializar un objeto de tipo stmt
$stmt->prepare('insert into tienda values (?,?,?)'); //Preparar la consulta

//Si no ha habido ningún error al analizar la consulta:
if (!$stmt->errno) { 
    //Preparar los datos que se vayan a intoducir guardándolos en variables
    $cod = 4;
    $nombre = "DELAROUSE";
    $tlf = 683453512;
    //Pasar los parámetros a la consulta preparada
    $stmt->bind_param('iss', $cod, $nombre, $tlf);
    $stmt->execute(); //Ejecutar
    
    if ($stmt->errno) { //Comprobar que no ha habido errores
        echo 'ERROR: ' . $stmt->error;
    } else {
        echo 'Inserción completada';
    }
    
} else {
    echo 'ERROR:' . $smtm->error;
}

$stmt -> close();
$dwes -> close();

