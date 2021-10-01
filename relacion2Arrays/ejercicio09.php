<html>
    <head>
        <title>Tabla</title>
    </head>
    <body>
        <?php
        echo '<table border="1">';
        $estadiosDeFutbol = array("Barcelona" => "Camp Nou", "Real Madrid" => "Santiago Bernabeu", "Valencia" => "Mestalla",
    "Real Sociedad" => "Anoeta");

        
        echo "<th>Equipo</th><th>Estadio</th>";

        foreach ($estadiosDeFutbol as $equipo => $campo) {
            echo '<tr>';
            echo '<td>' . $equipo . '</td><td>' . $campo . '</td>';
            echo '</tr>';
        }

        echo "</table>";
        
        unset($estadiosDeFutbol["Real Madrid"]); //Eliminar el valor con key "Real Madrid"

        echo "<ol>";

        foreach ($estadiosDeFutbol as $equipo => $campo) {
            echo "<li>Equipo: " . $equipo . " => " . $campo . "</li>";
        }
        echo "</ol>";
        
        ?>
    </body>
</html>
<!--
  Crea un array asociativo con los siguientes valores:
  $estadios_de_futbol=
  BarcelonaCamp Nou
  Real Madrid Santiago Bernabeu
  Valencia  Mestalla
  Real Sociedad  Anoeta
  Muestra los valores del array en una tabla, has de mostrar el índice y el valor
  asociado.
  Elimina el estadio asociado al Real Madrid.
  Vuelve a mostrar los valores para comprobar que se ha eliminado, pero esta vez en
  una lista numerada.
-->