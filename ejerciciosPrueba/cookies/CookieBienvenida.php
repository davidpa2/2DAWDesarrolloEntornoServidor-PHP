<?php
//--------------------------------Manera correcta-------------------------------
setcookie("tiempo", time(), time()+3600);

if (isset($_COOKIE['tiempo'])){
    echo "Su último inicio de acceso fue el día " . date("d/m/y",$_COOKIE['tiempo']). " a las " . date("H:i:s",$_COOKIE['tiempo']);
} else {
    echo "Bienvenido";
}

//----------------------------------A mi manera-----------------------------------
/*
if (isset($_COOKIE['tiempo']) && isset($_COOKIE['fecha']) && isset($_COOKIE['hora'])) {
    echo 'Último registro hace: ' . (time() - $_COOKIE['tiempo']. ' segundos<br>');
    echo 'Última vez registrado: '. $_COOKIE['fecha']. '<br>';
    echo 'A las '. $_COOKIE['hora'];
    setcookie("tiempo", time());
    setcookie("fecha", date('l\-M\-o', time()));
    setcookie("hora", date('H\:i', time()));
    
} else {
    echo 'Bienvenido';
    setcookie("tiempo", time());
    setcookie("fecha", date('l\-M\-o', time()));
    setcookie("hora", date('H\:i', time()));
}*/