<?php

if (isset($_COOKIE['nombre'])) {
    echo $_COOKIE['nombre'];
}

setcookie("nombre", "David", time() - 3600);
?>
<br><a href="CookiesPrimerEjemplo.php">Volver a la otra página joee</a>
