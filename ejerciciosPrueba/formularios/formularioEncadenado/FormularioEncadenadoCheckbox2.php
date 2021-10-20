<form action="FormularioEncadenadoCheckbox3.php" method="POST">
    Nº matrícula: <input type="text " name="matricula"> <br>
    Curso: <input type="text" name="curso"> <br>
    Año: <input type="text" name="anio"> <br><br>
    <input type="hidden" name="nombre" value=<?php echo $_POST['nombre'] ?>>
    <input type="hidden" name="apellidos" value=<?php echo $_POST['apellidos'] ?>>

    <!--Dos maneras de hacerlo con implode/explode o con json_incode/json_decode-->
    <!--<input type="hidden" name="idioma" value=<?php echo implode(";", $_POST['idioma']) ?>-->
    <input type="hidden" name="idioma" value=<?php echo json_encode($_POST['idioma']) ?>>
    <input type="submit" name="boton2" value="Siguiente">
</form>