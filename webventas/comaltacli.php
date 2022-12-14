<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Cliente</title>
</head>
<h1>Alta Cliente</h1>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <label for="nif">NIF</label><br>
            <input type="text" name="nif" />
        </div>
        <br>
        <div>
            <label for="nombre">Nombre</label><br>
            <input type="text" name="nombre" />
        </div>
        <br>
        <div>
            <label for="apellido">Apellido</label><br>
            <input type="text" name="apellido" />
        </div>
        <br>
        <div>
            <label for="cp">Codigo Postal</label><br>
            <input type="text" name="cp" />
        </div>
        <br>
        <div>
            <label for="direccion">Direccion</label><br>
            <input type="text" name="direccion" />
        </div>
        <br>
        <div>
            <label for="ciudad">Ciudad</label><br>
            <input type="text" name="ciudad" />
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
    require "funcionesweb.php";
    $nif =  test_input($_POST["nif"]);
    $nombre =  test_input($_POST["nombre"]);
    $apellido =  test_input($_POST["apellido"]);
    $cp =  test_input($_POST["cp"]);
    $direccion =  test_input($_POST["direccion"]);
    $ciudad =  test_input($_POST["ciudad"]);
    $formatoNif = preg_match('/^\d{8}[a-zA-Z]$/', $nif);

    if (empty($nif) || empty($nombre) || empty($apellido) || empty($cp) || empty($direccion) || empty($ciudad)) {
        echo "<br>La selección de todos los campos es obligatoria";
        die();
    }

    if (!$formatoNif) {
        echo "<br>El NIF debe contener 8 dígitos y 1 letra. ";
        die();
    }

    $cliente = obtenerClientePorNif($nif);
    if (empty($cliente)) {
        insertarCliente($nif, $nombre, $apellido, $cp, $direccion, $ciudad);
    } else {
        echo "<br>Ese NIF ya está registrado, el cliente ya está dado de alta.";
    }
}

?>