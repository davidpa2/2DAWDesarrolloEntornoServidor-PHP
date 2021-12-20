<?php
require_once '../Model/Usuario.php';
require_once '../Model/Juego.php';
require_once '../Controller/JuegoController.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location:index.php");
}
?>
<html>
    <head>
        <title>title</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <style>
            html,body{
                overflow-x: hidden;
            }          
        </style>
    </head>
    <body>
        <?php
        require_once 'Navbar.php';

        if (isset($_POST['eliminar'])) {
            JuegoController::eliminarJuego($_POST['juego']);
        }
        ?>
        <div class="row mt-4 justify-content-center">
            <div class="col-10">
                <h2 class="text-center mb-4">Gestionar juego</h2>
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Carátula</th>
                            <th>Nombre del juego</th>
                            <th>Consola</th>
                            <th>Año lanzamiento</th>
                            <th>Precio</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $listaJuegos = JuegoController::mostrarJuegos();

                        foreach ($listaJuegos as $juego) {
                            echo '<tr>';
                            ?>
                            <?php
                            if ($juego->getAlquilado() == 'SI') {
                                echo "<td><a href='VistaJuego.php?juego=" . $juego->getCodigo() . "'><img src='" . $juego->getImagen() . "' width ='100px' style='filter: grayscale(100);'></a></td>";
                            } else {
                                echo "<td><a href='VistaJuego.php?juego=" . $juego->getCodigo() . "'><img src='" . $juego->getImagen() . "' width ='100px'></a></td>";
                            }

                            echo '<td>' . $juego->getNombreJuego() . '</td>';
                            echo '<td>' . $juego->getNombreConsola() . '</td>';
                            echo '<td>' . $juego->getAnno() . '</td>';
                            echo '<td>' . $juego->getPrecio() . '</td>';
                            echo '<td>';
                            ?>
                        <form action="ModificarJuego.php" method="POST">
                            <input type="hidden" name="juego" value='<?php echo json_encode($juego) ?>'>
                            <input type="submit" class="btn btn-secondary" name='modificar' value="Modificar">
                        </form>
                        <?php
                        echo '</td>';
                        echo '<td>';
                        ?>
                        <form action="" method="POST">
                            <input type="hidden" name="juego" value='<?php echo $juego->getCodigo() ?>'>
                            <input type="submit" class="btn btn-secondary" name='eliminar' value="Eliminar">
                        </form>
                        <?php
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>