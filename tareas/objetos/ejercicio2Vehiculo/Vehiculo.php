<?php

abstract class Vehiculo {
    protected static $vehiculosCreados;
    protected static $kmTotales;
    protected $kmRecorridos;

    public function __construct($kmRecorridos) {
        self::$vehiculosCreados++;
        $this->kmRecorridos = $kmRecorridos;
        self::$kmTotales += $kmRecorridos;
    }

    public function __toString() {
        return "Se han creado ". self::$vehiculosCreados . " vehículos y los kilometros totales son " . self::$kmTotales .
                "<br>Ha recorrido " . $this->kmRecorridos.". ";
    }

    public abstract function sonido();
    public abstract function andar($kilometros);
    
    /*
     * Getters & setters
     */
    public static function getVehiculosCreados() {
        return self::$vehiculosCreados;
    }

    public static function getKmTotales() {
        return self::$kmTotales;
    }

    public static function setVehiculosCreados($vehiculosCreados): void {
        self::$vehiculosCreados = $vehiculosCreados;
    }

    public static function setKmTotales($kmTotales): void {
        self::$kmTotales = $kmTotales;
    }
    public function getKmRecorridos() {
        return $this->kmRecorridos;
    }

    public function setKmRecorridos($kmRecorridos): void {
        $this->kmRecorridos = $kmRecorridos;
    }
}
