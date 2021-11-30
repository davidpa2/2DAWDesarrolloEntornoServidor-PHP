<?php
$options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

$logueado = false;

setcookie("tiempo", time(), time() + 3600);

if (isset($_POST['acceder'])) {
    try {
        $encriptado = md5($_POST['contrasenia']);

        $dwes = new PDO('mysql:host=localhost;dbname=usuarios;charset=utf8mb4', 'dwes', 'abc123.', $options);
        $result = $dwes->query("select * from sesiones where usuario = '$_POST[usuario]' and contrasenia = '$encriptado'");

        if ($result->rowCount()) {
            $logueado = true;

            if (isset($_POST['recordarme'])) {
                setcookie("recordar", "recuerdame", time() + 3600);
                //setcookie("tiempo", time(), time() + 3600);
                setcookie("nombre", $_POST['usuario'], time() + 3600);
                setcookie("pass", $_POST['contrasenia'], time() + 3600);
            } else {
                setcookie("nombre", $_POST['usuario']); //La cookie sin tiempo para que al salir del navegador no recuerde el usuario
                //Pero al entrar sin recordar tengamos el nombre
                setcookie("recordar", "recuerdame", time() - 3600);
                setcookie("pass", $_POST['contrasenia'], time() - 3600);
            }

            header('Location: Acceso.php');
        } else {
            $logueado = false;
            echo 'El nombre o la contraseña son incorrectos';
        }
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
}

if (!$logueado) {
    ?>
    <table border="1px" style="background: lightcyan"><tr><td>
                <form action="" method="POST">
                    Usuario: <input type="text" name="usuario" <?php if (isset($_COOKIE['recordar'])) echo "value='" . $_COOKIE['nombre'] . "' style=' background: rgb(222, 185, 51)'" ?>><br>
                    Contraseña: <input type="password" name="contrasenia" <?php if (isset($_COOKIE['recordar'])) echo "value='" . $_COOKIE['pass'] . "' style=' background: rgb(222, 185, 51)'" ?>"><br>
                    Recordarme: <input type="checkbox" name="recordarme[]" value="Recordarme" <?php if (isset($_COOKIE['recordar'])) echo 'checked="true"' ?>;><br>
                    <input type="submit" name="acceder" value="Acceder">
                </form>
            </td></tr></table>
    <?php
}