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
    </head>
    <body>
        <?php
        require_once 'Navbar.php';
        if (isset($_POST['modificar'])) {
            $juego = json_decode($_POST['juego']);
        }

        if (isset($_POST['actualizar'])) {
            $juegoSinModificar = json_decode($_POST['juego']);
            if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
                $fichero = $_FILES['foto']['name'] . "-" . time();
                $ruta = "../images/" . $fichero;
                move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);

                JuegoController::modificarJuego($juegoSinModificar->codigo, $_POST["nombreJuego"], $_POST["consola"], $_POST["anno"], $_POST["precio"], $ruta, $_POST["descripcion"]);
                echo 'CON IMAGEN';
            } else {
                JuegoController::modificarJuego($juegoSinModificar->codigo, $_POST["nombreJuego"], $_POST["consola"], $_POST["anno"], $_POST["precio"], $juegoSinModificar->imagen, $_POST["descripcion"]);
            }
            header("Location: EliminarJuego.php");
        }
        ?>
        <div class="container-fluid">
            <div id="formLogin" class="container bg-light my-5 py-4" style="width: 50%; border-radius: 20px;">
                <h1 class="text-center">Modificar juego</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label for="nombreJuego" class="form-label">Nombre del juego:</label>
                            <input type="text" name="nombreJuego" id="nombreJuego" 
                                   class="form-control" placeholder="Nombre" required value="<?php echo $juego->nombreJuego ?>"/><br>
                        </div>

                        <div class="col">
                            <label for="consola" class="form-label">Nombre de la consola:</label>
                            <input type="text" name="consola" id="Consola" 
                                   class="form-control" placeholder="consola" required value="<?php echo $juego->nombreConsola ?>"/><br>
                        </div>                    
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="anno" class="form-label">Año:</label>
                            <input type="number" name="anno" id="anno" class="form-control" placeholder="Año" value="<?php echo $juego->anno ?>"/><br>
                        </div>

                        <div class="col">
                            <label for="precio" class="form-label">Precio:</label>
                            <input type="number" name="precio" id="precio" class="form-control" placeholder="Precio" value="<?php echo $juego->precio ?>"/><br>
                        </div>                    
                    </div>

                    <div class="row">
                        <div class="col">                            
                            <label for="imagen" class="form-label">Imagen:</label><br>
                            <img src="<?php echo $juego->imagen; ?>" width="60px"/>
                            <input type="file" name="foto" id="foto" accept="image/png,image/jpeg"><br><br><br>
                        </div>

                        <div class="col">
                            <label for="descripcion" class="form-label">Descripción:</label><br>
                            <textarea id="descripcion" name="descripcion" rows="5" cols="58"><?php echo $juego->descripcion ?></textarea><br>
                        </div>                    
                    </div>
                    <input type="hidden" name="juego" value='<?php echo json_encode($juego); ?>'>
                    <div class="d-flex justify-content-around d-inline-block mt-4">
                        <input type="submit" class="btn btn-secondary" name='actualizar' value="Modificar">
                        <a class="btn btn-outline-secondary" href="EliminarJuego.php">Volver</a>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>