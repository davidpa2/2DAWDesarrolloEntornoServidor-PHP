<?php

if (!isset($_SESSION["usuario"]))
    header("location:index.php");
else if (!isset($_POST["salir"]))
    header("location:InicioSesion.php");
setcookie(session_name(), "", time() - 3600, "/");
session_unset();
session_destroy();
header("location:index.php");
