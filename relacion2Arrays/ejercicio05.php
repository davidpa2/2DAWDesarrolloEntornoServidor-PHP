<?php

/* 
Repite el ejercicio anterior pero teniendo los datos de varias personas
 */

$array = array("Persona1" => array("Nombre" => "Pedro Torres", "Dirección" => "C/ Mayor, 37", "Teléfono" => "123456789"),
                "Persona2" => array("Nombre" => "Peter Panda", "Dirección" => "C/ Menor, 23", "Teléfono" => "987654321"),
                "Persona3" => array("Nombre" => "Jan Panamera", "Dirección" => "C/ Igual, 33", "Teléfono" => "012345678"),
                "Persona4" => array("Nombre" => "Deivis Capaldi", "Dirección" => "C/ Desigual, 65", "Teléfono" => "876543210"));

            foreach ($array as $personas => $arrays) {
                echo("<h2>".$personas."</h2>");
                
                foreach ($arrays as $campo => $valor) {
                    echo($campo.": ".$valor."<br>");
                }
    
}