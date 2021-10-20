<?php
//PRIMERA PARTE DEL FORMULARIO
//Para entrar en la primera parte hay que comprobar que no se ha pulsado el boton1 o que si se ha pulsado el boton de cancelar
if (!isset($_POST['boton1']) || isset($_POST['cancelar'])) {
    ?>
    <form action="" method="POST">
        Nombre: <input type="text " name="nombre"> <br>
        Apellidos: <input type="text " name="apellidos"> <br><br>

        Aficiones: <br>
        <input type="checkbox" name="aficiones[]" value="Cine">Cine
        <input type="checkbox" name="aficiones[]" value="Lectura">Lectura
        <input type="checkbox" name="aficiones[]" value="Television">Television<br>
        <input type="checkbox" name="aficiones[]" value="Deporte">Deporte
        <input type="checkbox" name="aficiones[]" value="Musica">Música<br><br>

        Estudios: 
        <select size="5" multiple="true" name="estudios[]">
            <option>ESO</option>
            <option>Bachillerato</option>
            <option>CFGM</option>
            <option>CFGS</option>
            <option>Universidad</option>
        </select><br><br>
        <input type="submit" name="boton1" value="Siguiente">
    </form>

    <?php
} else if (isset($_POST['boton1'])) { //Si ya se ha pulsado, se pasa a la segunda parte
    //SEGUNDA PARTE
    //Para entrar en la segunda parte hay que comprobar que no se ha pulsado el boton2
    if (!isset($_POST['boton2'])) {
        ?>
        <form action="" method="POST">        
            Sexo: <br>
            <input type="radio"  name="sexo" value="Hombre">Hombre 
            <input type="radio"  name="sexo" value="Mujer">Mujer<br><br>

            Estado civil: <br>
            <input type="radio"  name="estado" value="Soltero">Soltero 
            <input type="radio"  name="estado" value="Casado">Casado
            <input type="radio"  name="estado" value="Otro">Otro<br><br>

            Edad: 
            <select name="edad">
                <option>Entre 1 y 14 años</option>
                <option>Entre 15 y 25 años</option>
                <option>Entre 26 y 35 años</option>
                <option>Mayor de 35 años</option>
            </select><br><br>

            <input type="submit" name="boton2" value="Siguiente">
            <input type="submit" name="cancelar" value="Cancelar">

            <input type="hidden" name="nombre" value=<?php echo $_POST['nombre'] ?>>
            <input type="hidden" name="apellidos" value=<?php echo $_POST['apellidos'] ?>>
            <input type="hidden" name="aficiones" value=<?php echo json_encode($_POST['aficiones']) ?>>
            <input type="hidden" name="estudios" value=<?php echo json_encode($_POST['estudios']) ?>>
            <!-- Hay que ir arrastrando el valor de los botones para que no se vuelvan a cumplir las condiciones y vuelva atrás -->
            <!-- Esto es debido a que cada vez que se pulsa un botón se pierde la información anterior -->
            <input type="hidden" name="boton1" value=<?php echo $_POST['boton1'] ?>>

        </form>
        <?php
    } else if (isset($_POST['boton2'])) { //Una vez se ha pulsado lel boton2 se pasa a la tercera parte
        //TERCERA PARTE
        //Para entrar en la tercera parte hay que comprobar que no se ha pulsado el boton3
        if (!isset($_POST['boton3'])) {
            //Mostrar los datos recogidos
            echo '<h1>Tus datos son:</h1>';
            echo "Nombre: " . $_POST['nombre'] . '<br>';
            echo "Apellidos: " . $_POST['apellidos'] . '<br>';
            
            $aficion = json_decode($_POST['aficiones']);
            echo "Aficiones: <br>";
            foreach ($aficion as $value) {
                echo "-" . $value . "<br>";
            }
            echo "Estudios: <br>";
            $estudio = json_decode($_POST['estudios']);
            foreach ($estudio as $value) {
                echo "-" . $value . "<br>";
            }
            
            echo "Sexo: " . $_POST['sexo'] . '<br>';
            echo "Estado civil: " . $_POST['estado'] . '<br>';
            echo "Edad: " . $_POST['edad'];
            ?>
            <form action="" method="POST">
                <input type="submit" name="boton3" value="Siguiente">
                <input type="submit" name="cancelar" value="Cancelar">
                <!-- En este caso hay que acumular como oculto el boton1 y boton2 -->
                <input type="hidden" name="boton1" value=<?php echo $_POST['boton1'] ?>>
                <input type="hidden" name="boton2" value=<?php echo $_POST['boton2'] ?>>

            </form>
            <?php
        } else if (isset($_POST['boton3'])) { //Si ya se ha pulsado el boton3 termina el programa
            echo '<h1>Tus datos se han hackeado correctamente</h1>';
        }
    }
}
?>