<?php
if (isset($_POST['confirmar'])) { //Si ya se ha hecho una elección proceder con el programa
    require_once 'Funciones.php'; //Importar el fichero de funciones

    $matriz; //Inicializar una matriz y rellenar con números aleatorios
    for ($i = 0; $i < $_POST['filas']; $i++) {
        for ($j = 0; $j < $_POST['columnas']; $j++) {
            $matriz[$i][$j] = rand(0, 10);
        }
    }

    //Hecho esto, según se haya pulsado en el fichero Principal Matrices entrará en una opción u otra del Switch
    switch ($_GET['option']) { //Con $_GET['option'] recibimos la elección de la página principal ya que se les asignó a cada opción un valor
        case 'Suma de filas':
            botonVolver();
            echo '<h2>Suma de filas:</h2>';
            $sumaFilas = sumaFilas($matriz);
            mostrarArray($sumaFilas);
            mostrarMatriz($matriz);
            break;

        case 'Suma de columnas':
            botonVolver();
            echo '<h2>Suma de columnas:</h2>';
            $sumaColumnas = sumaColumnas($matriz);
            mostrarArray($sumaColumnas);
            mostrarMatriz($matriz);
            break;

        case 'Suma de filas y columnas':
            botonVolver();
            echo '<h2>Suma de filas y columnas:</h2>';
            echo 'Suma total ' . sumaTotalMatriz($matriz);
            mostrarMatriz($matriz);
            break;

        case 'Suma diagonal principal':
            botonVolver();
            echo '<h2>Suma de la diagonal principal:</h2>';
            $sumaDiagonal = sumaDiagonal($matriz);
            echo "Suma: " . intval($sumaDiagonal) . "<br>";
            mostrarMatriz($matriz);
            break;

        case 'Calcular matriz traspuesta':
            botonVolver();

            if ($_POST['filas'] == $_POST['columnas']) {

                $matrizTraspuesta = matrizTraspuesta($matriz);

                echo '<h2>Matriz traspuesta:</h2>';
                echo 'Matriz origen:';
                mostrarMatriz($matriz);
                echo '<br>';
                echo 'Matriz traspuesta:';
                mostrarMatriz($matrizTraspuesta);

                echo '<br>';
            } else {
                echo 'La matriz introducida no es cuadrada.';
            }
            break;

        default:
            break;
    }
} else {
    ?>
    <!-- El mismo formulario sirve para todas las opciones, a partir de él se llamará al método que haga falta según se haya seleccionado en la primera página -->
    <form action="" method="POST">
        <?php
        echo '<h2>' . $_GET['option'] . '</h2>'
        ?>
        Numeros de filas: <input type="text " name="filas"> <br>
        Numeros de columnas: <input type="text " name="columnas"> <br><br>
        <input type="submit" name="confirmar" value="Confirmar">
    </form>
    <form action="PrincipalMatrices.php" method="POST">
        <input type="submit" name="volver" value="Volver">
    </form>

    <?php
}