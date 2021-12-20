<?php
require_once '../Controller/JuegoController.php';
require_once '../Controller/UsuarioController.php';
require_once '../Controller/AlquilerController.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location:index.php");
}
?>

<html>
    <head>
        <title>Tu tienda</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    </head>
    <body>
        <?php
        require_once 'Navbar.php';

        if (isset($_POST['devolver'])) {
            AlquilerController::devolverJuego(json_decode($_POST['juego']), $_SESSION['usuario']->getDni());
        }

        $listaAlquileres = AlquilerController::mostrarAlquiadosUsuario($_SESSION['usuario']->getDni());
        if ($listaAlquileres) {
            ?>
            <div class="container-fluid">       
                <div class="row mt-3 justify-content-center">
                    <div class="col-10">
                        <h2 class="text-center mb-4 ">Juegos alquilados</h2>
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Carátula</th>
                                    <th>Nombre del juego</th>
                                    <th>Consola</th>
                                    <th>Año lanzamiento</th>
                                    <th>Precio</th>
                                    <th>Fecha de alquiler</th>
                                    <th>Devolver</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($listaAlquileres as $alquiler) {
                                    $juego = JuegoController::buscarJuegoPorCodigo($alquiler->getCodJuego());
                                    echo '<tr>';
                                    echo '<td><img src="' . $juego->getImagen() . '" width ="100px"></td>';
                                    echo '<td>' . $juego->getNombreJuego() . '</td>';
                                    echo '<td>' . $juego->getNombreConsola() . '</td>';
                                    echo '<td>' . $juego->getAnno() . '</td>';
                                    echo '<td>' . $juego->getPrecio() . '</td>';
                                    echo '<td>' . $alquiler->getFechaAlquiler() . '</td>';
                                    echo '<td>';
                                    ?>
                                <form action="" method="POST">
                                    <input type="hidden" name="juego" value='<?php echo json_encode($juego) ?>'>
                                    <input type="submit" class="btn btn-secondary" name='devolver' value="Devolver">
                                </form>
                                <?php
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        ?>
                        <div class="alert alert-danger">
                            No has alquilado ningún juego.
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>