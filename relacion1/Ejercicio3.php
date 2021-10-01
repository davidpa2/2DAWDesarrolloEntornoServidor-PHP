<!-- De tres números A, B y C mostrar el valor máximo -->
<?php
$n1 = 63;
$n2 = 8;
$n3 = 52;

if ($n1 > $n2 && $n1 > $n3) {
    echo "El número ".$n1." es el mayor.";
} elseif ($n2 > $n1 && $n2 > $n3) {
    echo "El número ".$n2." es el mayor.";
} else {
    echo "El número ".$n3." es el mayor.";
}