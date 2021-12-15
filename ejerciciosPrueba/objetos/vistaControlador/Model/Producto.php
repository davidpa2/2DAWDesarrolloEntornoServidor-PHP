<?php

require_once '../Controller/Conexion.php';

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
