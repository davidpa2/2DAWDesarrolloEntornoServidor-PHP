<?php

require_once 'Conexion.php';

class Producto {

    private $codigo;
    private $nombre;
    private $precio;

    public function __construct($codigo = 0, $nombre = "", $precio = 0) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function __toString() {
        return "Codigo: " . $this->codigo . " - Nombre: " . $this->nombre . " - Precio: " . $this->precio;
    }

    public function nuevoP($codigo, $nombre, $precio) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function insertar() {
        $conexion = new Conexion();
        $conexion->query("insert into producto values ($this->codigo, '$this->nombre', $this->precio)");

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
                $p->nuevoP($fila->codigo, $fila->nombre, $fila->precio);
                //Hay que usar un clone para que cree una copia del objeto con los nuevos valores
                $productos[] = clone($p);
                
                //OTRA MANERA en la que crea un objeto por cada iteración del while
                //p->new self($fila->codigo, $fila->nombre, $fila->precio);
                //$productos[] = $p;
            }
            return $productos;
        }
        return false;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setCodigo($codigo): void {
        $this->codigo = $codigo;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setPrecio($precio): void {
        $this->precio = $precio;
    }
}
