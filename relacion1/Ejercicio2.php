<!-- Mostrar en pantalla una tabla de 10 por 10 con los números impares a partir de
uno generado al azar. Se debe ver en el navegador los bordes de la tabla -->

<table border="1">
    <?php
        
        $numAzar;
        do { //Generar un número al azar entre 0 y 100 que sea impar
             $numAzar = rand(0,100);
        } while ($numAzar % 2 == 0);
        
        for ($i = 0; $i < 10; $i++) {
            echo "<tr>";
          
            for ($j = 0; $j < 10; $j++) {
                echo "<td>".$numAzar."</td>";
                $numAzar += 2;
            }
            echo "</tr>";
        }
    ?>
</table>


