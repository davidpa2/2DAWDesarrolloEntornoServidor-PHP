<html>
    <head>
        <title>Ejercicio</title>
    </head>
    <body>
        <table border="1">
            <?php
            phpinfo();
            while ($array = each($_SERVER)){
                echo '<tr>';
                    echo '<td>'.$array['key'].'</td><td>'.$array['value'].'</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </body>
</html>
