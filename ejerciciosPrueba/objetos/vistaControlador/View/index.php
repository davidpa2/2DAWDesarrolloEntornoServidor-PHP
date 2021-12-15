<?php
require_once '../Controller/ProductoController.php';
require_once '../Controller/Conexion.php';

if (isset($_POST['insertar'])){
    $p = new Producto($_POST['cod'], $_POST['nom'], $_POST['pre']);
    ProductoController::insertar($p);
}

if (isset($_POST['mostrar'])){
    $listaP = ProductoController::mostrarProductos();
    foreach ($listaP as $value){
        echo "<br>Codigo: ". $value->getCodigo()."<br>";
        echo "<br>Nombre: ". $value->getNombre()."<br>";
        echo "<br>Precio: ". $value->getPrecio()."<br><hr>";      
    }
}
?>
<form action="" method="POST">
    Código: <input type="text" name="cod"><br>
    Nombre: <input type="text" name="nom"><br>
    Precio: <input type="text" name="pre"><br><hr>
    <input type="submit" name="insertar" value="Insertar"><br>
    <input type="submit" name="mostrar" value="Mostrar"><br>
</form>