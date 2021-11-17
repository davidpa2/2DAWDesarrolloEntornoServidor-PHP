<html>
    <head>
        <title>Agenda</title>
        <link href="agenda.css" rel="stylesheet" type="text/css" media="all"/>
    </head>
    <body>

        <?php
        require_once 'FuncionesAgenda.php';
        if (isset($_POST['guardar'])) { //Primero comprobar que se ha pulsado el botón
            $agend = json_decode($_POST['agenda'], true); //Decodificar el array pasado, la primera vez está vacío, pero se inicializa
            //Comprobar que el nombre está vacío
            if (empty($_POST['nombre'])) {
                echo '<div class="error">El nombre está vacío</div>';
            } else {
                //Si no está vacío el nombre, comprobar que el número no está
                if (empty($_POST['numero'])) {
                    //if (isset($agend[$_POST['nombre']])) {
                    //Buscar comprobar que el nombre introducido existe
                    if (array_key_exists($_POST['nombre'], $agend)) {    
                        unset($agend[$_POST['nombre']]); //Si existe se elimina de la agenda ese contacto
                        echo '<div class="correcto">Contacto eliminado correctamente</div>';
                    } else { //Si no existe, mostrar error como que no existe
                        echo '<div class="error">' . $_POST['nombre'] . ' no está anotado en la agenda</div>';
                    }
                } else { //En el caso de que se pase nombre y número
                        //Si no existía ese nombre en la agenda se añade
                        if (empty($agend['nombre'])) {
                            echo '<div class="correcto">Contacto añadido a la agenda</div>';
                        } else { //Si ya existía se modifica
                            echo '<div class="correcto">Contacto modificado correctamente</div>';         
                        }       
                        $agend[$_POST['nombre']] =  $_POST['numero']; //Es lo mismo modificar que añadir uno
                        
                }
            }
            mostrarAgenda($agend);
        }
        ?>
        <div class="formulario">
            <form action="" method="POST">
                Nombre: <input type="text" name="nombre"><br>
                Número de teléfono:<input type="text" name="numero"><br> <!--La primera vez no se arrastra el $_POST del botón por lo que no se codifica el array-->
                <input type="hidden" name="agenda" value=<?php if (isset($_POST['guardar'])) echo json_encode($agend); ?>>
                <input type="submit" name="guardar" value="Guardar">
            </form>
        </div>

    </body>
</html>
