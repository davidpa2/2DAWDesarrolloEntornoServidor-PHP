<html>
    <head>
        <title>Ejercicio</title>
    </head>
    <body>
        <table border="1">
            <?php
            //Crear el encabezado de la tabla
            $encabezado = array_keys($matriz['Marketing']); //Recoger las claves del primer array cuyo indice es 'Marketing'
            echo "<tr>"; //Abrir el table row de encabezado
            echo "<td></td>"; //Hay que dejar un td vacío
            
            //Con un for recorrer el array guardado de la matriz
            foreach ($encabezado as $indice => $campo) {
                echo "<th>" . $campo . "</th>"; //Con un th mostrar el valor del campo
            }
            echo "</tr>";
            
            //Ahora mostrar el contenido de la tabla
            foreach ($matriz as $nombreDep => $departamento) { //Con un foreach recorrer los diferentes arrays que hay en el primero

                echo "<tr>";//Abrir cada vez un tr
                echo "<th>" . $nombreDep . "</th>"; //Con un th poner en la primera columna el indice de cada array a recorrer

                foreach ($departamento as $nombreDato => $dato) { //Rerrorer cada uno de los arrays para obtener el contenido de cada valor
                    echo "<td>" . $dato . "</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>