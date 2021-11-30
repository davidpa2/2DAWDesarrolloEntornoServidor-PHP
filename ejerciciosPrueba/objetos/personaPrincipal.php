<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
        require_once 'Persona.php';
        /* $p = new Persona("Antonio", "de la Rouse", 20);
          echo $p->getEdad();

          $p1 = new Persona();
          echo $p1->getNombre();
          echo "<br>".Persona::getNumPersonas();
         */
        $p2 = new Persona();
        //echo $p2->getNombre();
        echo "<br>" . Persona::getNumPersonas();

        echo "<br>" . $p2->nombre; //Usar el método mágico __get
        echo "<br>" . $p2; //Usar el método mágico toString

        /* Se puede crear una copia de un objeto con clone, porque si se escribe $p3 = $p2 se crea 
          una referencia a la misma dirección de memoria */
        $p3 = clone($p2); //Si se crea el método mágico __clone se puede modificar lo que se asigne al clonar
        echo "<br>" . $p3;
        echo "<br>" . Persona::getNumPersonas();

        //Comparar si dos objetos son instancias de la misma clase y sus atributos son iguales
        //=== (triple igual) se usa para saber si son instancias de la misma clase y sus atributos son iguales
        //== (doble igual) se usa para saber si sus atributos son iguales
        if ($p2 === $p3) {
            echo "<br>SON IGUALES";
        } else {
            echo "<br>SON DISTINTOS";
        }
        
        unset($p3); //Se ejecuta el __destruct
        echo "<br>" . Persona::getNumPersonas();
        
        $p2->muestra('Sofia');
        ?>
    </body>
</html>
