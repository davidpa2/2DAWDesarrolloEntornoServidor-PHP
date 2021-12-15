<?php

require_once 'Conexion.php';
require_once '../Model/Alquiler.php';
require_once '../Controller/JuegoController.php';

class AlquilerController {

    public static function mostrarHistorial($dniUsuario) {
        try {
            $con = new Conexion();

            $result = $con->query("select * from juegos j join alquiler a where j.Codigo = a.Cod_juego and DNI_cliente = '" . $dniUsuario . "';");

            while ($fila = $result->fetch()) {
                $alquiler = new Alquiler($fila->Cod_juego, $fila->DNI_cliente, $fila->Fecha_alquiler, $fila->Fecha_devol);
                $alquileres[] = $alquiler;
            }

            return $alquileres;
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

    public static function mostrarAlquiadosUsuario($dniUsuario) {
        try {
            $con = new Conexion();

            $result = $con->query("select * from juegos j join alquiler a where j.Codigo = a.Cod_juego and Alquilado = 'SI' and DNI_cliente = '" . $dniUsuario . "';");

            while ($fila = $result->fetch()) {
                $alquiler = new Alquiler($fila->Cod_juego, $fila->DNI_cliente, $fila->Fecha_alquiler, $fila->Fecha_devol);
                $alquileres[] = $alquiler;
            }

            if (isset($alquileres)) {
                return $alquileres;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

    public static function alquilarJuego($juego, $dni) {
        try {
            $con = new Conexion();

            $result = $con->exec("insert into alquiler (Cod_juego, DNI_cliente, Fecha_alquiler) values ('". $juego->codigo ."', '". $dni ."', '". date('Y\-m\-d', time()) ."');");

            if ($result != 0) {
                echo 'hola';
                //JuegoController::actualizarAlquilado($codJuego);
            }

        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }
}
