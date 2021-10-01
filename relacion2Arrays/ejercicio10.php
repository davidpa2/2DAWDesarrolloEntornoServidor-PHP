<?php

/* 
Implementa un array asociativo con los siguientes valores y ordénalo de menor a
mayor. Muestra los valores en una tabla.
$numeros=array(3,2,8,123,5,1); 
 */

$numeros = array("tres" => 3,"dos" => 2,"ocho" =>8,"ciento veintitrés"=>123, "cinco" => 5, "uno"=> 1);

asort($numeros);    //Ordenar los valores

echo "<table border='1'>";
echo "<tr><th>"."Indice"."</th><th>"."Numero"."</th></tr>";

foreach ($numeros as $indice => $valor) {
    echo "<tr>";
    echo "<td>".$indice."</td>"."<td>".$valor."</td>";
    echo "</tr>";
}
echo "</table>";


