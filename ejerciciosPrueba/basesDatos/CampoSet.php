<form action="" method="POST">
    Nombre: <input type="text" name="nombre"><br>
    Apellidos: <input type="text" name="apell"><br>
    Idiomas: <select name="idiomas[]" multiple="true">
        <option value="1">Castellano</option>
        <option value="2">Francés</option>
        <option value="4">Inglés</option>
        <option value="8">Alemán</option>
        <option value="16">Búlgaro</option>
        <option value="32">Chino</option>
    </select><br><br>
    <input type="submit" name="enviar" value="Guardar">
    <input type="submit" name="recuperar" value="Recuperar">
</form>

<?php
if (isset($_POST['enviar'])) {
    $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
    $suma = 0;
    if ($dwes->connect_error) {
        die("ERROR AL CONECTAR");
    }
    foreach ($_POST['idiomas'] as $value) {
        $suma += $value;
    }
    $dwes->query("insert into alumnos (Nombre,Apellidos,Idiomas) values ('$_POST[nombre]','$_POST[apell]',$suma)");

    if ($dwes->errno) {
        echo $dwes->error . "<br>";
    }

    if ($dwes->affected_rows > 0) {
        echo "REGISTRO COMPLETADO";
    }
    $dwes->close();
}

if (isset($_POST['recuperar'])) {
    $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
    $suma = 0;
    if ($dwes->connect_error) {
        die("ERROR AL CONECTAR");
    }

    $result = $dwes->query("select * from alumnos");
    
    if ($result->num_rows) {

        echo "REGISTRO:<br>";
        while ($fila = $result->fetch_object()) {
            echo "==================================<br>";
            echo "Nombre: " . $fila->Nombre . "<br>";
            echo "Apellidos: " . $fila->Apellidos . "<br>";
            echo "Idiomas: " . $fila->Idiomas . "<br>";
        }
    }
    $dwes->close();
}
?>                                                                                                                                                                                                                                                                                                                                                                                                                                                    