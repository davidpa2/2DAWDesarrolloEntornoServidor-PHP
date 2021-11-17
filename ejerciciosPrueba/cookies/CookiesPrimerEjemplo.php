<?php

//La primera vez que se entre, se pide la cookie pero no estará disponible
//ya que al acceder por primera vez es cuando se crea, y la próxima vez es 
//cuando se tiene disponible
if (isset($_COOKIE['nombre'])) {
    echo $_COOKIE['nombre'];
    
} else {
setcookie("nombre", "David", time() + 3600);
}
?>
<br><a href="CookiesPrimerEjemplo2.php">Ir a la otra página joe</a>