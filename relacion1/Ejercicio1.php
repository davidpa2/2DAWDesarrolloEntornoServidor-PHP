<!--. Dado un año, indicar si es bisiesto o no.
Para determinar si un año es bisiesto, siga estos pasos:
a) Si el año es uniformemente divisible por 4, vaya al paso b. De lo contrario,
vaya al paso e.
b) Si el año es uniformemente divisible por 100, vaya al paso c. De lo
contrario, vaya al paso d.
c) Si el año es uniformemente divisible por 400, vaya al paso d. De lo
contrario, vaya al paso e.
d) El año es un año bisiesto (tiene 366 días).
e) El año no es un año bisiesto (tiene 365 días).-->

<?php

$anio = 24;

if ($anio % 4 == 0){ //Paso a
    if ($anio % 100 == 0){ //Paso b
        if ($anio % 400 == 0){ //Paso c
            echo "El año ".$anio." es bisiesto";
               
        } else {
             echo "El año ".$anio." no es bisiesto";
        }
        
    } else {
         echo "El año ".$anio." es bisiesto";
    }
  
} else {
    echo "El año ".$anio." no es bisiesto";
}
