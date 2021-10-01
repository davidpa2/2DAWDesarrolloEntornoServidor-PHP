<html>
    <head>
        <title>Tabla</title>
    </head>
    <body>
        <table border="1">
            <?php
            foreach ($_SERVER as $id => $a) {
                echo '<tr>';
                    echo '<td>'.$id.'</td><td>'.$a.'</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </body>
</html>