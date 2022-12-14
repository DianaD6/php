<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Almacenes</title>
</head>
<h1>Consulta de Almaceenes</h1>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
        require "funcionesweb.php";
        $almacenes = obtenerAlmacenes();
        ?>
        <div>
            <label for="almacen">Almacen:</label>
            <select name="almacen">
                <option></option>
                <?php foreach ($almacenes as $almacen) { ?>
                    <option> <?php echo $almacen["num_almacen"]; ?> </option>
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
    $numAlmacen =  test_input($_POST["almacen"]);

    if (empty($numAlmacen)) {
        echo "<br>La selección de almacen es obligatoria";
        die();
    }

    echo "<br>Ha seleccionado el almacen <strong>" . $numAlmacen . "</strong></br>";
    $productos = obtenerProductosPorAlmacen($numAlmacen);
    var_dump($productos);

    if (empty($productos)) {
        echo "<br>Este almacen aun no tiene productos.";
        die();
    }
    mostrarProductosPorAlmacen($productos);
}






?>