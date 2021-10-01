<!-- Elabora un script que permita construir una tabla de 5 filas y 7 columnas que
contengan los sucesivos números naturales desde 1 hasta 35. Utiliza bucles del
tipo for, que igual que while y do while permiten ser anidados. -->

<table border="1">
    

<?php
$n = 1;
 for ($i = 0; $i < 5; $i++) {
            echo "<tr>";
     
            for ($j = 0; $j < 7; $j++) {
                echo "<td>".$n."</td>";
                $n++;
            }
            echo "</tr>";
        }
 ?>
</table>