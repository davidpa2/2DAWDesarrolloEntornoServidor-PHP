<?php
//En el array de opciones hay que especificar que se devuelvan las excepciones
$options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {

    $dwes = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4', 'dwes', 'abc123.', $options);

    $result = $dwes->prepare("select * from producto where cod=:cod");

    if ($result === false) {
        die("ERROR");
    }
    $codigo = "3DSNG";
    $result->bindParam(":cod", $codigo);
    $result->execute();

    if ($result) {
        while ($fila = $result->fetchObject()) {
            echo 'Código: ' . $fila->cod . '<br>';
            echo 'Nombre: ' . $fila->nombre_corto . '<br>';
            echo 'PVP: ' . $fila->PVP . '<br><br>';
            echo '===============================<br>';
        }
    }
} catch (PDOException $ex) { //Manejar las PDOException ya que por defecto obtiene Exception
    echo 'ERROR: ' . $ex->getMessage();
}