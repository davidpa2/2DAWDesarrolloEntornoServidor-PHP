<?php
//Establecer la conexión
$dwes = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');

$stmt = $dwes->stmt_init(); //Inicializar un objeto de tipo stmt
$stmt->prepare('select * from tienda where cod<binary ?'); //Preparar la consulta
$cod = 4;
$stmt->bind_param('i', $cod);
$stmt->execute();
$result = $stmt->get_result();
while ($fila = $result->fetch_object()){
    echo '<h2>-----TIENDA----</h2>';
    echo 'Codigo: ' . $fila->cod . '<br>';
    echo 'Nombre: ' . $fila->nombre . '<br>';
    echo 'Teléfono: ' . $fila->tlf . '<br>';
}

$stmt -> close();
$dwes -> close();