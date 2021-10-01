<?php

/* 
Crea un array introduciendo las ciudades: Madrid, Barcelona, Londres, New York,
Los Ángeles y Chicago, sin asignar índices al array. Muestra el contenido del array
haciendo un recorrido diciendo el valor correspondiente a cada índice, por ejemplo:
La ciudad con el índice 0 tiene el nombre de Madrid.
 */

$array = array("Madrid", "Barcelona", "Londres", "New York", "Los Ángeles", "Chicago");

foreach ($array as $key => $value) {
    echo($key." = ".$value."<br>");
}