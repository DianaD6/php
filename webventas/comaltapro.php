<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta producto</title>
</head>
<h1>Alta producto</h1>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
        require "funcionesweb.php";
        $categorias = obtenerCategorias();
        ?>
        <div>
            <label for="nombreProducto">Nombre de Producto</label><br>
            <input type="text" name="nombreProducto" />
        </div>
        <br>
        <div>
            <label for="precio">Precio</label><br>
            <input type="text" name="precio" />
        </div>
        <br>
        <div>
            <label for="categoria">Categorias:</label>
            <select name="categoria">
                <option></option>
                <?php foreach ($categorias as $categoria) { ?>
                    <option> <?php echo $categoria["nombre"]; ?> </option>
                <?php } ?>
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

    $nombreProducto =  test_input($_POST["nombreProducto"]);
    $precio =  test_input($_POST["precio"]);
    $nombreCategoria =  test_input($_POST["categoria"]);

    if (empty($nombreProducto) || empty($precio) || empty($categorias)) {
        echo "<br>Todos los campos son obligatorios";
        die();
    }

    $productos = obtenerProductoPorNombre($nombreProducto, $nombreCategoria);

    if (!empty($productos)) {
        echo "<br>El producto <strong>" . $nombreProducto . "</strong> en la categoría <strong>" . $nombreCategoria . "</strong> ya existe.";
        die();
    }

    $idCategoria = obtenerIdCategoriaPorNombre($nombreCategoria);
    $idProducto = generarIdProducto();
    insertarProducto($idProducto, $nombreProducto, $precio, $idCategoria);
}





?>