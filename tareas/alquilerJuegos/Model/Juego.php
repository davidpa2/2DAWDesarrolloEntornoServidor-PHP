<?php

class Juego {
    public $codigo;
    public $nombreJuego;
    public $nombreConsola;
    public $anno;
    public $precio;
    public $alquilado;
    public $imagen;
    public $descripcion;


    public function __construct($nombreJuego, $nombreConsola, $anno, $precio, $alquilado, $imagen, $descripcion) {
        $this->codigo = self::generarCodigo($nombreJuego, $nombreConsola);
        $this->nombreJuego = $nombreJuego;
        $this->nombreConsola = $nombreConsola;
        $this->anno = $anno;
        $this->precio = $precio;
        $this->alquilado = $alquilado;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
    }

    public static function generarCodigo($nombreJuego, $nombreConsola) {
        $arrayNombres = explode(" ", $nombreJuego);
        $arrayLetras = [];
        $codigoGenerado = "";
        
        foreach ($arrayNombres as $palabra) {
            $codigoGenerado = $codigoGenerado."".substr($palabra, 0, 1);
        }
        
        return $codigoGenerado."-".$nombreConsola;;
    }

    /**
     * GETTERS & SETTERS
     */
    public function getCodigo() {
        return $this->codigo;
    }

    public function getNombreJuego() {
        return $this->nombreJuego;
    }

    public function getNombreConsola() {
        return $this->nombreConsola;
    }

    public function getAnno() {
        return $this->anno;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getAlquilado() {
        return $this->alquilado;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setCodigo($codigo): void {
        $this->codigo = $codigo;
    }

    public function setNombreJuego($nombreJuego): void {
        $this->nombreJuego = $nombreJuego;
    }

    public function setNombreConsola($nombreConsola): void {
        $this->nombreConsola = $nombreConsola;
    }

    public function setAnno($anno): void {
        $this->anno = $anno;
    }

    public function setPrecio($precio): void {
        $this->precio = $precio;
    }

    public function setAlquilado($alquilado): void {
        $this->alquilado = $alquilado;
    }

    public function setImagen($imagen): void {
        $this->imagen = $imagen;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }
}