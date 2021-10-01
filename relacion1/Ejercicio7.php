<!-- Calcular la suma de los cuadrados de los 100 primeros números enteros -->
    
<?php

$sumFor = 0;

for ($i = 0; $i <= 100; $i++) {
    $sumFor += $i * $i;
}

echo 'Suma de los números con for: '.$sumFor;