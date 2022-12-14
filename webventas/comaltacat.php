<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta categoría</title>
</head>
<h1>Alta categoría</h1>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <label for="nombreCategoria">Nombre de Categoría</label><br>
            <input type="text" name="nombreCategoria" />
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
    $nombreCategoria =  test_input($_POST["nombreCategoria"]);
    if (empty($nombreCategoria)) {
        echo "<br>El nombre de categoría es obligatorio";
        die();
    }
    
    $idCategoria = generarIdCategoría();
    $categorias = obtenerCategoriasPorNombre($nombreCategoria);
    if (empty($categorias)) {
        insertarCategoria($nombreCategoria, $idCategoria);
    } else {
        echo "<br>Esa categoría ya existe.";
        
    }
}


?>