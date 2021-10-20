<?php

/**
 * Método usado para mostrar una matriz que se le pase por pantalla
 * @param type $matriz
 */
function mostrarMatriz($matriz) {
    echo '<table border=1>';

    foreach ($matriz as $fila) { //Con un foreach recorrer los diferentes arrays que hay en el primero
        echo "<tr>"; //Abrir cada vez un tr

        foreach ($fila as $columna) { //Rerrorer cada uno de los arrays para obtener el contenido de cada valor
            echo "<td width=20px>" . $columna . "</td>";
        }
        echo "</tr>";
    }
}

/**
 * Método usado para mostrar un array por pantalla
 * @param type $array
 */
function mostrarArray($array) {
    foreach ($array as $i => $valor) {
        echo "Fila " . ($i + 1) . ": " . $valor . "  <br>";
    }
}

/**
 * Muestra en pantalla un botón para volver al menú
 */
function botonVolver() {
    echo '<form action="PrincipalMatrices.php" method="POST">
        <input type="submit" name="volver" value="Volver">
    </form>';
}

/**
 * Suma por separado los valores de cada una de las filas de la matriz
 * @param type $matriz
 * @return array
 */
function sumaFilas($matriz) {
    $sumaFilas = Array();
    foreach ($matriz as $i => $fila) { //Con un foreach recorrer los diferentes arrays que hay en el primero
        $suma = 0;
        foreach ($fila as $j => $columna) { //Rerrorer cada uno de los arrays para obtener el contenido de cada valor
            $suma += $columna;
        }
        array_push($sumaFilas, $suma); //Ir acumulando en un array cada uno de los resultados
    }
    return $sumaFilas;
}

/**
 * Suma por separado los valores de cada una de las columnas de la matriz
 * @param type $matriz
 * @return array
 */
function sumaColumnas($matriz) {
    $sumaColumnas = Array();
    for ($i = 0; $i < count($matriz); $i++) { //Con un for recorrer los diferentes arrays que hay en el primero
        $suma = 0;
        for ($j = 0; $j < count($matriz[$i]); $j++) { //Rerrorer cada uno de los arrays para obtener el contenido de cada valor
            $suma += $matriz[$j][$i];
        }
        array_push($sumaColumnas, $suma); //Ir acumulando en un array cada uno de los resultados
    }
    return $sumaColumnas;
}

/**
 * Suma cada uno de los valores de la matriz
 * @param type $matriz
 * @return type
 */
function sumaTotalMatriz($matriz) {
    $suma = 0;
    for ($i = 0; $i < count($matriz); $i++) { //Con un for recorrer los diferentes arrays que hay en el primero
        for ($j = 0; $j < count($matriz[$i]); $j++) { //Rerrorer cada uno de los arrays para obtener el contenido de cada valor
            $suma += $matriz[$j][$i];
        }
    }
    return $suma;
}

/**
 * Suma los valores de la matriz principal
 * @param type $matriz
 * @return type
 */
function sumaDiagonal($matriz) {
    $sumaDiagonal = 0;
    for ($i = 0; $i < count($matriz); $i++) { //Con un for recorrer los diferentes arrays que hay en el primero
        for ($j = 0; $j < count($matriz[$i]); $j++) { //Rerrorer cada uno de los arrays para obtener el contenido de cada valor
            if ($i == $j) {
                $sumaDiagonal += $matriz[$j][$i];
            }
        }
    }
    return $sumaDiagonal;
}

/**
 * Calcula la matriz traspuesta
 * @param type $matriz
 * @return type
 */
function matrizTraspuesta($matriz) {
    for ($i = 0; $i < count($matriz); $i++) { //Con un for recorrer los diferentes arrays que hay en el primero
        for ($j = 0; $j < count($matriz[$i]); $j++) { //Rerrorer cada uno de los arrays para obtener el contenido de cada valor
            $matriz2[$i][$j] = $matriz[$j][$i];
        }
    }
    return $matriz2;
}