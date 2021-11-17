<?php
//En el array de opciones hay que especificar que se devuelvan las excepciones
$options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {

    $dwes = new PDO('mysql:host=localhost;dbname=autobuses;charset=utf8mb4', 'dwes', 'abc123.', $options);

    $resultadoDestinos = $dwes->query("select distinct Destino from viajes");
} catch (PDOException $ex) { //Manejar las PDOException ya que por defecto obtiene Exception
    echo 'ERROR: ' . $ex->getMessage();
}
?>

<h2>AUTO ANTOIN</h2>
<form action="ReservaAutobuses.php" method="POST">
    Fecha: <input type="type" name="fecha" placeholder="yyyy-mm-dd" value="<?php if (isset($_POST['consultar'])) $_POST['fecha'] ?>"><br>
    Origen: <select name="origen">
        <?php
        $resultadoOrigenes = $dwes->query("select distinct Origen from viajes");
        while ($result = $resultadoOrigenes->fetch()) {
            ?>
            <option value="<?php echo $result->Origen ?>"><?php echo $result->Origen ?></option>
            <?php
        }
        ?>  
    </select><br>

    Destino: <select name="destino">
        <?php
        while ($result = $resultadoDestinos->fetch()) {
            ?>
            <option value="<?php echo $result->Destino ?>"><?php echo $result->Destino ?></option>
            <?php
        }
        ?>  
    </select>
    <input type="submit" name="consultar" value="Consultar">
</form>