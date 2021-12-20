<?php

class Jaula {

    protected $codigo;
    protected $tipo;
    protected $caracteristicas;
    protected $ubicacion;

    public function __construct($codigo, $tipo, $caracteristicas, $ubicacion) {
        $this->codigo = $codigo;
        $this->tipo = $tipo;
        $this->caracteristicas = $caracteristicas;
        $this->ubicacion = $ubicacion;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

}
