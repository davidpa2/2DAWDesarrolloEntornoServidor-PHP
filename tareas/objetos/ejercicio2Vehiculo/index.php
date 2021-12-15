<?php
require_once 'Coche.php';
require_once 'Bicicleta.php';

$coche = new Coche(30030, "Rojo", "Gasolina");
echo $coche;
$coche->quemarRueda();
$bicicleta = new Bicicleta(203, "Vitoria", 29);
echo $bicicleta;

$bicicleta->andar(20);
echo $bicicleta;
$bicicleta->hacerCaballito();