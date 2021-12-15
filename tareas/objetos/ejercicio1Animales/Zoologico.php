<?php
require_once 'Animal.php';
require_once 'Ave.php';
require_once 'Mamifero.php';
require_once 'Perro.php';
require_once 'Gato.php';
require_once 'Canario.php';
require_once 'Pinguino.php';
?>
<html>
    <head>
        <title>ZOOILÓGICO</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
            />
    </head>
    <body>
        <?php
        $perro = new Perro("si", "omnivoro", 4, "cuadrupedo", "su caseta", "si", "Pastor Aleman");
        echo $perro;
        $perro->correrTrasLaLiebre();
        $perro->ladra();
        $perro->daLaPata();
        echo "<hr>";
        $gato = new Gato("si", "hervívoro", 13, "españó", "su casita", "marron", "si");
        echo $gato;
        $gato->duerme();
        $gato->juega();
        $gato->arania();
        echo "<hr>";
        $canario = new Canario("si", "semillas", 4, "no", 20, "si", "amarillo");
        echo $canario;
        $canario->bebe();
        $canario->estaVivo();
        $canario->seBalanceaEnElColumpio();
        echo "<hr>";
        $pinguino = new Pinguino("si", "pescao", 56, "no", 30, "si", 42);
        echo $pinguino;
        $pinguino->comePescado();
        $pinguino->nadar();
        $pinguino->pelea();
        ?>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
