<?php
if (isset($_POST['enviar'])) {
    require_once 'Funciones.php'; //Importar el fichero de funciones
    $suma = 0;
    //Una vez pulsado enviar si se ha seleccionado alguna posición hay que sumar y saber cuantas se han marcado
    if (isset($_POST['posicion'])) {
        foreach ($_POST['posicion'] as $value) {
            $suma += $value;
        }
    }
    //Comprobar los distintos campos pasados del formulario
    $dni = validarDni($_POST['dni']);
    $nombre = validarNombre($_POST['nombre']);
    $posicion = validarPosicion($suma);
    $equipo = validarEquipo($_POST['equipo']);
    $goles = validarGoles($_POST['goles']);
    $existeDni = false;
    $hayErrores = false;
    //Si algún campo está incorrecto hay que tener en cuenta que hay algún error
    if (!$dni || !$nombre || !$posicion || !$equipo || !$goles) {
        $hayErrores = true; //Ya se sabe que hay algún error para luego borrar los campos del formulario o no
    }
}
//Si tras comprobar los campos se han puestos todos como verdadero, proceder con la inserción
if (isset($_POST['enviar']) && $dni && $nombre && $posicion && $equipo && $goles) {

    $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'gestionjugadores');
    
    if ($dwes->connect_error) {
        die("ERROR AL CONECTAR");
    }
    $suma = 0; //Contar qué posiciones se han marcado
    foreach ($_POST['posicion'] as $value) {
        $suma += $value;
    }
    //Antes de nada buscar en la BBDD si existe el DNI que acaban de introducir
    $dwes->query("select * from jugadores where dni = '$_POST[dni]'");
    if ($dwes->affected_rows == 0) { // Si no hay ninguna coincidencia insertar el jugador

        $dwes->query("insert into jugadores (dni,nombre,dorsal,posición,equipo,goles) values ('$_POST[dni]','$_POST[nombre]','$_POST[dorsal]',$suma ,'$_POST[equipo]','$_POST[goles]')");

        if ($dwes->errno) {
            echo $dwes->error . "<br>";
        }

        if ($dwes->affected_rows > 0) {
            echo "REGISTRO COMPLETADO<br>";
        }
    } else { //Si ya existe el dni del jugador, poner a true el $existeDni y decir que ya hay algún error
        $existeDni = true;
        $hayErrores = true;
    }
    $dwes->close();
}
?>
<!--Mostrar en todo momento el formulario pero comprobando si hay errores o no para mostrar los errores o vaciar los campos -->
<form action="" method="POST">
    Dni: <input type="text" name="dni" value="<?php if (isset($_POST['enviar']) && $dni && $hayErrores) echo $_POST['dni'] ?>">
    <?php if (isset($_POST['enviar']) && !$dni) echo 'Has escrito un dni incorrecto' ?>
    <?php if (isset($_POST['enviar']) && $existeDni) echo 'Ya existe un jugador con ese DNI registrado.' ?><br>
    Nombre: <input type="text" name="nombre" value="<?php if (isset($_POST['enviar']) && $nombre && $hayErrores) echo $_POST['nombre'] ?>">
    <?php if (isset($_POST['enviar']) && !$nombre) echo 'Has escrito un nombre incorrecto' ?><br>
    Dorsal: <select name="dorsal">
        <?php //Generar los dorsales del 1 al 11
        for ($i = 1; $i < 12; $i++) {
        ?>
        <option value='<?php echo $i ?>'  <?php if (isset($_POST['enviar']) && $hayErrores && $_POST['dorsal'] == $i) echo 'selected'; ?>><?php echo $i ?></option>
            <?php
        }
        ?>
    </select><br><br>
    
    Posición: <select name="posicion[]" multiple="true">
        <option value="1" <?php if (isset($_POST['posicion'])) if (isset($_POST['enviar']) && $hayErrores && in_array("1", $_POST['posicion'])) echo 'selected' ?>>Portero</option>
        <option value="2" <?php if (isset($_POST['posicion'])) if (isset($_POST['enviar']) && $hayErrores && in_array("2", $_POST['posicion'])) echo 'selected' ?>>Defensa</option>
        <option value="4" <?php if (isset($_POST['posicion'])) if (isset($_POST['enviar']) && $hayErrores && in_array("4", $_POST['posicion'])) echo 'selected' ?>>Centrocampista</option>
        <option value="8" <?php if (isset($_POST['posicion'])) if (isset($_POST['enviar']) && $hayErrores && in_array("8", $_POST['posicion'])) echo 'selected' ?>>Delantero</option>
    </select><?php if (isset($_POST['enviar']) && !$posicion) echo 'Selecciona la menos una posición' ?><br><br>
    Equipo: <input type="text" name="equipo"  value="<?php if (isset($_POST['enviar']) && $equipo && $hayErrores) echo $_POST['equipo'] ?>">
    <?php if (isset($_POST['enviar']) && !$equipo) echo 'Escribe un equipo correcto' ?><br>
    Goles: <input type="text" name="goles"  value=<?php if (isset($_POST['enviar']) && $goles && $hayErrores) echo $_POST['goles'] ?>>
    <?php if (isset($_POST['enviar']) && !$goles) echo 'Escribe una cantidad de goles' ?><br>
    <input type="submit" name="enviar" value="Guardar">
</form>

<button value="Volver"><a href="Index.html">Volver</a></button><br>