<?php
//Almacena en un array los 10 primeros números pares. Muéstralos cada uno en una línea.

$array = array();

for ($i = 2; $i <= 20; $i += 2) {
    $array[$i] = $i;
    echo($array[$i]."<br>");
}

