<h3>¿Qué jugador quieres eliminar?</h3>
<form action="" method="POST">
    Jugador con DNI: <input type="text" name="jugador">
    <input type="submit" name="seleccionar" value="Seleccionar">
</form>
<button value="Volver"><a href="index.html">Volver</a></button><br>
<?php


if (isset($_POST['seleccionar'])) {
    require_once 'Funciones.php'; //Importar el fichero de funciones
    $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'gestionjugadores');

    if ($dwes->connect_error) {
        die("ERROR AL CONECTAR");
    }
    $result2 = $dwes->query("select * from jugadores where dni = '$_POST[jugador]'");
    if ($result2->num_rows) {
        echo '<h3>Datos del jugador seleccionado:</h3>';
        mostrarResultados($result2);
        echo '<h4>¿Te gustaría eliminarlo?</h4>';
        ?>
        <form action="" method="POST">
            <input type="hidden" name='campo' value='<?php echo $_POST['jugador'] ?>'>
            <input type="submit" name="eliminar" value="Eliminar">
        </form>
        <?php
    } else {
        echo '<br>No se ha encontrado ningún jugador con ese DNI.';
    }
}

if (isset($_POST['eliminar'])) {
    $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'gestionjugadores');

    if ($dwes->connect_error) {
        die("ERROR AL CONECTAR");
    }
    $result2 = $dwes->query("delete from jugadores where dni = '$_POST[campo]'");

    if (!$dwes->errno) {
        echo '<br>'. $_POST['campo'] . ' ha sido borrado correctamente.';
    } else {
        echo $dwes->error;
    }
}