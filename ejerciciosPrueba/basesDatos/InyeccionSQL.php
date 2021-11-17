<form action="" method="POST">
    Usuario: <input type="text" name="user"><br>
    Contraseña: <input type="text" name="password"><br>
    <input type="submit" name="enviar" value="Enviar">
</form>
<?php
if (isset($_POST['enviar'])) {
    $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
    //Al escribir en el campo contraseña: hola' or 1 = '1          se entraría sin problema
    //$result = $dwes->query("select * from empleados where user='$_POST[user]' and password='$_POST[password]'");

    $stmt = $dwes->stmt_init(); //Inicializar un objeto de tipo stmt
    $stmt->prepare('select * from empleados where user=binary ? and password=binary ?'); //Preparar la consulta
    $user = 'pepillo';
    $password = '1234';
    $stmt->bind_param('ss', $user, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "HAS ENTRADOS JOE";
    } else {
        echo "<br>Datos incorrectos<br>";
    }
}