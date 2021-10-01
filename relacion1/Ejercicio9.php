<!-- Ordena tres números de mayor a menor -->

<?php

$a = 9;
$b = 8;
$c = 15;

if ($a>$b && $a>$c){
    if($b>$c){
        echo $a.'>'.$b.'>'.$c;
    } else {
        echo $a.'>'.$c.'>'.$b;
    }
} elseif ($b>$c && $b>$a){
        if($c>$a){
            echo $b.'>'.$c.'>'.$a;
        } else {
            echo $b.'>'.$a.'>'.$c;
        }
} else {
    if ($c>$a && $c>$b){
        if($a>$b){
            echo $c.'>'.$a.'>'.$b;
        } else {
            echo $c.'>'.$b.'>'.$a;
        }
    }
}