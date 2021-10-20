<?php

function mostrarAgenda($array) {
    ?>
    <div class="agenda">
        <?php
        if (empty($array)) {
            echo "La agenda está vacía";
        } else {
            echo '<h3>Agenda</h3>';
            echo '<table border=1>';
            echo '<tr><th>Nombre</th><th>Número</th></tr>';
            foreach ($array as $nombre => $numero) {
                echo '<tr><td>' . $nombre . '</td><td>' . $numero . '</td></tr>';
            }
            echo '</table>';
        }
        ?>
    </div>
    <?php
}
