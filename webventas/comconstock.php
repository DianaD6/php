<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Stock</title>
</head>
<h1>Consulta de Stock</h1>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
        require "funcionesweb.php";
        $productos = obtenerProductos();
        ?>
        <div>
            <label for="producto">Producto:</label>
            <select name="producto">
                <option></option>
                <?php foreach ($productos as $producto) {
                    echo '<option value="' . $producto["ID_PRODUCTO"] . '">' . $producto["NOMBRE"] . '</option>';
                }
                ?>
            </select>
        </div>
        <br>
        <div>
            <input type="reset" value="Borrar">
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProducto =  test_input($_POST["producto"]);

    if (empty($idProducto)) {
        echo "<br>La selección de producto es obligatoria";
        die();
    }
    $productos = obtenerCantidadProductos($idProducto);
    $nombreProducto = obtenerProductoPorId($idProducto);
    echo "<br><strong>".$nombreProducto."</strong></br>";
    mostrarCantidadProductos($productos);
}

?>