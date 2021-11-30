<?php
session_name("sesion");
session_start();

if (isset($_SESSION['usuario'])) {
    $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    try {
        $dwes = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4', 'dwes', 'abc123.', $options);
        $result = $dwes->query("select * from producto");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }

    if (isset($_POST['vaciar'])) {
        foreach ($_SESSION['cesta'] as $producto) {
            array_pop($_SESSION['cesta']);
        }
    }
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
        http://www.w3.org/TR/html4/loose.dtd">
    <!-- Desarrollo Web en Entorno Servidor -->
    <!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
    <!-- Ejemplo: Ejemplo: Tienda web. productos.php -->
    <html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <title>Ejemplo Tema 4: TIENDA-Listado de productos</title>
            <link href="tienda.css" rel="stylesheet" type="text/css">
        </head>
        <body class="pagproductos">
            <div id="contenedor">
                <div id="encabezado">
                    <h1>Listado de productos</h1>
                </div>
                <div id="cesta">
                    <h3><img src="cesta.jpg" alt="Cesta" width="24" height="21">Cesta</h3>
                    <hr/>
                    <?php
                    if (isset($_POST['agregar'])) {
                        
                        if (isset($_SESSION['cesta'][$_POST['agregar']])) {
                            $_SESSION['cesta'][$_POST['agregar']]["cantidad"] += 1;
                        } else {
                            $_SESSION['cesta'][$_POST['agregar']] = [];
                            $_SESSION['cesta'][$_POST['agregar']] = array("cantidad" => 1, "nombre" => $_POST['nombre'], "precio" => $_POST['precio']);
                        }

                        foreach ($_SESSION['cesta'] as $key1 => $cod) {
                            echo $key1 . ": ";
                            foreach ($cod as $key2 => $value) {

                                if ($key2 == "cantidad") {
                                    echo $value . " unidades";
                                    echo "<hr><br>";
                                }
                            }
                        }
                    }
                    ?>
                    <form action="" method="POST">
                        <input type="submit" name="vaciar" value="Vaciar Cesta" <?php if (!isset($_SESSION['cesta'])) echo "disabled"; ?>>
                    </form>
                    <form action="cesta.php" method="POST">
                        <input type="submit" name="comprar" value="Comprar" <?php if (!isset($_POST['agregar'])) echo "disabled"; ?>>
                    </form>

                </div>
                <div id="productos">
                    <?php
                    if ($result->rowCount()) {
                        while ($producto = $result->fetch()) {
                            ?>
                            <div id="producto">
                                <form action="" method="POST">
                                    <button type="submit" name="agregar" value="<?php echo $producto->cod ?>">Añadir</button>  
                                    <input type="text" readonly name="nombre" size="50" value="<?php echo $producto->nombre_corto ?>">
                                    <input type="text" readonly name="precio" size="4" value="<?php echo $producto->PVP ?>">
                                </form>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <br class="divisor" />
                <div id="pie">
                    <form action="logoff.php" method="POST">
                        <input type="submit" name="salir" value="Salir ">
                    </form>
                    <p class='error'>  </p>
                </div>
            </div>
        </body>
    </html>
    <?php
} else {
    echo 'Acceso denegado';
}
?>