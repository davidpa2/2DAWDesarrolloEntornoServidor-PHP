<?php

/* 
Crea un array asociativo para introducir los datos de una persona:
Nombre: Pedro Torres
Dirección: C/ Mayor, 37
Teléfono: 123456789
Muestra los datos por pantalla.
 */

$array = array("Nombre" => "Pedro Torres", "Dirección" => "C/ Mayor, 37", "Teléfono" => "123456789");

foreach ($array as $campo => $valor) {
    echo($campo.": ".$valor."<br>");
}