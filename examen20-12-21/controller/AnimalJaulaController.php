<?php

require_once '../model/AnimalJaula.php';
require_once '../model/Conexion.php';

class AnimalJaulaController {

    public static function mostrarJaulasAnimal($idAnimal) {
        try {
            $con = new Conexion();

            $result = $con->query("select * from animal_jaula where codigo_animal = '$idAnimal';");

            while ($fila = $result->fetch()) {
                $animal = new AnimalJaula($fila->codigo_animal, $fila->codigo_jaula, $fila->fecha_ingreso, $fila->fecha_salida);
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
    
    public static function insertarAnimalJaula($animalJaula) {
        try {
            $con = new Conexion();

            $result = $con->exec("insert into animal_jaula (codigo_animal, codigo_jaula, fecha_ingreso) values ('".$animalJaula->codAnimal."', '". $animalJaula->codJaula ."', '". $animalJaula->fechaIngreso ."');");
                      
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }
    
     public static function jaulaActualAnimal($codAnimal) {
        $conex = new Conexion();
        $result = $conex->query("select * from animal_jaula where codigo_animal = '".$codAnimal."';");
        if ($fila = $result->fetch()){           
            return $animal = new AnimalJaula($fila->codigo_animal, $fila->codigo_jaula, $fila->fecha_ingreso, $fila->fecha_salida);
        }
        return false;
    }
    
    public static function cambiarAnimal($codAnimal, $codJaula, $codJaulaAntiguo, $fechaSalida) {
        try {
            $con = new Conexion();
                    
            $result = $con->exec("update animal_jaula set fecha_salida = '$fechaSalida' where codigo_animal = '$codAnimal' and codigo_jaula = '$codJaula';");
                self::moverAnimal($codAnimal, $codJaula);
        
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }
    
    private static function moverAnimal($codAnimal, $codJaula) {
        try {
            $con = new Conexion();
            $fechaIngreso = date('Y\-m\-d', time());
                    
            $result = $con->exec("insert into animal_jaula (codigo_animal, codigo_jaula, fecha_ingreso) values ('".$codAnimal."', '". $codJaula ."', '". $fechaIngreso ."');");             
            
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }
}
