<?php
$options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

$logueado = true;

if (isset($_POST['enviar'])) {
    try {
        $encriptado = md5($_POST['contra']);

        $dwes = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4', 'dwes', 'abc123.', $options);
        $result = $dwes->query("select * from usuarios where usuario = '$_POST[usuario]' and contrasenia = '$encriptado'");

        if ($result->rowCount()) {
            $logueado = true;

            if (isset($_POST['recordarme'])) {
                setcookie("recordar", "recuerdame", time() + 3600);
                setcookie("nombre", $_POST['usuario'], time() + 3600);
                setcookie("pass", $_POST['contra'], time() + 3600);
            } else {
                setcookie("nombre", $_POST['usuario']); //La cookie sin tiempo para que al salir del navegador no recuerde el usuario
                //Pero al entrar sin recordar tengamos el nombre
                setcookie("recordar", "recuerdame", time() - 3600);
                setcookie("pass", $_POST['contra'], time() - 3600);
            }
            session_name("sesion");
            session_start();
            $_SESSION['usuario'] = $_POST['usuario'];
            header('Location: productos.php');
            
        } else {
            $logueado = false; 
        }
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
    http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Ejemplo: Tienda web. login.php -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: TIENDA</title>
        <link href="tienda.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id='login'>
            <form action='login.php' method='post'>
                <fieldset >
                    <legend>Login</legend>
                    <div><span class='error'>
                            <?php if (!$logueado) echo 'El nombre o la contraseña son incorrectos'; ?>
                        </span></div>
                    <div class='campo'>
                        <label for='usuario' >Usuario:</label><br/>
                        <input type='text' name='usuario' id='usuario' maxlength="50"  <?php if (isset($_COOKIE['recordar'])) echo "value='" . $_COOKIE['nombre'] . "' style=' background: rgb(222, 185, 51)'" ?>/><br/>
                    </div>
                    <div class='campo'>
                        <label for='password' >Contraseña:</label><br/>
                        <input type='password' name='contra' id='password' maxlength="50"<?php if (isset($_COOKIE['recordar'])) echo "value='" . $_COOKIE['pass'] . "' style=' background: rgb(222, 185, 51)'" ?>/><br/>
                    </div>
                    Recordarme: <input type="checkbox" name="recordarme[]" value="Recordarme" <?php if (isset($_COOKIE['recordar'])) echo 'checked="true"' ?>;><br>
                    <div class='campo'>
                        <input type='submit' name='enviar' value='Enviar' />
                    </div>
                </fieldset>
            </form>
        </div>

        <?php
        ?>
    </body>
</html>
