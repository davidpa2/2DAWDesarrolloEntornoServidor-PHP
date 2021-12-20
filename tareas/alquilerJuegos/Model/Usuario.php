<?php

class Usuario {
    private $dni;
    private $nombre;
    private $apellidos;
    private $direccion;
    private $localidad;
    private $clave;
    private $tipo;
    private $intentos = 3;
    
    public function __construct($dni, $nombre, $apellidos, $direccion, $localidad, $clave, $tipo, $intentos) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->clave = $clave;
        $this->tipo = $tipo;
        $this->intentos = $intentos;
    }
    
    
    /**
     * GETTERS & SETTERS
     */
    public function getDni() {
        return $this->dni;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getClave() {
        return $this->clave;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getIntentos() {
        return $this->intentos;
    }

    public function setDni($dni): void {
        $this->dni = $dni;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos): void {
        $this->apellidos = $apellidos;
    }

    public function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }

    public function setLocalidad($localidad): void {
        $this->localidad = $localidad;
    }

    public function setClave($clave): void {
        $this->clave = $clave;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setIntentos($intentos): void {
        $this->intentos = $intentos;
    }
}
