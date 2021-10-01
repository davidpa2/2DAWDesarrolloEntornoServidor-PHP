<!-- Elabora un script que permita construir una tabla de 5 filas y 7 columnas que
contengan los sucesivos números naturales desde 1 hasta 35. Utiliza bucles while-->

<table border="1">
<?php

$n=1;
$i = 0;
do {
    echo "<tr>";
    $j = 0;
    
    do {
        echo "<td>".$n."</td>";
         $n++;
         $j++;
    } while ($j<7);
    
    $i++;
    echo "</tr>";
} while ($i<5);
?>

</table>
