<?php
require_once '../controller/AnimalController.php';
require_once '../controller/ResponsableController.php';
require_once '../model/Conexion.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iniciar sesión</title>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <body>
        <?php
        if (isset($_POST['login'])) { //Si se ha pulsado login comprobar que existe el usuario introducido
            if ($usuario = ResponsableController::validarUsuario($_POST['dni'], md5($_POST['pass']))) {
                if ($usuario->intentos > 0) {
                    $_SESSION['usuario'] = $usuario;
                    ResponsableController::renovarIntentos($usuario->dni);
                    header("Location:InicioResponsable.php");
                } else {
                    echo 'USUARIO BLOQUEADO';
                }
            } else if ($usuario = ResponsableController::comprobarDni($_POST['dni'])) {
                if ($usuario->intentos > 1) {
                    ResponsableController::modificarIntentos($usuario->dni, -1);
                    $intentos = $usuario->intentos - 1;
                    echo "Quedan " . $intentos . " intentos.";
                } else {
                    echo 'USUARIO BLOQUEADO';
                }
            } else {
                echo 'USUARIO Y/O CONTRASEÑA INCORRECTA';
            }
        }

        if (!isset($_SESSION['usuario'])) { //Si no se ha creado la sesión, mostrar el formulario de inicio de sesion
            ?>
            <div class="container-fluid">
                <div class="row mt-3">               
                    <div id="formLogin" class="container border mt-3 py-4 d-flex justify-content-center" style="width: 40%">
                        <form action="" method="POST">
                            <h1 class="text-center">ZooIlógico DAW</h1>
                            <hr>
                            <div class ="row ">
                                <div class="col-6">
                                    <label for="dni" class="form-label">Dni:</label>
                                    <input type="text" class="form-control" name="dni">
                                </div>
                                <div class="col-6">
                                    <label for="pass" class="form-label">Contraseña:</label>
                                    <input type="password" class="form-control" name="pass">
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" class="mt-4 btn btn-secondary" name="login" value="Login">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
            } else {
                header("Location:InicioResponsable.php");
            }
            ?>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
