<?php
require_once '../Model/Juego.php';
require_once '../Controller/UsuarioController.php';
require_once '../Controller/JuegoController.php';
require_once '../Controller/AlquilerController.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location:index.php");
}
?>

<html>
    <head>
        <title>Juego</title>
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
        $juego = JuegoController::buscarJuegoPorCodigo($_GET['juego']);
        if (isset($_POST['alquilar'])) {
            AlquilerController::alquilarJuego(json_decode($_POST['juego']), $_SESSION['usuario']->getDni());
        }
        ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-7">
                    <h1><?php echo $juego->nombreJuego ?></h1>
                    <hr>
                    <p><b>Consola: </b><?php echo $juego->nombreConsola ?></p>
                    <p><b>Año: </b><?php echo $juego->anno ?></p>
                    <p><b>Precio: </b><?php echo $juego->precio ?> €</p>
                    <p><b>Descripción: </b><?php echo $juego->descripcion ?></p>
                    <div class="row">
                        <?php
                        if (isset($_SESSION['usuario'])) {
                            if ($_SESSION['usuario']->getTipo() == "cliente" && $juego->alquilado == "NO") {
                                ?>
                                <div class="col">
                                    <form action="" method="POST">
                                        <input type="hidden" name="juego" value='<?php echo json_encode($juego) ?>'>
                                        <input type="submit" class="btn btn-secondary" name='alquilar' value="Alquilar">
                                    </form>
                                </div>
                                <?php
                            } else if ($_SESSION['usuario']->getTipo() == "cliente") {
                                echo '<p class="text-danger">Este juego está alquilado</p>';
                            }
                        }
                        ?>
                        <div class="col">
                            <form action="index.php">
                                <input type="submit" class="btn btn-outline-secondary" name='volver' value="Volver">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <img src="<?php echo $juego->imagen ?>" width ='300px'/>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>