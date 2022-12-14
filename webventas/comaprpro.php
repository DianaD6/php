<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprovisionar Productos</title>
</head>
<h1>Aprovisionar Productos</h1>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
        require "funcionesweb.php";
        $productos = obtenerProductos();
        $almacenes = obtenerAlmacenes();
        ?>
        <div>
            <label for="producto">Productos:</label>
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
            <label for="almacen">Almacenes:</label>
            <select name="almacen">
                <option></option>
                <?php foreach ($almacenes as $almacen) { ?>
                    <option> <?php echo $almacen["num_almacen"]; ?> </option>
                <?php } ?>
            </select>
        </div>
        <br>
        <div>
            <label for="cantidad">Cantidad</label><br>
            <input type="text" name="cantidad" />
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
    $almacen =  test_input($_POST["almacen"]);
    $cantidad =  test_input($_POST["cantidad"]);

    if (empty($idProducto) || empty($almacen) || empty($cantidad)) {
        echo "<br>Todos los campos son obligatorios";
        die();
    }
    actualizarInsertar($cantidad, $idProducto, $almacen);
}


?>