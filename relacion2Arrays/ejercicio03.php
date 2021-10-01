<?php
/*
 * Realiza un programa que muestre las películas que se han visto. Crea un array que
    contenga los meses de enero, febrero, marzo y abril, asignado los valores 9, 12, 0 y
    17, respectivamente. Si alguno de los meses no se ha visto ninguna película, no ha
    de mostrar la información de ese mes.
 */

$array = array("enero" => 9, "febrero" => 12, "marzo" => 0, "abril"=> 17);

foreach ($array as $mes => $numPeliculas) {
    if ($numPeliculas != 0){
        echo("En ".$mes." se vieron ".$numPeliculas.".<br>");
    }
}