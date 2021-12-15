<?php
require_once '../Controller/JuegoController.php';
require_once '../Controller/UsuarioController.php';
session_start();

if (isset($_POST['cerrarSesion'])) {
    session_unset();
    session_destroy();
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
        ?>
        <div class="container-fluid">    
            <div class="row mt-3 justify-content-center">
                <div class="col-10">
                    <h2 class="text-center mb-4">Juegos disponibles</h2>
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Carátula</th>
                                <th>Nombre del juego</th>
                                <th>Consola</th>
                                <th>Año lanzamiento</th>
                                <th>Precio</th>
                                <?php
                                if (isset($_SESSION['usuario'])) {
                                    if ($_SESSION['usuario']->getTipo() == "cliente") {
                                        echo '<th>Reserva</th>';
                                    }
                                }                                    
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            $listaJuegos = JuegoController::mostrarJuegosDisponibles();

                            foreach ($listaJuegos as $juego) {
                                echo '<tr>';
                                echo '<td><img src="' . $juego->getImagen() . '" width ="100px"></td>';
                                echo '<td>' . $juego->getNombreJuego() . '</td>';
                                echo '<td>' . $juego->getNombreConsola() . '</td>';
                                echo '<td>' . $juego->getAnno() . '</td>';
                                echo '<td>' . $juego->getPrecio() . '</td>';
                                if (isset($_SESSION['usuario'])) {
                                    if ($_SESSION['usuario']->getTipo() == "cliente") {
                                        echo '<td>';
                                        ?>
                                    <form action="" method="POST">
                                        <input type="submit" class="btn btn-secondary" name='alquilar' value="Alquilar">
                                    </form>
                                    <?php
                                    echo '</td>';
                                }
                            }
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