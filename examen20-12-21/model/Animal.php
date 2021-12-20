<?php

class Animal {

    protected $codigo;
    protected $tipo;
    protected $especie;
    protected $sexo;
    protected $annoNac;
    protected $paisOrigen;
    protected $continente;
    protected $dniResponsable;
    protected $imagen;

    public function __construct($codigo, $tipo, $especie, $sexo, $annoNac, $paisOrigen, $continente, $dniResponsable, $imagen) {
        $this->codigo = $codigo;
        $this->tipo = $tipo;
        $this->especie = $especie;
        $this->sexo = $sexo;
        $this->annoNac = $annoNac;
        $this->paisOrigen = $paisOrigen;
        $this->continente = $continente;
        $this->dniResponsable = $dniResponsable;
        $this->imagen = $imagen;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

}
