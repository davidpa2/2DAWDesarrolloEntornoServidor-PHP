<div class="row">
    <div class="col">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Juegos Deivis</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Listado de juegos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="JuegosAlquilados.php">Juegos alquilados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="JuegosDisponibles.php">Juegos disponibles</a>
                        </li>
                        <?php
                        if ($_SESSION['usuario']->getTipo() != "admin") {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="HistorialJuegosUsuario.php">Historial de juegos alquilados</a>
                            </li>
                            <?php
                        }
                        if ($_SESSION['usuario']->getTipo() != "admin") {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="JuegosAlquiladosUsuario.php">Alquilados del usuario</a>
                            </li>
                            <?php
                        }
                        if ($_SESSION['usuario']->getTipo() == "admin") {
                            ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown">Administrar</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="AdministrarUsuarios.php">Administar usuarios</a></li>
                                    <li><a class="dropdown-item" href="AdministrarJuegos.php">Administar juegos</a></li>
                                </ul>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <form action="logOut.php" method="POST">
                    <input class="mt-2 btn btn-secondary" type="submit" name="cerrarSesion" value="Cerrar sesión">
                </form>
            </div>
        </nav>
    </div>
</div>