<?php
if (isset($_POST['enviar'])) {
    echo $_FILES['foto']['name'] . "<br>";
    echo $_FILES['foto']['tmp_name'] . "<br>";
    echo $_FILES['foto']['size'] . "<br>";
    echo $_FILES['foto']['type'] . "<br>";
    echo $_FILES['foto']['error'] . "<br>";

    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $fichero = $_FILES['foto']['name'] . "-" . time();
        $ruta = "fotos/" . $fichero;
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
        echo 'Se ha movido';

        $conexion = new mysqli("localhost", "dwes", "abc123.", "imagenes");
        $conexion->query("insert into fotos (ruta) values ('$ruta')");
        $conexion->close();
    } else {
        echo "ERROR AL SUBIR LA FOTICO";
    }
}
if (isset($_POST['mostrar'])) {
    $conexion = new mysqli("localhost", "dwes", "abc123.", "imagenes");
    $result = $conexion->query("select * from fotos");
    echo 'PAYASO';
    while ($fila = $result->fetch_object()) {
        echo "<a href=mostrar.php?ruta=$fila->ruta><img src='$fila->ruta' width=50 height=50></a>";
    }
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="foto" id="foto" accept="image/png,image/jpeg"><br>
    <input type="submit" name="enviar" value="Enviar">
    <input type="submit" name="mostrar" value="Mostrar">
</form>