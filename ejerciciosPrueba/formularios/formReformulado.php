<?php
/*
 * Validación de datos php ALGORITMO:
 * 
            if(formularioEnviado){
                validarDatos();
            if(formularioEnviado $$ noHayErrores){
                    procesarFormulario;
            } else {
                mostrarFormularioConErrores; //aquí se une el form que se muestra la primera vez y el que tiene errores
            }
 */

$nombre = false; 
$apellido = false; 
$modulos = false;

if (isset($_POST['enviar'])) { //si se ha enviado, validamos datos
    //entramos aquí si todo el formulario es correcto
    
    if ($_POST['nombre'] == "David") $nombre = true;
    if ($_POST['apell'] == "Padilla") $apellido = true;
    if (isset($_POST['modulos'])) $modulos = true;
 
}       
if (isset($_POST['enviar']) && $nombre && $apellido && $modulos) {//entramos aquí si se ha enviado y no hay errores en el formulario
    
    //Procesamos datos
     echo $_POST['nombre'] . " " . $_POST['apell'] . "<br>"; 

       
    echo 'Los módulos matriculados son: ';
    foreach ($_POST['modulos'] as $value) {
        echo $value . "<br>";
    }
      
    echo '<br><a href="formReformulado.php">Volver</a>';
        
}else{ //entramos aquí cuando se muestre el formulario por primera vez o cuando haya errores isset($_POST['modulos'])
        ?>
        <html>
            <head>
                <title>Formulario</title>
            </head>
            <body>
                <form action="" method="POST">
                    Nombre: <input type="text" name="nombre" value=<?php if($nombre) echo $_POST['nombre'] ?>>
                        <?php if (isset($_POST['nombre']) && $_POST['nombre'] != "David") echo ' Nombre incorrecto';?><br>              
                    Apellidos: <input type="text" name="apell" value=<?php if($apellido)   echo $_POST['apell'] ?>>
                        <?php if (isset($_POST['apell']) && $_POST['apell'] != "Padilla") echo ' Apellido incorrecto'; ?><br>

                    Módulos: <br>
                    <input type="checkbox" name="modulos[]" value="DWES" <?php if(isset($_POST['modulos']) && in_array( "DWES", $_POST['modulos'])) echo "checked = checked" ?> >Desarrollo Web Entorno Servidor</input><br>
                    <input type="checkbox" name="modulos[]" value="DWEC" <?php if(isset($_POST['modulos']) && in_array( "DWEC", $_POST['modulos'])) echo "checked = checked" ?>>Desarrollo Web Entorno Cliente</input><br>
                    <?php if (isset($_POST['enviar']) && !isset($_POST['modulos'])) echo "Debe seleccionar al menos un módulo<br>"; ?>

                    <input type="submit" name="enviar" value="Enviar">
                </form>
            </body>
        </html>

    <?php
}
?>