<?php
require_once '../Controller/JuegoController.php';
require_once '../Controller/UsuarioController.php';
require_once '../Controller/AlquilerController.php';
session_start();
?>

<html>
    <head>
        <title>Tu tienda</title>
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
        if (isset($_POST['login'])) { //Si se ha pulsado login comprobar que existe el usuario introducido
            if ($usuario = UsuarioController::validarUsuario($_POST['dni'], md5($_POST['pass']))) {
                if ($usuario->getIntentos() > 0) {
                    $_SESSION['usuario'] = $usuario;
                    UsuarioController::renovarIntentos($usuario->getDni());
                } else {
                    echo 'USUARIO BLOQUEADO';
                }
            } else if ($usuario = UsuarioController::comprobarDni($_POST['dni'])) {
                if ($usuario->getIntentos() > 0) {
                    UsuarioController::modificarIntentos($usuario->getDni(), -1);
                    $intentos = $usuario->getIntentos() - 1;

                    if ($intentos == 0) {
                        echo 'USUARIO BLOQUEADO'; //Se da el caso se que con 0 intentos muestra una vez los intentos que quedan, por ello hay que asegurar
                    } else {
                        echo "Quedan " . $intentos . " intentos.";
                    }
                } else {
                    echo 'USUARIO BLOQUEADO';
                }
            } else {
                echo 'USUARIO Y/O CONTRASEÑA INCORRECTA';
            }
        }

        if (isset($_SESSION['usuario'])) { //Una vez existe la sesion de usuario, mostrar la navbar siempre
            require_once 'Navbar.php';
        }

        if (isset($_POST['alquilar'])) {
            AlquilerController::alquilarJuego(json_decode($_POST['juego']), $_SESSION['usuario']->getDni());
        }

        if (!isset($_SESSION['usuario'])) { //Si no se ha creado la sesión, mostrar el formulario de inicio de sesion
            ?>
            <div class="container-fluid">
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <h1>Juegos Deivis</h1>
                    </div>                
                    <div id="formLogin" class="container border mt-3 py-4 d-flex justify-content-center" style="width: 40%">
                        <form action="" method="POST">
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
            }
            ?>

            <div class="row mt-5 justify-content-center">
                <div class="col-10">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Carátula</th>
                                <th>Nombre del juego</th>
                                <th>Consola</th>
                                <th>Año lanzamiento</th>
                                <th>Precio</th>
                                <?php
                                if (isset($_SESSION['usuario'])) {
                                    if ($_SESSION['usuario']->getTipo() == "cliente") {
                                        echo '<th>Reserva</th>';
                                    }
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $listaJuegos = JuegoController::mostrarJuegos();

                            foreach ($listaJuegos as $juego) {
                                echo '<tr>';
                                //$json_encode = [$juego->getNombreJuego(),"patata", $juego->getNombreConsola(),"patata", $juego->getAnno(),"patata", $juego->getPrecio(),"patata", $juego->getDescripcion()];
                                ?>
                                                                    <!--<td> <a href="VistaJuego.php?juego=<?php //echo json_encode($juego);         ?>"><img src="<?php //echo $juego->getImagen();         ?>" width ="100px"></a></td>-->
                                <?php
                                if ($juego->getAlquilado() == 'SI') {
                                    echo "<td><a href='VistaJuego.php?juego=" . $juego->getCodigo() . "'><img src='" . $juego->getImagen() . "' width ='100px' style='filter: grayscale(100);'></a></td>";
                                } else {
                                    echo "<td><a href='VistaJuego.php?juego=" . $juego->getCodigo() . "'><img src='" . $juego->getImagen() . "' width ='100px'></a></td>";
                                }

                                echo '<td>' . $juego->getNombreJuego() . '</td>';
                                echo '<td>' . $juego->getNombreConsola() . '</td>';
                                echo '<td>' . $juego->getAnno() . '</td>';
                                echo '<td>' . $juego->getPrecio() . '</td>';
                                if (isset($_SESSION['usuario'])) {
                                    if ($_SESSION['usuario']->getTipo() == "cliente") {
                                        echo '<td>';
                                        ?>
                                    <form action="" method="POST">
                                        <input type="hidden" name="juego" value='<?php echo json_encode($juego) ?>'>
                                        <input type="submit" class="btn btn-secondary" name='alquilar' value="Alquilar" <?php if ($juego->getAlquilado() == "SI") echo 'disabled'; ?>>
                                    </form>
                                    <?php
                                    echo '</td>';
                                }
                            }
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>