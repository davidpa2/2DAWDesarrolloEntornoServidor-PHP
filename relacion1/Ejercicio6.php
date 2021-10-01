<!-- Sumar los números enteros de 1 a 100 utilizando
a) estructura (repetir) ;
b) estructura (mientra ;
c) estructura (para);
-->

<?php
//Do/while
$numDo = 1;
$sumaDo = 0;

do {
    $sumaDo += $numDo;
    $numDo++;
} while ($numDo <= 100);

echo "Suma de los números con do/while: " .$sumaDo.'<br>'; 

//While
$numWhile = 1;
$sumaWhile = 0;

while ($numWhile<=100) {
    $sumaWhile += $numWhile;
    $numWhile++;
}

echo "Suma de los números con while: " .$sumaWhile.'<br>';

//For
$sumFor = 0;

for ($i = 0; $i <= 100; $i++) {
    $sumFor += $i;
}

echo 'Suma de los números con for: '.$sumFor;