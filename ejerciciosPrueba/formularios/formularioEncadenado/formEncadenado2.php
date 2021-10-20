<form action="formEncadenado3.php" method="POST">
     Nº matrícula: <input type="text " name="matricula"> <br>
     Curso: <input type="text " name="curso"> <br>
     Año: <input type="text " name="anio"> <br><br>
     <input type="hidden" name="nombre" value=<?php echo $_POST['nombre']?>>
     <input type="hidden" name="apellidos" value=<?php echo $_POST['apellidos']?>>
     
     <input type="submit" name="siguiente" value="Siguiente">
</form>

<?php
