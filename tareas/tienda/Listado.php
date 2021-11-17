<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Listado de productos</title>
        <link href="Estilos.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        $dwes = @new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
        $numeroError = 0;
        if ($dwes->connect_errno) {
            $mensajeError = $dwes->connect_error;
            $numeroError = 1;
            //die($dwes->connect_error);
        } else {

            $dwes->set_charset('utf8');
            ?>

            <div id="encabezado">
                <h1>Ejercicio: </h1>
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
                $result2 = $dwes->query('select s.unidades, t.nombre from stock s, tienda t where t.cod = s.tienda and s.producto = "' . $_POST['stock'] . '"');
                if ($dwes->errno) {
                    $mensajeError = $dwes->error;
                    $numeroError = 1;
                } else {

                    while ($fila = $result2->fetch_object()) {
                        echo 'Tienda: ' . $fila->nombre . ': ' . $fila->unidades . ' unidades<br>';
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