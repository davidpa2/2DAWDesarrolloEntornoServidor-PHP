<?php

echo '<h1>Tus datos son:</h1>';
echo "Nombre: " . $_POST['nombre'] . '<br>';
echo "Apellidos: " . $_POST['apellidos'] . '<br>';
echo "Nº de matrícula: " . $_POST['matricula'] . '<br>';
echo "Curso: " . $_POST['curso'] . '<br>';
echo "Año: " . $_POST['anio'] . '<br>';

//Dos maneras de hacerlo con implode/explode o con json_incode/json_decode
//$idiomas = explode(";",$_POST['idioma']);
$idiomas = json_decode($_POST['idioma']);
echo "Idiomas: <br>";
foreach ($idiomas as $value) {
    echo "-".$value."<br>";
}
