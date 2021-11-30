<?php
session_name("sesion");
session_start();
if (isset($_SESSION['usuario'])) {
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
        http://www.w3.org/TR/html4/loose.dtd">
    <!-- Desarrollo Web en Entorno Servidor -->
    <!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
    <!-- Ejemplo: Ejemplo: Tienda web. cesta.php -->
    <html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <title>Ejemplo Tema 4: TIENDA-Listado de productos</title>
            <link href="tienda.css" rel="stylesheet" type="text/css">
        </head>
        <body class="pagcesta">
            <div id="contenedor">
                <div id="encabezado">
                    <h1>Cesta de la compra</h1>
                </div>
                <div id="productos">
                    <table>
                        <tr>
                            <th>Cantidad</th>
                            <th>Producto</th>
                            <th>Precio</th>
                        </tr>
                        <?php
                        $suma = 0;
                        foreach ($_SESSION['cesta'] as $cod => $producto) {
                            echo "<tr>";
                            foreach ($producto as $key => $value) {
                                if ($key == "cantidad") {
                                    echo "<td>" . $value . "</td>";
                                    $cantidad = $value;
                                }
                                if ($key == "nombre") {
                                    echo "<td>" . $value . "</td>";
                                }
                                if ($key == "precio") {
                                    $suma += $value * $cantidad;
                                    echo "<td>" . $value . " </td>";
                                }
                            }
                            echo "</tr>";
                        }
                        ?>
                    </table>
                    <hr/>
                    <p><span class="pagar">Precio total: <?php echo $suma; ?> €</span></p>
                    <form action="pagar.php" method="POST">
                        <p><span class="pagar"><input type="submit" name="pagar" value="Pagar"></span></p>
                    </form>
                </div>
                <br class="divisor" />
                <div id="pie">
                    <form action="logoff.php" method="POST">
                        <input type="submit" name="salir" value="Salir">
                    </form>

                    <p class='error'>   </p>                
                </div>
            </div>            
        </body>
    </head>
    </html>
    <?php
} else {
    echo 'Acceso denegado';
}