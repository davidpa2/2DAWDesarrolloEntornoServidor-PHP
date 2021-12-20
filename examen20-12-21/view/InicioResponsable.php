<?php
require_once '../controller/AnimalController.php';
require_once '../controller/ResponsableController.php';
require_once '../controller/AnimalJaulaController.php';
require_once '../controller/JaulaController.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: logOff.php");
}
?>
<html>
    <head>
        <title>Inicio</title>
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
            <div class="row mt-5 justify-content-center">
                <div class="col-10">
                    <h1 class="text-center mb-5">Mis animales</h1>
                    <table class="table table-hover mb-5">
                        <thead class="table-dark">
                            <tr>
                                <th></th>
                                <th>Tipo</th>
                                <th>Especie</th>
                                <th>Sexo</th>
                                <th>Año de nacimiento</th>
                                <th>País</th>
                                <th>Continente</th>
                                <th>Historial</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $listaAnimales = AnimalController::mostrarAnimalesResponsable($_SESSION['usuario']->dni);

                            foreach ($listaAnimales as $animal) {
                                echo '<tr>';
                                echo "<td><img src='$animal->imagen' width ='100px'></td>";
                                echo '<td>' . $animal->tipo . '</td>';
                                echo '<td>' . $animal->especie . '</td>';
                                echo '<td>' . $animal->sexo . '</td>';
                                echo '<td>' . $animal->annoNac . '</td>';
                                echo '<td>' . $animal->paisOrigen . '</td>';
                                echo '<td>' . $animal->continente . '</td>';
                                ?>
                            <td>
                                <form action="" method="POST">
                                    <input type="hidden" name="codAnimal" value="<?php echo $animal->codigo ?>">
                                    <input type="hidden" name="animal" value="<?php echo $animal->tipo ?>">
                                    <button type="submit" name="historial" class="btn btn-secondary">Ver historial</button>
                                </form>
                            </td>
                            <?php
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php
            if (isset($_POST['historial'])) {
                ?>
                <div class="row mt-5 justify-content-center">
                    <div class="col-10">
                        <h2 class="text-center mb-4">Jaulas del <?php echo $_POST['animal'] ?></h2>
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Codigo</th>
                                    <th>Tipo</th>
                                    <th>Características</th>
                                    <th>Ubicación</th>
                                    <th>Fecha de ingreso</th>
                                    <th>Fecha de salida</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $listaJaulaAnimal = AnimalJaulaController::mostrarJaulasAnimal($_POST['codAnimal']);

                                foreach ($listaJaulaAnimal as $jaulaAnimal) {
                                    $jaula = JaulaController::buscarJaula($jaulaAnimal->codJaula);
                                    echo '<tr>';
                                    echo '<td>' . $jaula->codigo . '</td>';
                                    echo '<td>' . $jaula->tipo . '</td>';
                                    echo '<td>' . $jaula->caracteristicas . '</td>';
                                    echo '<td>' . $jaula->ubicacion . '</td>';
                                    echo '<td>' . $jaulaAnimal->fechaIngreso . '</td>';
                                    echo '<td>' . $jaulaAnimal->fechaSalida . '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>

