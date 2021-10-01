<?php

/* 
Crea un array con los nombres Pedro, Ismael, Sonia, Clara, Susana, Alfonso y
Teresa. Muestra el número de elementos que contiene y cada elemento en una lista
no numerada.
 */

$array = array("Pedro", "Ismael", "Sonia", "Clara", "Susana", "Alfonso", "Teresa");

echo("La longitud del array es: ".count($array));

echo "<ul>";

foreach ($array as $nombre) {
    echo "<li>".$nombre."</li>";
}
echo "</ul>";