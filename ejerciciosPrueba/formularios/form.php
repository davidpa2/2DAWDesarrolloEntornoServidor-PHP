<?php
if (isset($_POST['enviar'])) { //Si se ha pulsado el botón de enviar, se pasa a comprobar si se ha introducido el nombre, apellido
                                            //y si se ha marcado algún módulo
    if ($_POST['nombre'] == "David" && $_POST['apell'] == "Padilla" && isset($_POST['modulos'])) {
        //Si se ha puesto correcto, se muestra por pantalla sin errores
        echo $_POST['nombre'] . " " . $_POST['apell'] . "<br>";

        echo 'Los módulos matriculados son: ';
        foreach ($_POST['modulos'] as $value) { //Mostrar los módulos seleccionados
            echo $value . "<br>";
        }
 
        echo '<br><a href="form.php">Volver</a>'; //Botón de volver
    } else { //Si no se ha verificado todo correctamente, pasar a mostrar de nuevo el formulario diciendo los errores que haya habido
        ?>

<form action="" method="POST">                                          <!-- Si el nombre estaba correcto, poner el nombre que había -->
                Nombre: <input type="text" name="nombre" value=<?php if ($_POST['nombre'] == "David") echo $_POST['nombre'] ?>>
                                                                                                <!-- Si no estaba bien, se borra y muestra el error -->
                                                                                                <?php if ($_POST['nombre'] != "David") echo ' Nombre incorrecto'; ?><br>
                                                                                                <!-- Igual con el apellido -->
                Apellidos: <input type="text" name="apell" value=<?php if ($_POST['apell'] == "Padilla") echo $_POST['apell'] ?>>
                                                                                              <?php if ($_POST['apell'] != "Padilla") echo ' Apellido incorrecto'; ?><br>

                Módulos: <br> <!-- Comprobar ahora los módulos, primero hay que ver si se ha creado el array de módulos y si en ese array está ese módulo en el array -->
                <input type="checkbox" name="modulos[]" value="DWES"
                            <?php if (isset($_POST['modulos']) && in_array("DWES", $_POST['modulos'])) echo "checked=checked" ?>>Desarrollo Web Entorno Servidor</input><br>
                <input type="checkbox" name="modulos[]" value="DWEC"
                       <?php if (isset($_POST['modulos']) && in_array("DWEC", $_POST['modulos'])) echo "checked=checked" ?>>Desarrollo Web Entorno Cliente</input><br>
                <!-- Si no está creado el array modulos quiere decir que no se ha marcado ningún módulo y se mostrará el error -->
                <?php if (!isset($_POST['modulos'])) echo "Debe seleccionar algún módulo<br>";?>
                
                <input type="submit" name="enviar" value="Enviar">
            </form>

        <?php
    }
} else {
    ?>


    <html> <!-- Primera vez que se ejecuta el formulario, todo estará en blanco -->
        <head>
            <title>Formulario</title>
        </head>
        <body>
            <form action="" method="POST">
                Nombre: <input type="text" name="nombre"><br>
                Apellidos: <input type="text" name="apell"><br>

                Módulos: <br>
                <input type="checkbox" name="modulos[]" value="DWES">Desarrollo Web Entorno Servidor</input><br>
                <input type="checkbox" name="modulos[]" value="DWEC">Desarrollo Web Entorno Cliente</input><br>

                <input type="submit" name="enviar" value="Enviar">
            </form>

            <!--<a href="form2.php?nombre=PEPE&apell=Lopez">Form2</a>-->
        </body>
    </html>

    <?PHP
}
?>