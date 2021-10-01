<!-- Anteriormente hiciste un ejercicio que mostraba la fecha actual en castellano. Con el
mismo objetivo (puedes utilizar el código ya hecho), crea una función que devuelva una
cadena de texto con la fecha en castellano, e introdúcela en un fichero externo. Después
crea una página en PHP que incluya ese fichero y utilice la función para mostrar en
pantalla la fecha obtenida -->

<?php

function fechaActualEspañol() {

    $dia = date('l');

    switch ($dia) {
        case 'Monday':
            $dia = "Lunes";
            break;
        case 'Tuesday':
            $dia = "Martes";
            break;
        case 'Wednesday':
            $dia = 'Miércoles';
            break;
        case 'Thursday':
            $dia = 'Jueves';
            break;
        case 'Friday':
            $dia = 'Viernes';
            break;
        case 'Saturday':
            $dia = 'Sábado';
            break;
        case 'Sunday':
            $dia = 'Domingo';
            break;
        default:
            $dia = 'Un día cualquiera';
    }

    $mes = date('n');

    switch ($mes) {
        case 1:
            $mes = "Enero";
            break;
        case 2:
            $mes = "Febrero";
            break;
        case 3:
            $mes = 'Marzo';
            break;
        case 4:
            $mes = 'Abril';
            break;
        case 5:
            $mes = 'Mayo';
            break;
        case 6:
            $mes = 'Junio';
            break;
        case 7:
            $mes = 'Julio';
            break;
        case 8:
            $mes = 'Agosto';
            break;
        case 9:
            $mes = 'Septiembre';
            break;
        case 10:
            $mes = 'Octubre';
            break;
        case 11:
            $mes = 'Noviembre';
            break;
        case 12:
            $mes = 'Diciembre';
            break;

        default:
            $mes = 'El mes que mola';
    }

    return $dia . ", " . date('d') . " de " . $mes . " de " . date('Y');
}
