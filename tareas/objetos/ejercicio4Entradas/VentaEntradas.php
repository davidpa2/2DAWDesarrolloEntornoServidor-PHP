<?php
require_once 'Zona.php';
session_start();
if (!isset($_POST['comprar'])) {
    $salaPrincipal = new Zona("Sala principal", 1000, 1000);
    $zonaCompraVenta = new Zona("Zona de compra-venta", 200, 200);
    $zonaVip = new Zona("Zona VIP", 25, 25);
    $_SESSION['salaPrincipal'] = $salaPrincipal;
    $_SESSION['zonaCompraVenta'] = $zonaCompraVenta;
    $_SESSION['zonaVip'] = $zonaVip;
} else {
    if (isset($_POST['comprar'])) {
        switch ($_POST['zona']) {
            case "Sala principal":
                $p1 = $_SESSION['salaPrincipal'];
                $p1->vender($_POST['entradas']);
                break;

            case "Zona de compra-venta":
                $p2 = $_SESSION['zonaCompraVenta'];
                $p2->vender($_POST['entradas']);
                break;

            case "Zona VIP":
                $p3 = $_SESSION['zonaVip'];
                $p3->vender($_POST['entradas']);
                break;
        }
    }
}
?>

<html>
    <head>
        <title>Venta de entradas</title>
    </head>
    <body>
        <h1>Venta de entradas Agustina</h1>

        <p>Bienvenido a Cines Agustina</p>
        <p>¿Cuántas entradas quieres comprar?</p>
        <form action="" method="POST">
            Zona: <select name="zona">
                <option value="Sala principal" <?php if (isset($_POST['comprar']) && $_POST['zona'] == "Sala principal") echo "selected"; ?>>Sala principal</option>
                <option value="Zona de compra-venta" <?php if (isset($_POST['comprar']) && $_POST['zona'] == "Zona de compra-venta") echo "selected"; ?>>Zona de compra-venta</option>
                <option value="Zona VIP" <?php if (isset($_POST['comprar']) && $_POST['zona'] == "Zona VIP") echo "selected"; ?>>Zona VIP</option>
            </select>
            Entradas: <input type="number" name="entradas">
            <input type="submit" name="comprar" value="Comprar">
        </form>
        <?php
        if (!isset($_POST['comprar'])) {
            echo $salaPrincipal;
            echo $zonaCompraVenta;
            echo $zonaVip;
        } else {
            echo $_SESSION['salaPrincipal'];
            echo $_SESSION['zonaCompraVenta'];
            echo $_SESSION['zonaVip'];
        }
        ?>
    </body>
</html>
<?php
/* echo $salaPrincipal;
  echo 'COMPRAR 40 ENTRADAS EN LA SALA PRINCIPAL:<BR>';
  $salaPrincipal->vender(40);
  echo $salaPrincipal;
  echo '<hr>';
  echo $zonaCompraVenta;
  echo 'COMPRAR 20 ENTRADAS EN LA SALA PRINCIPAL:<BR>';
  $zonaCompraVenta->vender(20);
  echo $zonaCompraVenta;
  echo '<hr>';
  echo $zonaVip;
  echo 'COMPRAR 5 ENTRADAS EN LA SALA PRINCIPAL:<BR>';
  $zonaVip->vender(5);
  echo $zonaVip; */