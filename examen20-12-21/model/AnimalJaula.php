<?php

class AnimalJaula {

    protected $codAnimal;
    protected $codJaula;
    protected $fechaIngreso;
    protected $fechaSalida;

    public function __construct($codAnimal, $codJaula, $fechaIngreso, $fechaSalida) {
        $this->codAnimal = $codAnimal;
        $this->codJaula = $codJaula;
        $this->fechaIngreso = $fechaIngreso;
        $this->fechaSalida = $fechaSalida;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

}
