<?php

require_once 'Conexion.php';
require_once '../Model/Juego.php';

class JuegoController {

    public static function mostrarJuegos() {
        try {
            $con = new Conexion();

            $result = $con->query("select * from juegos");

            while ($fila = $result->fetch()) {
                $juego = new Juego($fila->Nombre_juego, $fila->Nombre_consola, $fila->Anno, $fila->Precio, $fila->Alquilado, $fila->Imagen, $fila->descripcion);
                $juegos[] = $juego;
            }

            return $juegos;
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

    public static function mostrarJuegosAlquilados() {
        try {
            $con = new Conexion();

            $result = $con->query("select * from juegos where Alquilado = 'SI';");

            while ($fila = $result->fetch()) {
                $juego = new Juego($fila->Nombre_juego, $fila->Nombre_consola, $fila->Anno, $fila->Precio, $fila->Alquilado, $fila->Imagen, $fila->descripcion);
                $juegos[] = $juego;
            }

            if (isset($juegos)) {
                return $juegos;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

    public static function mostrarJuegosDisponibles() {
        try {
            $con = new Conexion();

            $result = $con->query("select * from juegos where Alquilado = 'NO';");

            while ($fila = $result->fetch()) {
                $juego = new Juego($fila->Nombre_juego, $fila->Nombre_consola, $fila->Anno, $fila->Precio, $fila->Alquilado, $fila->Imagen, $fila->descripcion);
                $juegos[] = $juego;
            }

            if (isset($juegos)) {
                return $juegos;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

    public static function buscarJuegoPorCodigo($codigoJuego) {
        try {
            $con = new Conexion();

            $result = $con->query("select * from juegos where Codigo ='" . $codigoJuego . "';");

            if ($fila = $result->fetch()) {
                $juego = new Juego($fila->Nombre_juego, $fila->Nombre_consola, $fila->Anno, $fila->Precio, $fila->Alquilado, $fila->Imagen, $fila->descripcion);
            }

            return $juego;
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

    public static function actualizarAlquilado($codJuego, $alquilado) {
        try {
            $con = new Conexion();

            if ($alquilado == "NO") {
                $result = $con->exec("update juegos set Alquilado = 'SI' where Codigo = '" . $codJuego . "';");
            } else {
                $result = $con->exec("update juegos set Alquilado = 'NO' where Codigo = '" . $codJuego . "';");
            }
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

    public static function insertarJuego($juego) {
        try {
            $con = new Conexion();

            $result = $con->exec("insert into juegos values ('" . $juego->codigo . "', '" . $juego->nombreJuego . "', '" . $juego->nombreConsola . "', '" . $juego->anno . "', '" . $juego->precio . "','" . $juego->alquilado . "', '" . $juego->imagen . "', '" . $juego->descripcion . "');");
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

    public static function eliminarJuego($codJuego) {
        try {
            $con = new Conexion();

            $result = $con->exec("delete from juegos where Codigo = '$codJuego';");
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

    public static function modificarJuego($codigo, $nombreJuego, $nombreConsola, $anno, $precio, $imagen, $descripcion) {
        try {
            $con = new Conexion();

            $resultado = $con->exec("UPDATE juegos SET Nombre_juego='$nombreJuego', Nombre_consola='$nombreConsola', Anno='$anno', Precio='$precio', Imagen='$imagen', descripcion='$descripcion' WHERE Codigo='$codigo'");
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

}
