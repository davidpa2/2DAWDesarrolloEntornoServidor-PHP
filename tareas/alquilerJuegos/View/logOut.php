<?php
session_start();

if (isset($_POST['cerrarSesion'])) {
    session_unset();
    session_destroy();
}
header("Location: index.php");
