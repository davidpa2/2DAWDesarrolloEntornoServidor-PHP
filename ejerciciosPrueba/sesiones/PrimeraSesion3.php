<?php
session_name("David");
session_start();
echo $_SESSION['nombre'];
session_unset();
session_destroy();
//echo $_SESSION['nombre'];
setcookie("David","", 0,"/");
?>
<br><a href="PrimeraSesion4.php">Pal otro lao 4</a>