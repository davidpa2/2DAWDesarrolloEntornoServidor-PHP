<?php
require_once '../Model/Juego.php';
require_once '../Controller/UsuarioController.php';
session_start();
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
        $decodificar = json_decode($_GET['juego']);
        ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-7">
                    <h1><?php echo $decodificar->nombreJuego ?></h1>
                    <hr>
                    <p><b>Consola: </b><?php echo $decodificar->nombreConsola ?></p>
                    <p><b>Año: </b><?php echo $decodificar->anno ?></p>
                    <p><b>Precio: </b><?php echo $decodificar->precio ?> €</p>
                    <p><b>Descripción: </b><?php echo $decodificar->descripcion ?></p>
                    <div class="row">
                    <?php
                    if (isset($_SESSION['usuario'])) {
                        if ($_SESSION['usuario']->getTipo() == "cliente" && $decodificar->alquilado == "NO") {
                            ?>
                        <div class="col">
                            <form action="" method="POST">
                                <input type="submit" class="btn btn-secondary" name='alquilar' value="Alquilar">
                            </form>
                        </div>
                            <?php
                        } else {
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
                    <img src="<?php echo $decodificar->imagen ?>" width ='300px'/>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>