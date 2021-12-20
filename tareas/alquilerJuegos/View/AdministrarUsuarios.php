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
        <title>Usuarios</title>
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
        if (!isset($_SESSION['usuario'])) {
            header("Location:index.php");
        }

        require_once 'Navbar.php';

        if (isset($_POST['desbloquear'])) {
            UsuarioController::renovarIntentos($_POST['dniUsuario']);
        }


        $listaUsuariosBloqueados = UsuarioController::mostrarUsuariosBloqueados();

        if ($listaUsuariosBloqueados) {
            ?>

            <div class="row mt-5 justify-content-center">
                <div class="col-10">
                    <h2>Usuarios bloqueados</h2>
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Dni</th>
                                <th>Nombre completo</th>
                                <th>Dirección</th>
                                <th>Localidad</th>
                                <th>Desbloquear</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($listaUsuariosBloqueados as $usuario) {
                                echo '<tr>';
                                echo '<td>' . $usuario->getDni() . '</td>';
                                echo '<td>' . $usuario->getNombre() . ' ' . $usuario->getApellidos() . '</td>';
                                echo '<td>' . $usuario->getDireccion() . '</td>';
                                echo '<td>' . $usuario->getLocalidad() . '</td>';
                                echo '<td>';
                                ?>
                            <form action="" method="POST">
                                <input type="hidden" name="dniUsuario" value='<?php echo $usuario->getDni() ?>'>
                                <input type="submit" class="btn btn-secondary" name='desbloquear' value="Desbloquear">
                            </form>
                            <?php
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
        }

        $listaUsuarios = UsuarioController::mostrarUsuarios();

        if ($listaUsuarios) {
            ?>

            <div class="row mt-5 justify-content-center">
                <div class="col-10">
                    <h2 class="text-center mb-4">Usuarios desbloqueados</h2>
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Dni</th>
                                <th>Nombre completo</th>
                                <th>Dirección</th>
                                <th>Localidad</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($listaUsuarios as $usuario) {
                                echo '<tr>';
                                echo '<td>' . $usuario->getDni() . '</td>';
                                echo '<td>' . $usuario->getNombre() . ' ' . $usuario->getApellidos() . '</td>';
                                echo '<td>' . $usuario->getDireccion() . '</td>';
                                echo '<td>' . $usuario->getLocalidad() . '</td>';
                                echo '<td>';
                                echo '</td>';
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