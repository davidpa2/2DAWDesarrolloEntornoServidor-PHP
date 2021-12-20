<?php

class Responsable {

    protected $dni;
    protected $nombre;
    protected $apellidos;
    protected $pass;
    protected $intentos;
    protected $bloqueado;
    protected $horaBloqueo;

    public function __construct($dni, $nombre, $apellidos, $pass, $intentos, $bloqueado) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->pass = $pass;
        $this->intentos = $intentos;
        $this->bloqueado = $bloqueado;
        $this->horaBloqueo = time();
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

}
