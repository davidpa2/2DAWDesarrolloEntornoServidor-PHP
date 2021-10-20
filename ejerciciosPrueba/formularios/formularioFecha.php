<?php
$hayDia = false;
$hayMes = false;
$hayAnio = false;
$fechaCorrecta = false;

if (isset($_POST['enviar'])) {

    if (!empty($_POST['dia']))
        $hayDia = true;
    if (!empty($_POST['mes']))
        $hayMes = true;
    if (!empty($_POST['anio']))
        $hayAnio = true;
    if ($hayDia && $hayMes && $hayAnio)
        $fechaCorrecta = checkdate($_POST['dia'], $_POST['mes'], $_POST['anio']);
}

if (isset($_POST['enviar']) && $fechaCorrecta) {

    $dia = date("l", mktime(0, 0, 0, $_POST['mes'], $_POST['dia'], $_POST['anio']));

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

    $mes = $_POST['mes'];

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

    echo $dia . ", " . $_POST['dia'] . " de " . $mes . " de " . $_POST['anio'];

    echo '<br><a href="formularioFecha.php">Volver</a>';
} else {
    ?>

    <html>
        <head>
            <title>Date form</title>
        </head>
        <body>
            <form action="" method="POST">
                Día: <input type="text" name="dia" value=<?php if($hayDia) echo $_POST['dia'] ?>><br>

                Mes: <input type="text" name="mes" value=<?php if($hayMes) echo $_POST['mes'] ?>><br>

                Año: <input type="text" name="anio" value=<?php if($hayAnio) echo $_POST['anio'] ?>><br>

    <?php if (isset($_POST['anio'])) echo 'Has escrito una fecha incorrecta'; ?><br>

                <input type="submit" name="enviar" value="Enviar">

            </form> 
        </body>
    </html>

    <?php
}
