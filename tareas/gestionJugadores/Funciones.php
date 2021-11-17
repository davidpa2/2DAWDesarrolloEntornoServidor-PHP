<?php

function establecerConexion() {
    $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'gestionjugadores');

    if ($dwes->connect_error) {
        die("ERROR AL CONECTAR");
    }
}

function mostrarResultados($resultado) {
    while ($fila = $resultado->fetch_object()) {
        echo "==================================<br>";
        echo "Dni: " . $fila->dni . "<br>";
        echo "Nombre: " . $fila->nombre . "<br>";
        echo "Dorsal: " . $fila->dorsal . "<br>";
        echo "Posición: " . $fila->posición . "<br>";
        echo "Equipo: " . $fila->equipo . "<br>";
        echo "Goles: " . $fila->goles . "<br>";
    }
}

function validarDni($dni) {
    if (preg_match("/^\d{8}[A-Z]{1}$/", $dni)) { //8 digitos y 1 letra minuscula
        return true;
    }
}

function validarNombre($nombre) {
    if (preg_match("/^[a-zA-Z\s]{1,30}$/", $nombre)) { //Solo texto de menos de 30 caracteres
        return true;
    }
}

function validarPosicion($posicion) {
    if ($posicion != 0) {
        return true;
    }
}

function validarEquipo($equipo) {
    if (preg_match("/^[a-zA-Z]{1,}/", $equipo)) {
        return true;
    }
}

function validarGoles($goles) {
    if (preg_match("/^\d*$/", $goles)) {
        return true;
    }
}
