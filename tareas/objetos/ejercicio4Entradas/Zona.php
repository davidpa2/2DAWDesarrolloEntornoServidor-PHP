<?php

class Zona {

    public $nombreZona;
    protected $plazasTotales;
    protected $plazasRestantes;

    public function __construct($nombreZona, $plazasTotales, $plazasRestantes) {
        $this->nombreZona = $nombreZona;
        $this->plazasTotales = $plazasTotales;
        $this->plazasRestantes = $plazasRestantes;
    }

    public function vender($plazas) {
        if ($this->plazasRestantes >=  $plazas) {
            $this->plazasRestantes -= $plazas;
            //echo "En " . $this->nombreZona . " quedan " . $this->plazasRestantes . "/" . $this->plazasTotales . " entradas.<br>";
        } else {
            echo 'NO QUEDAN ENTRADAS DISPONIBLES<br>';
        }
    }

    public function __toString() {
        return "Nombre de zona: " . $this->nombreZona . ". Plazas totales: " . $this->plazasTotales . ". Plazas restantes: " . $this->plazasRestantes . ".<br>";
    }

    /*
     * Getters & setters
     */

    public function getNombreZona() {
        return $this->nombreZona;
    }

    public function getPlazasTotales() {
        return $this->plazasTotales;
    }

    public function getPlazasRestantes() {
        return $this->plazasRestantes;
    }

    public function setNombreZona($nombreZona): void {
        $this->nombreZona = $nombreZona;
    }

    public function setPlazasTotales($plazasTotales): void {
        $this->plazasTotales = $plazasTotales;
    }

    public function setPlazasRestantes($plazasRestantes): void {
        $this->plazasRestantes = $plazasRestantes;
    }

}
