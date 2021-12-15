<?php

require_once 'Vehiculo.php';

class Coche extends Vehiculo {

    protected $color;
    protected $combustible;

    public function __construct($kmRecorridos, $color, $combustible) {
        parent::__construct($kmRecorridos);
        $this->color = $color;
        $this->combustible = $combustible;
    }

    public function __toString() {
        return parent::__toString() . "Un coche de color " . $this->color . " y de " . $this->combustible . "<br>";
    }

    public function sonido() {
        echo 'Pitar: PIIIIIIII';
    }
    
    public function andar($kilometros) {
        $this->kmRecorridos += $kilometros;
        self::$kmTotales += $kilometros;
    }
    
    public function quemarRueda() {
        echo 'Quemando rueda: RRRRRRRRRRRR<br>';
    }

    /*
     * Getters & setters
     */

    public function getColor() {
        return $this->color;
    }

    public function getCombustible() {
        return $this->combustible;
    }

    public function setColor($color): void {
        $this->color = $color;
    }

    public function setCombustible($combustible): void {
        $this->combustible = $combustible;
    }

}
