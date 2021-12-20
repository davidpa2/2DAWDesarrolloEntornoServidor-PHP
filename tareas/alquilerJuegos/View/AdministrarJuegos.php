<?php
require_once '../Model/Usuario.php';
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
        ?>
        <div class="container-fluid min-vh-100 d-flex flex-column justify-content-center align-items-center">
            <div class="row w-75">
                <div class="col-4 bg-light p-3">
                    <form action="CrearJuego.php">
                        <h3>Añadir un juego:</h3>
                        <hr>
                        <input type="submit" class="btn btn-secondary" name="annadir" value="Añadir">
                    </form>
                </div>

                <div class="col-4 bg-light p-3">
                    <form action="EliminarJuego.php">
                        <h3>Modificar o eliminar un juego:</h3>
                        <hr>
                        <input type="submit" class="btn btn-secondary" name="eliminar" value="Modificar">
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
