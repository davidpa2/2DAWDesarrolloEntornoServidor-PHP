<?php

if (isset($_POST['enviar'])) { //Si ya se ha pulsado el botón enviar hay que proceder a comprobar los datos
    $nombre = false; //Inicializar variables para cada uno de los campos como false para ir comprobando los que
    $dni = false;    //estén bien para ponerlos como true
    $fecha = false;
    $salario = false;

    //Comprobar uno a uno los campos mandados mediante expresiones regulares
    if (preg_match("/^[a-zA-Z]{1,30}$/", $_POST['nombre'])) { //Solo texto de menos de 30 caracteres
        $nombre = true;
    }

    if (preg_match("/^\d{8}[a-z]{1}$/", $_POST['dni'])) { //8 digitos y 1 letra minuscula
        $dni = true;
    }

    if (preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $_POST['fecha'])) { //dd-mm-yyyy
        $fecha = true;
    }

    if ($_POST['salario'] > 2000) { //digito mayor a 2000
        $salario = true;
    }

    //Si tras comprobar los campos, se han puestos todos como verdadero terminar
    if ($nombre && $dni && $fecha && $salario) {
        echo 'Se han validado los campos correctamente';
        
    } else { //Si no se ha validado algun campo, volver a mandar el formulario
        ?>
        <form action="" method="POST">
            Nombre: <input type="text" name="nombre" placeholder="Nombre" value=<?php if($nombre) echo $_POST['nombre']?>>
            <?php if (!$nombre) echo 'Has escrito un nombre incorrecto' ?><br> 
            DNI: <input type="text" name="dni" placeholder="Dni" value=<?php if($dni) echo $_POST['dni']?>>
            <?php if (!$dni) echo 'Has escrito un dni incorrecto' ?><br>
            Fecha de nacimiento: <input type="text" name="fecha" placeholder="dd/mm/yyyy" value=<?php if($fecha) echo $_POST['fecha']?>>
            <?php if (!$fecha) echo 'Has escrito una fecha incorrecta' ?><br>
            Salario: <input type="text" name="salario" placeholder="Salario" value=<?php if($salario) echo $_POST['salario']?>>
            <?php if (!$salario) echo 'Has escrito un salario inferior a 2000' ?><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <?php
    }
} else { //Primera vez que se muestra el formulario 
    ?>
    <form action="" method="POST">
        Nombre: <input type="text" name="nombre" placeholder="Nombre"><br> 
        DNI: <input type="text" name="dni" placeholder="Dni"><br>
        Fecha de nacimiento: <input type="text" name="fecha" placeholder="dd/mm/yyyy"><br>
        Salario: <input type="text" name="salario" placeholder="Salario"><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>

    <?php
}
