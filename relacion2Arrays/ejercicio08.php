<?php

/* 
Rellena un array de 10 enteros, con los 10 primeros números naturales. Calcula la
media de los que están en posiciones pares y muestra los impares por pantalla.
 */

$array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$mediaPares = 0;
$pares = 0;

foreach ($array as $i=> $numero) {
    if ($i % 2 == 0){
        $mediaPares += $numero;
        $pares++;
    } else {
        echo $array[$i]."<br>";
    }
}
    echo "La media de los pares es: ".$mediaPares / $pares;