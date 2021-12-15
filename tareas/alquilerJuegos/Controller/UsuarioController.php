<?php

require_once 'Conexion.php';
require_once '../Model/Usuario.php';

class UsuarioController {

    public static function buscarBloqueados() {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from cliente WHERE intentos = 0");
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
        
        while ($fila = $result->fetch()) {
            //var_dump($result->fetch());
            $c = new Usuario($fila->DNI, $fila->Nombre, $fila->Apellidos, $fila->Direccion, $fila->Localidad, $fila->Clave, $fila->Tipo, $fila->intentos);
            $clientes[] = $c;
            //var_dump($clientes);
        }
        return $clientes;
    }

    public static function buscar() {
        $conex = new Conexion();
        $result = $conex->query("SELECT * FROM cliente WHERE Nombre = 'Antonio'");
        return $result->fetch();
    }

    public static function desbloquear($usuario) {
        $conex = new Conexion();
        $result = $conex->query("SELECT * FROM cliente WHERE DNI = '" . $usuario->DNI . "'");
        $usuario = $result->fetch();
    }

    public static function validarUsuario($dni, $pass) {
        $conex = new Conexion();
        $result = $conex->query("SELECT * FROM cliente WHERE DNI = '".$dni."' and Clave = '". $pass ."';");
        if ($fila = $result->fetch()){           
            return $u = new Usuario($fila->DNI, $fila->Nombre, $fila->Apellidos, $fila->Direccion, $fila->Localidad, $fila->Clave, $fila->Tipo, $fila->intentos);
        }
        return false;
    }
}