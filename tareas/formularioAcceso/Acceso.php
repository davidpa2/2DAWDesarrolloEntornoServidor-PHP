<?php
if (isset($_COOKIE['tiempo'])) {
    echo "Hola " . $_COOKIE['nombre'] . ", su último inicio de acceso fue el día " . date("d/m/y", $_COOKIE['tiempo']) . " a las " . date("H:i:s", $_COOKIE['tiempo']);
} else {
    echo "Hola " . $_COOKIE['nombre'] . " su última visita fue hace mucho tiempo";
}
?>
<form action="InicioSesion.php" method="POST">
    <input type='submit' name='volver' value='Volver'>
</form>
