<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Actualizar stock</title>
        <link href="Estilos.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        $dwes = @new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
        $numeroError = 0;
        if ($dwes->connect_errno) {
            $mensajeError = $dwes->connect_error;
            $numeroError = 1;
        } else {

            $dwes->set_charset('utf8');
            ?>

            <div id="encabezado">
                <h1>Ejercicio: Consultas preparadas en MySQLi</h1>
                <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    Producto: <select name="stock">
                        <?php
                        $result = $dwes->query('select nombre_corto, cod from producto');
                        if ($dwes->errno) {
                            $mensajeError = $dwes->error;
                            $numeroError = 1;
                        } else {

                            while ($fila = $result->fetch_object()) {
                                ?>
                                <option value='<?php echo $fila->cod ?>'
                                <?php
                                if (isset($_POST['mostrar'])) {
                                    $cod = $fila->cod;
                                    $nom = $_POST['stock'];
                                    if ($cod == $nom)
                                        echo 'selected';
                                }
                                ?>>
                                    <?php echo $fila->nombre_corto ?> </option>;
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <input type="submit" value="Mostrar stock" name="mostrar">
                </form>
            <?php } ?>    
        </div>

        <div id="contenido">
            <h2>Stock del producto en las tiendas:</h2>
            <?php
            if (isset($_POST['mostrar'])) {
                $stmt = $dwes->stmt_init(); //Inicializar un objeto de tipo stmt
                $stmt->prepare('select s.unidades, t.nombre, s.tienda from stock s, tienda t where t.cod = s.tienda and s.producto =binary ?'); //Preparar la consulta
                $stmt->bind_param('s', $_POST['stock']);
                $stmt->execute();
                $result2 = $stmt->get_result();
                if ($dwes->errno) {
                    $mensajeError = $dwes->error;
                    $numeroError = 1;
                } else {
                    echo '<form method="POST" action="">';
                    while ($fila = $result2->fetch_object()) {
                        $tiendas[] = $fila->tienda;
                        echo "Tienda: " . $fila->nombre . ": <input type='text' name='cantidad[]' value='$fila->unidades'> unidades<br><br>";
                        echo "<input type='hidden' name='tienda[]' value='$fila->tienda'>";
                    }
                    echo "<input type='hidden' name='cod' value='$_POST[stock]'>";
                    echo '<br><input type="submit" value="Actualizar stock" name="actualizar">';
                    echo '</form>';
                }
                $stmt->close();
            }

            if (isset($_POST['actualizar'])) {

                $stmt = $dwes->stmt_init();
                $stmt->prepare('update stock set unidades= ? where producto= binary ? and tienda= ?'); //Preparar la consulta

                if (!$stmt->errno) {
                    for ($i = 0; $i < count($_POST['tienda']); $i++) {
                        $stmt->bind_param('isi', $_POST['cantidad'][$i], $_POST['cod'], $_POST['tienda'][$i]);
                        $stmt->execute();
                    }
                    echo '<br><p>Se han actualizado los campos</p>';
                    $stmt->close();
                } else {
                    $mensajeError = $dwes->error;
                    $numeroError = 1;
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
