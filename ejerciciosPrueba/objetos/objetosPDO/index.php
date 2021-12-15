<?php

require_once 'Producto.php';
$p = new Producto();
$p->nuevoP(3, "zapatos", 48);
$error = $p->insertar();
if ($error) {   
    if ($error == 1062) {
        echo 'Ya existe un producto con ese nombre<br>';
    }
    //echo $error;
} else {
    echo 'Se ha insertado correctamente<br>';
}

$p1 = Producto::buscarProducto(5);
echo $p1;

$productos = Producto::mostrarProductos();
foreach ($productos as $value) {
    echo '<br>Codigo: ' . $value->getCodigo() . "";
    echo '<br>Nombre: ' . $value->getNombre() . "";
    echo '<br>Precio: ' . $value->getPrecio() . "<hr>";
}