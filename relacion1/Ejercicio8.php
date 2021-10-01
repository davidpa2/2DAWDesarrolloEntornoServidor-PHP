<!-- Calcule la suma de los 100 primeros números enteros pares. -->

<?php
$sumFor = 0;

for ($i = 0; $i <= 100; $i++) {
    if ($i % 2 == 0){
         $sumFor += $i;
    }
}

echo 'Suma de los números con for: '.$sumFor;

