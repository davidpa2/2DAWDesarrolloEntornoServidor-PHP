<?php

require_once '../model/Animal.php';
require_once '../model/Conexion.php';

class AnimalController {
    
    /**
     * 
     * @return \Juego|boolean
     */
    public static function mostrarAnimalesResponsable($dniResponsable) {
        try {
            $con = new Conexion();

            $result = $con->query("select * from animal where dni_responsable = '$dniResponsable';");

            while ($fila = $result->fetch()) {
                $animal = new Animal($fila->codigo, $fila->tipo, $fila->especie, $fila->sexo, $fila->ano_nac, $fila->pais_origen, $fila->continente, $fila->dni_responsable, $fila->ruta);
                $animales[] = $animal;
            }

            if (isset($animales)) {
                return $animales;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }
    
    public static function registrarAnimal($animal) {
        try {
            $con = new Conexion();

            $result = $con->exec("insert into animal values ('".$animal->codigo."', '". $animal->tipo ."', '". $animal->especie."', '". $animal->sexo ."', '". $animal->annoNac ."','". $animal->paisOrigen ."', '". $animal->continente . "', '" . $animal->dniResponsable . "', '" . $animal->imagen . "');");
                      
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }
    
}
