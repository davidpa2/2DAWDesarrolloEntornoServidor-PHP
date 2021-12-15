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

            return $juegos;
            
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

            return $juegos;
            
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }
    
    public static function buscarJuegoPorCodigo($codigoJuego) {
        try {
            $con = new Conexion();

            $result = $con->query("select * from juegos where Codigo ='".$codigoJuego."';");

            if ($fila = $result->fetch()) {
                $juego = new Juego($fila->Nombre_juego, $fila->Nombre_consola, $fila->Anno, $fila->Precio, $fila->Alquilado, $fila->Imagen, $fila->descripcion);
            }

            return $juego;
            
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }
    
    public static function actualizarAlquilado($codJuego) {
        try {
            $con = new Conexion();

            $result = $con->exec("update alquiler set Alquilado = 'SI' where Codigo = ". $codJuego .";");

        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }
}
