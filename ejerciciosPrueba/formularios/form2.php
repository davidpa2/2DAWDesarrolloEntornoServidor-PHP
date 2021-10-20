<?php

echo $_POST['nombre']." ".$_POST['apell']."<br>";

echo $_REQUEST['nombre']." ".$_REQUEST['apell']."<br>";


if (isset($_POST['modulos']) > 0){
    echo 'Los módulos matriculados son: ';
    foreach ($_POST['modulos'] as $value) {
        echo $value."<br>";
    }
} else {
    echo "No se ha matriculado de ningún módulo";
}