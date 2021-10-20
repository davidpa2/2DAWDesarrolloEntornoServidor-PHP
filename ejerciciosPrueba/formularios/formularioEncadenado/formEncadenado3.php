<?php
if (!isset($_POST['siguiente'])) {
    echo '<h1>Tus datos se han hackeado correctamente</h1>';
} else {
    echo '<h1>Tus datos son:</h1>';
    echo "Nombre: " . $_POST['nombre'] . '<br>';
    echo "Apellidos: " . $_POST['apellidos'] . '<br>';
    echo "Nº de matrícula: " . $_POST['matricula'] . '<br>';
    echo "Curso: " . $_POST['curso'] . '<br>';
    echo "Año: " . $_POST['anio'] . '<br>';
?>
<form action="formEncadenado1.php">
    <input type="submit" name="cancelar" value="Cancelar">
</form>

<form action="">
    <input type="submit" name="aceptar" value="Aceptar">
</form>
<?php
}
?>