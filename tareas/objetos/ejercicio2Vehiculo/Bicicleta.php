<?php

require_once 'Vehiculo.php';

class Bicicleta extends Vehiculo {

    protected $marca;
    protected $diametroRueda;

    public function __construct($kmRecorridos, $marca, $diametroRueda) {
        parent::__construct($kmRecorridos);
        $this->marca = $marca;
        $this->diametroRueda = $diametroRueda;
    }

    public function __toString() {
        return parent::__toString() . "Una bicicleta de la marca " . $this->marca . " y con rueda de " . $this->diametroRueda . "''<br>";
    }

    public function sonido() {
        echo 'Timbre: Ring rinnngg!';
    }
    
    public function andar($kilometros) {
        $this->kmRecorridos += $kilometros;
        self::$kmTotales += $kilometros;
    }
    
    public function hacerCaballito() {
        echo 'Caballito: Shu caballito locooo<br>';
    }

    /*
     * Getters & setters
     */

    public function getMarca() {
        return $this->marca;
    }

    public function getDiametroRueda() {
        return $this->diametroRueda;
    }

    public function setMarca($marca): void {
        $this->marca = $marca;
    }

    public function setDiametroRueda($diametroRueda): void {
        $this->diametroRueda = $diametroRueda;
    }

}