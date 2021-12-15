<?php

class Alquiler {
protected $codJuego;
protected $dniCliente;
protected $fechaAlquiler;
protected $fechaDevol;

public function __construct($codJuego, $dniCliente, $fechaAlquiler, $fechaDevol) {
    $this->codJuego = $codJuego;
    $this->dniCliente = $dniCliente;
    
    if ($fechaAlquiler == ""){
        $fechaAlquiler = date('Y\-m\-d', time());
    } else {
        $this->fechaAlquiler = $fechaAlquiler;
    }
    
    if ($fechaDevol == ""){
        $fechaDevol = date('Y\-m\-d', time() + 604800);
    } else {
        $this->fechaDevol = $fechaDevol;
    }
}

/**
 * GETTERS & SETTERS
 */
public function getCodJuego() {
return $this->codJuego;
}

public function getDniCliente() {
return $this->dniCliente;
}

public function getFechaAlquiler() {
return $this->fechaAlquiler;
}

public function getFechaDevol() {
return $this->fechaDevol;
}

public function setCodJuego($codJuego): void {
$this->codJuego = $codJuego;
}

public function setDniCliente($dniCliente): void {
$this->dniCliente = $dniCliente;
}

public function setFechaAlquiler($fechaAlquiler): void {
$this->fechaAlquiler = $fechaAlquiler;
}

public function setFechaDevol($fechaDevol): void {
$this->fechaDevol = $fechaDevol;
}
}