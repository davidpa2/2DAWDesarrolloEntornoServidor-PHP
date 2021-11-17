<h3>¿Por qué campo te gustaría buscar?</h3>
<form action="" method="POST">
    Buscar por: <select name="campo">
        <option value="dni" <?php if (isset($_POST['seleccionar']) && $_POST['campo'] == 'dni') echo 'selected'; ?>>Dni</option>
        <option value="posicion" <?php if (isset($_POST['seleccionar']) && $_POST['campo'] == 'posicion') echo 'selected'; ?>>Posición</option>
        <option value="equipo" <?php if (isset($_POST['seleccionar']) && $_POST['campo'] == 'equipo') echo 'selected'; ?>>Equipo</option>
    </select><br>
    Introduce lo que quieras buscar: <input type="text" name="parametro">
    <input type="submit" name="seleccionar" value="Seleccionar">
</form>

<?php
if (isset($_POST['seleccionar'])) {
    require_once 'Funciones.php'; //Importar el fichero de funciones
    $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'gestionjugadores');
            $suma = 0;
            if ($dwes->connect_error) {
                die("ERROR AL CONECTAR");
            }

    //Según lo que se seleccione en el "Buscar por" se realiza una consulta u otra
    switch ($_POST['campo']) {
        case 'dni':
            
            $result = $dwes->query("select * from jugadores where dni = '$_POST[parametro]'");

            if ($result->num_rows) {

                echo "Mostrando los jugadores con DNI: " . $_POST['parametro'] . "<br>";
                mostrarResultados($result);
            } else {
                echo 'No hay jugadores con ese DNI';
            }
            $dwes->close();
            break;

        case "posicion":

            
            $result = $dwes->query("select * from jugadores where posición like '%$_POST[parametro]%'");

            if ($result->num_rows) {

                echo "Mostrando los jugadores con posicion: " . $_POST['parametro'] . "<br>";
                mostrarResultados($result);
            } else {
                echo 'No hay jugadores en esa posición';
            }
            $dwes->close();
            break;

        case "equipo":

            $result = $dwes->query("select * from jugadores where equipo = '$_POST[parametro]'");

            if ($result->num_rows) {

                echo "Mostrando los jugadores del equipo: " . $_POST['parametro'] . "<br>";
                mostrarResultados($result);
            } else {
                echo 'No hay jugadores en ese equipo';
            }
            $dwes->close();
            break;
            
        default:
            echo '¿A qué narices le has dado?';
            break;
    }
}

echo '<br><button value="Volver"><a href="index.html">Volver</a></button>';
