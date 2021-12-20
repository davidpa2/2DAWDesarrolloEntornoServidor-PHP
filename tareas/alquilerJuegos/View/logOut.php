<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:index.php");
}

if (isset($_POST['cerrarSesion'])) {
    session_unset();
    session_destroy();
}
header("Location: index.php");
