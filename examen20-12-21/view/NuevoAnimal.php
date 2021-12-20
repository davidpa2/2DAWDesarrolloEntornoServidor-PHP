<?php
require_once '../controller/ResponsableController.php';
require_once '../controller/JaulaController.php';
require_once '../controller/AnimalController.php';
require_once '../controller/AnimalJaulaController.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: logOff.php");
}

if (isset($_POST['registrar'])) {

    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $fichero = $_FILES['foto']['name'] . "-" . time();
        $ruta = "imagenes/" . $fichero;
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);

        $animal = new Animal($_POST["codigo"], $_POST["tipo"], $_POST["especie"], $_POST["sexo"], $_POST["nacimiento"], $_POST["pais"], $_POST["continente"], $_SESSION['usuario']->dni, $ruta);
        $animalJaula = new AnimalJaula($_POST["codigo"], $_POST["jaula"], date('Y\-m\-d', time()));

        AnimalController::registrarAnimal($animal);
        AnimalJaulaController::insertarAnimalJaula($animalJaula);
    } else {
        echo "ERROR AL SUBIR LA FOTICO";
    }
}
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
            <div id="formLogin" class="container bg-light my-5 py-4" style="width: 50%; border-radius: 20px;">
                <h1 class="text-center">Registrar animal</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label for="codigo" class="form-label">Código:</label>
                            <input type="number" name="codigo" id="codigo" 
                                   class="form-control" placeholder="código" required/><br>
                        </div>

                        <div class="col">
                            <label for="tipo" class="form-label">Tipo:</label>
                            <input type="text" name="tipo" id="tipo" 
                                   class="form-control" placeholder="tipo" required/><br>
                        </div>                    
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="especie" class="form-label">Especie:</label>
                            <input type="text" name="especie" id="especie" class="form-control" placeholder="especie"/><br>
                        </div>

                        <div class="col mt-4">
                            <label for="sexo" class="form-label">Sexo: </label>
                            <input type="radio" id="sexo" name="sexo" value="Macho" required="">Macho
                            <input type="radio" id="sexo" name="sexo" value="Hembra" required=""e>Hembra
                        </div>                    
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="nacimiento" class="form-label">Año de nacimiento:</label><br>
                            <input type="date" name="nacimiento" class="form-control" placeholder="yyyy-mm-dd" required" title="Introduzca el formato yyyy-mm-dd (año, mes y día).">      
                        </div>

                        <div class="col">
                            <label for="pais" class="form-label">Pais de origen:</label><br>
                            <input type="text" id="pais" name="pais" class="form-control" placeholder="país" required><br>
                        </div>                    
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <label for="continente" class="form-label">Continente:</label>
                            <input type="text" name="continente" id="continente" 
                                   class="form-control" placeholder="continente" required/><br>
                        </div>
                        
                        <div class="col">
                            <label for="imagen" class="form-label">Imagen:</label><br>
                            <input type="file" name="foto" id="foto" accept="image/png,image/jpeg" required><br><br><br>
                        </div>                                           
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <label for="jaula" class="form-label">Jaula:</label>
                            <select name="jaula" id="jaula">
                                <?php 
                                $listaJaulas = JaulaController::mostrarJaulas();
                                
                                foreach ($listaJaulas as $jaula) {
                                    echo "<option value='$jaula->codigo'>$jaula->caracteristicas - $jaula->ubicacion</option>";
                                }
                                ?>
                            </select>
                        </div>                                                                  
                    </div>

                    <div class="d-flex justify-content-around d-inline-block mt-4">
                        <button type="submit" class="btn btn-secondary" name="registrar" id="registrar">
                            Registrar
                        </button>
                        <a class="btn btn-outline-secondary" href="InicioResponsable.php">Volver</a>
                    </div>

                </form>
            </div>
        </div>       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
