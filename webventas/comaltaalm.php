<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta almacen</title>
</head>
<h1>Alta categoría</h1>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <label for="localidad">Localidad</label><br>
            <input type="text" name="localidad" />
        </div>
        <br>
        <div>
            <input type="reset" value="Borrar">
            <input type="submit" value="Enviar">
            <br>
        </div>
    </form>
</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require "funcionesweb.php";
    $localidad =  test_input($_POST["localidad"]);
    if (empty($localidad)) {
        echo "<br>El campo de localidad es obligatorio";
        die();
    }
    $numAlmacen = generarNumeroAlmacen();
    insertarAlmacen($numAlmacen, $localidad);
}

?>