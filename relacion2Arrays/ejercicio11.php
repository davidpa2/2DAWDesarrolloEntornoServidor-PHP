<?php

/*
  Crea una página que rellene dos arrays de 4 elementos con números aleatorios y los
  muestre. Después deberá unir los dos arrays en uno sólo usando la función
  array_merge y también de manera manual. A continuación deberá ordenar el array
  unido con la función sort y sin ella (intercambiando valores). Cada vez que se haga
  algo habrá que mostrar el resultado para comprobarlo.
 */

$array1 = array(4);
$array2 = array(4);
$arrayManual = array(8);

for ($i = 0; $i < 8; $i++) {
    $numAzar = rand(0, 100);

    if ($i < 4) {
        $array1[$i] = $numAzar;
    } else {
        $array2[$i - 4] = $numAzar;
    }
}
echo 'Primer array generado : ';
imprimirArray($array1);
echo 'Segundo array generado : ';
imprimirArray($array2);

//Juntar los arrays por array_merge
$arrayMerge = array_merge($array1, $array2);

echo 'Array juntado por array_merge(): ';
imprimirArray($arrayMerge);


//Juntar los arrays de manera manual
for ($i = 0; $i < 8; $i++) {

    if ($i < 4) {
        $arrayJuntar[$i] = $array1[$i];
    } else {
        $arrayJuntar[$i] = $array2[$i - 4];
    }
}

echo 'Array juntado de manera manual: ';
imprimirArray($arrayJuntar);


//Ordenar el array por sort
sort($arrayMerge);
echo 'Array ordenado por sort(): ';
imprimirArray($arrayMerge);


//Ordenar el array de manera manual por el método de burbuja
$seIntercambian;
do {
    $seIntercambian = false;
    for ($i = 0; $i < count($arrayJuntar) - 1; $i++) {
        if ($arrayJuntar[$i] > $arrayJuntar[$i + 1]) {
            $aux = $arrayJuntar[$i + 1];
            $arrayJuntar[$i +1] = $arrayJuntar[$i];
            $arrayJuntar[$i] = $aux;
            $seIntercambian = true;
        }
    }
}while ($seIntercambian);

echo 'Array ordenado de manera manual: ';
imprimirArray($arrayJuntar);


/**
 * Mostrar todos los elementos de un array pasado
 * @param type $array
 */
function imprimirArray($array) {
    for ($i = 0; $i < count($array); $i++) {
        echo $array[$i] . " ";
    }
    echo "<br><br>";
}