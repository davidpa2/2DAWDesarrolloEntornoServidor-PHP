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
        <title>Historial</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    </head>
    <body>
        <?php
        require_once 'Navbar.php';
        ?>
        <div class="container-fluid">    
            <div class="row mt-3 justify-content-center">
                <div class="col-10">
                    <h2 class="text-center mb-4">Historial de juegos alquilados</h2>
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Carátula</th>
                                <th>Nombre del juego</th>
                                <th>Consola</th>
                                <th>Año lanzamiento</th>
                                <th>Precio</th>
                                <th>Fecha de alquiler</th>
                                <th>Fecha de devolución</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $listaAlquileres = AlquilerController::mostrarHistorial($_SESSION['usuario']->getDni());

                            foreach ($listaAlquileres as $alquiler) {
                                $juego = JuegoController::buscarJuegoPorCodigo($alquiler->getCodJuego());
                                echo '<tr>';
                                echo '<td><img src="' . $juego->getImagen() . '" width ="100px"></td>';
                                echo '<td>' . $juego->getNombreJuego() . '</td>';
                                echo '<td>' . $juego->getNombreConsola() . '</td>';
                                echo '<td>' . $juego->getAnno() . '</td>';
                                echo '<td>' . $juego->getPrecio() . '</td>';
                                echo '<td>' . $alquiler->getFechaAlquiler() . '</td>';
                                echo '<td>' . $alquiler->getFechaDevol() . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>