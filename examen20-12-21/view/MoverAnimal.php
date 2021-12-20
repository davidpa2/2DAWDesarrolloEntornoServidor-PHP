<?php
require_once '../controller/ResponsableController.php';
require_once '../controller/JaulaController.php';
require_once '../controller/AnimalController.php';
require_once '../controller/AnimalJaulaController.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: logOff.php");
}

if (isset($_POST['mover'])) {
    $jaulaAnterior = AnimalJaulaController::jaulaActualAnimal($_POST["animal"]);
    AnimalJaulaController::cambiarAnimal($_POST['animal'], $_POST['jaula'], $jaulaAnterior->codJaula, date('Y\-m\-d', time()));
}

$listaJaulas = JaulaController::mostrarJaulas();
$listaAnimales = AnimalController::mostrarAnimalesResponsable($_SESSION['usuario']->dni);
?>
<html>
    <head>
        <title>Registro animal</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />   
        <style>
            html,body{
                overflow-x: hidden;
            }          
        </style>
    </head>
    <body>
        <?php require_once 'Navbar.php'; ?>
        <div class="container-fluid">
            <div id="formLogin" class="container bg-light my-5 py-4" style="width: 40%; border-radius: 20px;">
                <h1 class="text-center">Mover animal</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <hr>                    

                    <div class="row">
                        <div class="col">
                            <label for="animal" class="form-label">Tipo de animal:</label>
                            <select name="animal" id="animal">
                                <?php
                                foreach ($listaAnimales as $animal) {
                                    echo "<option value='$animal->codigo'>$animal->tipo</option>";
                                }
                                ?>
                            </select>
                        </div>                                                                  
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="jaula" class="form-label">Jaula:</label>
                            <select name="jaula" id="jaula">
                                <?php
                                foreach ($listaJaulas as $jaula) {
                                    echo "<option value='$jaula->codigo'>$jaula->caracteristicas - $jaula->ubicacion</option>";
                                }
                                ?>
                            </select>
                        </div>                                                                  
                    </div>

                    <input type="hidden" name="jaulaAntigua" value="<?php $jaula->codigo ?>">
                    <div class="d-flex justify-content-around d-inline-block mt-4">
                        <button type="submit" class="btn btn-secondary" name="mover" id="mover">
                            Mover animal
                        </button>
                        <a class="btn btn-outline-secondary" href="InicioResponsable.php">Volver</a>
                    </div>

                </form>
            </div>
        </div>       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>