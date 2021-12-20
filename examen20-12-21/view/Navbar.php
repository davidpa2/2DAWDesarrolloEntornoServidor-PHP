<div class="row">
    <div class="col">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><?php echo "Hola ". $_SESSION['usuario']->nombre ." ". $_SESSION['usuario']->apellidos; ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Mis animales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="NuevoAnimal.php">Nuevo animal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="MoverAnimal.php">Mover animal</a>
                        </li>
                    </ul>
                </div>
                <form action="logOff.php" method="POST">
                    <input class="mt-2 btn btn-secondary" type="submit" name="cerrarSesion" value="Cerrar sesión">
                </form>
            </div>
        </nav>
    </div>
</div>