<?php

require_once '../model/Responsable.php';

class ResponsableController {

    /**
     * 
     * @param type $dni
     * @param type $pass
     * @return boolean
     */
    public static function validarUsuario($dni, $pass) {
        $conex = new Conexion();
        $result = $conex->query("select * from responsable where dni = '" . $dni . "' and pass = '" . $pass . "';");
        if ($fila = $result->fetch()) {
            echo 'SE HA CREADO EL RESPONSABLE   ';
            return $r = new Responsable($fila->dni, $fila->nombre, $fila->apellidos, $fila->pass, $fila->intentos, $fila->bloqueado);
        }
        return false;
    }
    
    /**
     * 
     * @param type $dni
     * @return boolean
     */
    public static function comprobarDni($dni) {
        $conex = new Conexion();
        $result = $conex->query("select * from responsable where dni = '".$dni."';");
        if ($fila = $result->fetch()){           
            return $r = new Responsable($fila->dni, $fila->nombre, $fila->apellidos, $fila->pass, $fila->intentos, $fila->bloqueado);
        }
        return false;
    }
    
    /**
     * 
     * @param type $dni
     */
    public static function renovarIntentos($dni) {
        $conex = new Conexion();
        $result = $conex->query("update responsable set intentos = 3 where dni = '" . $dni . "';");
    }
    
    /**
     * 
     * @param type $dni
     * @param type $intentos
     */
    public static function modificarIntentos($dni, $intentos) {
        $conex = new Conexion();
        $result = $conex->query("update responsable set intentos = intentos + ". $intentos ." where dni = '". $dni ."';");
        
    }

}
