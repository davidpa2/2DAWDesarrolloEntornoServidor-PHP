<?php
require_once '../Model/Usuario.php';
require_once '../Model/Juego.php';
require_once '../Controller/JuegoController.php';
session_start();

if (!isset($_SESSION['usuario'])) {
            header("Location:index.php");
        }

if (isset($_POST['registrar'])) {

    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $fichero = $_FILES['foto']['name'] . "-" . time();
        $ruta = "../images/" . $fichero;
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);

        $juego = new Juego($_POST["nombreJuego"], $_POST["consola"], $_POST["anno"], $_POST["precio"], "NO", $ruta, $_POST["descripcion"]);

        JuegoController::insertarJuego($juego);
    } else {
        echo "ERROR AL SUBIR LA FOTICO";
    }
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
        <div class="container-fluid">
            <div id="formLogin" class="container bg-light my-5 py-4" style="width: 50%; border-radius: 20px;">
                <h1 class="text-center">Registro de juegos</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label for="nombreJuego" class="form-label">Nombre del juego:</label>
                            <input type="text" name="nombreJuego" id="nombreJuego" 
                                   class="form-control" placeholder="Nombre" required/><br>
                        </div>

                        <div class="col">
                            <label for="consola" class="form-label">Nombre de la consola:</label>
                            <input type="text" name="consola" id="Consola" 
                                   class="form-control" placeholder="consola" required/><br>
                        </div>                    
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="anno" class="form-label">Año:</label>
                            <input type="number" name="anno" id="anno" class="form-control" placeholder="Año"/><br>
                        </div>

                        <div class="col">
                            <label for="precio" class="form-label">Precio:</label>
                            <input type="number" name="precio" id="precio" class="form-control" placeholder="Precio"/><br>
                        </div>                    
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="descripcion" class="form-label">Descripción:</label><br>
                            <textarea id="descripcion" name="descripcion" rows="5" cols="58 "></textarea><br><br>
                        </div>  

                        <div class="col">
                            <label for="imagen" class="form-label">Imagen:</label><br>
                            <input type="file" name="foto" id="foto" accept="image/png,image/jpeg"><br><br>
                        </div>                                        
                    </div>

                    <div class="d-flex justify-content-around d-inline-block">
                        <button type="submit" class="btn btn-secondary" name="registrar" id="registrar">
                            Registrar
                        </button>
                        <a class="btn btn-outline-secondary" href="AdministrarJuegos.php">Volver</a>
                    </div>
                    <?php
                    if (isset($juego)) {
                        echo "<p class='text-center mt-4'>Se ha registrado el juego $juego->nombreJuego</p>";
                    }
                    ?>

                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>