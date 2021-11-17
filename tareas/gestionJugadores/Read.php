<?php
require_once 'Funciones.php'; //Importar el fichero de funciones
    
$dwes = new mysqli('localhost', 'dwes', 'abc123.', 'gestionjugadores');
$suma = 0;
if ($dwes->connect_error) {
    die("ERROR AL CONECTAR");
}

$result = $dwes->query("select * from jugadores");

if ($result->num_rows) {

    echo "MOSTRANDO LA LISTA DE JUGADORES:<br>";
    mostrarResultados($result);
}
$dwes->close();

echo '<br><button value="Volver"><a href="index.html">Volver</a></button>';