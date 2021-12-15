<?php
require_once '../Model/Producto.php';
require_once 'Conexion.php';

class ProductoController {
    
    public static function insertar($p) {
        $conexion = new Conexion();
        $conexion->query("insert into producto values (".$p->getCodigo().", '".$p->getNombre()."', ".$p->getPrecio().")");

        $error = $conexion->errno;
        $conexion->close();
        return $error;
    }

    public static function buscarProducto($cod) {
        $conexion = new Conexion();
        $result = $conexion->query("select * from producto where codigo = $cod");

        if ($conexion->errno) {
            return $conexion->errno;
        }
        if ($result->num_rows) {
            $registro = $result->fetch_object();
            return new self($registro->codigo, $registro->nombre, $registro->precio);
        } else {
            return FALSE;
        }
    }
    
    public static function mostrarProductos() {
        $conexion = new Conexion();
        $result = $conexion->query("select * from producto");

        if ($conexion->errno) {
            return $conexion->errno;
        }
        if ($result->num_rows) {
            $p = new self();
            while ($fila = $result->fetch_object()) {
                //$p->nuevoP($fila->codigo, $fila->nombre, $fila->precio);
                //Hay que usar un clone para que cree una copia del objeto con los nuevos valores
                //$productos[] = clone($p);
                
                //OTRA MANERA en la que crea un objeto por cada iteración del while
                $p = new Producto($fila->codigo, $fila->nombre, $fila->precio);
                $productos[] = $p;
            }
            return $productos;
        }
        return false;
    }
}