<?php
//Muestra el array del ejercicio anterior en orden inverso

$array = array();

for ($i = 20; $i > 0; $i -= 2) {
    $array[$i] = $i;
    echo($array[$i]."<br>");
}

