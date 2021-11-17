<?php
//En el array de opciones hay que especificar que se devuelvan las excepciones
$options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

$numeroError = 0;
$mensajeError;

try {
    $dwes = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4', 'dwes', 'abc123.', $options);
} catch (PDOException $exc) {
    $numeroError = 1;
    $mensajeError = $exc->getMessage();
}

if (isset($_POST['actualizar'])) {

    try {
        $result2 = $dwes->exec("update producto set nombre = '$_POST[nombre]', descripcion = '$_POST[descripcion]', PVP = '$_POST[pvp]' where cod = '$_POST[cod]'");
    } catch (PDOException $exc) {
        $numeroError = 1;
        $mensajeError = $exc->getMessage();
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Familias de productos</title>
        <link href="../Estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="encabezado">
            <h1>Ejercicio: Listado de productos de una familia</h1>
        </div>

        <div id="contenido">
            <h2>Producto:</h2>
            <?php
            if (!$numeroError) {
                if (isset($_POST['modificar'])) {

                    try {
                        $result = $dwes->query("select * from producto where cod = '$_POST[cod]'");

                        $fila = $result->fetch();
                        ?>

                        <form action="" method="POST">
                            Nombre corto: <input readonly type="text" name="nombreCorto" value="<?php echo $fila->nombre_corto ?>"><br>
                            Nombre: <input type="text" name="nombre" value="<?php echo $fila->nombre ?>"><br>
                            Descripción: <textarea rows="15" cols="100" name="descripcion"><?php echo $fila->descripcion ?></textarea><br>
                            Precio: <input type="number" name="pvp" value="<?php echo $fila->PVP ?>"><br>
                            <input type="hidden" name="cod" value="<?php echo $_POST['cod'] ?>">
                            <input type="hidden" name="modificar" value="<?php echo $_POST['modificar'] ?>">
                            <input type="submit" name="actualizar" value="Actualizar">
                            <?php
                            if (isset($_POST['actualizar'])) {
                                echo 'Se han modificado los campos correctamente';
                            }
                            ?>
                        </form>
                        <form action="Listado.php" method="POST">
                            <input type="submit" name="volver" value="Volver">
                        </form><?php
                    } catch (PDOException $exc) {
                        $numeroError = 1;
                        $mensajeError = $exc->getMessage();
                    }
                }
            }
            ?>
        </div>

        <div id="pie">
            <?php
            if ($numeroError) {
                echo $mensajeError;
            }
            ?>
        </div>
    </body>
</html>