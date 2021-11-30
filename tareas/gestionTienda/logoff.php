<?php
session_name("sesion");
session_start();
session_unset();
session_destroy();

setcookie("sesion", "", time()-300, "/");
header("Location: login.php");