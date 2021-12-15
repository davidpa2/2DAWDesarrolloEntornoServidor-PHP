<?php
require_once 'Persona.php';

class Empleado extends Persona{
    protected $salario;
    
    public function __construct($nombre="Rosa",$apellidos="Aguilera",$edad=36,$s=2000) {
        parent::__construct($nombre, $apellidos, $edad);
        
        $this->salario = $s;
    }
    
    public function __toString() {
        return parent::__toString()." y cobro ".$this->salario;
    }

}
