<?php
if (isset($_POST['enviar'])){
    echo 'Nombre: '.$_POST['nombre'];
    echo '<br>Apellido: '.$_POST['apellidos'];
    
    if (isset($_POST['sexo'])){
        echo '<br>Sexo: '.$_POST['sexo'];
    } else {
        echo '<br>No se ha seleccionado ningún sexo';
    }
    
    if (isset($_POST['estado'])){
        echo '<br>Estado civil: '.$_POST['estado'];
    } else {
        echo '<br>No se ha seleccionado ningún Estado Civil';
    }
    
    if (isset($_POST['aficiones'])){
        echo '<br>Aficiones: ';   
        foreach ($_POST['aficiones'] as $value){
            echo $value . "<br>";
        }
    }
      
    if (isset($_POST['estudios'])){
        echo '<br>Estudios: ';
        foreach ($_POST['estudios'] as $value){
            echo $value . "<br>";
        }
    } else {
        echo '<br>No se ha seleccionado ningún estudio';
    }
   

    echo '<br>Edad: '.$_POST['edad'];
} else {
?>
    <html>
    <head>
        <title>Form</title>
    </head>
    <body>
        <form action="" method="POST">
            Nombre: <input type="text " name="nombre"> <br>
            Apellidos: <input type="text " name="apellidos"> <br><br>
            
            Sexo: <br>
            <input type="radio"  name="sexo" value="Hombre">Hombre 
            <input type="radio"  name="sexo" value="Mujer">Mujer<br><br>
            
            Estado civil: <br>
            <input type="radio"  name="estado" value="Soltero">Soltero 
            <input type="radio"  name="estado" value="Casado">Casado
            <input type="radio"  name="estado" value="Otro">Otro<br><br>
            
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

            Edad: 
            <select name="edad">
                <option>Entre 1 y 14 años</option>
                <option>Entre 15 y 25 años</option>
                <option>Entre 26 y 35 años</option>
                <option>Mayor de 35 años</option>
            </select><br><br>

            <input type="submit" name="enviar" value="Enviar">
        </form> 
    </body>
</html>
<?php } 