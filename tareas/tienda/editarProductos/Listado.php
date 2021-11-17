<?php
//En el array de opciones hay que especificar que se devuelvan las excepciones
$options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

$numeroError = 0;
$mensajeError;
try {
    $dwes = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4', 'dwes', 'abc123.', $options);
} catch (PDOException $ex) {
    $numeroError = 1;
    $mensajeError = $ex->getMessage();
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
            <?php
            if (!$numeroError) {
                ?>
                <form id="form_seleccion" action="" method="post">
                    Familia: <select name="familia">
                        <?php
                        try {
                            $result = $dwes->query('select distinct * from familia');
                            while ($fila = $result->fetch()) {
                                ?>
                                <option value='<?php echo $fila->cod ?>'
                                <?php
                                if (isset($_POST['mostrar'])) {
                                    $cod = $fila->cod;
                                    $familia = $_POST['familia'];
                                    if ($cod == $familia)
                                        echo 'selected';
                                }
                                ?>>
                                    <?php echo $fila->nombre ?> </option>;
                                <?php
                            }
                        } catch (PDOException $exc) {
                            $numeroError = 1;
                            $mensajeError = $exc->getMessage();
                        }
                        ?>
                    </select>
                    <input type="submit" value="Mostrar productos" name="mostrar">
                </form>  
                <?php
            }
            ?>
        </div>

        <div id="contenido">
            <h2>Productos de la familia:</h2>
            <?php
            if (!$numeroError) {

                if (isset($_POST['mostrar'])) {

                    try {
                        $result2 = $dwes->query("select cod, nombre_corto, PVP from producto where familia = '$_POST[familia]'");

                        while ($fila2 = $result2->fetch()) {
                            ?>
                            <form action="Editar.php" method="POST">
                                <input type="hidden" name="cod" value="<?php echo $fila2->cod ?>">
                                <?php
                                echo "Producto: " . $fila2->nombre_corto . " => " . $fila2->PVP .
                                "€ <input type='submit' name='modificar' value='Editar'><br><br>";
                                ?>
                            </form><?php
                        }
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