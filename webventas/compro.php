<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de Productos</title>
</head>
<h1>Compra de Productos</h1>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
        require "funcionesweb.php";
        $productos = obtenerProductos();
        ?>
        <div>
            <label for="nif">Introduce tu NIF:</label>
            <input type="text" name="nif"  />
        </div>
        <br>
        <div>
            <label for="producto">Selecciona producto:</label>
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
            <label for="cantidad">¿Cuántas unidades?</label>
            <input type="text" name="cantidad" size=3 />
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
    $nif =  test_input($_POST["nif"]);
    $idProducto =  test_input($_POST["producto"]);
    $cantidad =  test_input($_POST["cantidad"]);

    if (empty($nif) || empty($idProducto) || empty($cantidad)) {
        echo "<br>Todos los campos son obligatorios.";
        die();
    }
    
    $cliente = obtenerNombreApellidoPorNif($nif);
  
    if(empty($cliente)){
        echo "<br>Usted no está dado de alta. <br>
        Por favor, revise si los datos son correcto o puede darse de alta pulsando el siguiente botón:";
        echo ('<br><a href="comaltacli.php">Nuevo Cliente</a>');
        die();
    }

    $maxStock = obtenerMaximoStockPorProducto($idProducto);

    if ($maxStock == 0) {
        echo "<br>No quedan más unidades del producto seleccionado.";
        die();
    }

    actualizarAlmacena($idProducto, $cantidad);
    insertarCompra($nif, $idProducto, $cantidad);
}

?>