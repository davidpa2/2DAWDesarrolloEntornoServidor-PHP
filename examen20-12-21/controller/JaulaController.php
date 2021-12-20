<?php

require_once '../model/Jaula.php';
require_once '../model/Conexion.php';

class JaulaController {

    public static function buscarJaula($idJaula) {
        try {
            $con = new Conexion();

            $result = $con->query("select * from jaula where codigo = '$idJaula';");

            if ($fila = $result->fetch()) {
                $jaula = new Jaula($fila->codigo, $fila->tipo, $fila->caracteristicas, $fila->ubicacion);
            }

            return $jaula;
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }
    
    public static function mostrarJaulas() {
        try {
            $con = new Conexion();

            $result = $con->query("select * from jaula;");

            while ($fila = $result->fetch()) {
                $jaula = new Jaula($fila->codigo, $fila->tipo, $fila->caracteristicas, $fila->ubicacion);
                $jaulas[] = $jaula;
            }

            if (isset($jaulas)) {
                return $jaulas;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

}
