<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de compras</title>
</head>
<h1>Consulta de compras</h1>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
        require "funcionesweb.php";
        $nifs = obtenerNifCliente();
        ?>
        <div>
            <label for="nif">NIF Cliente:</label>
            <select name="nif">
                <option></option>
                <?php foreach ($nifs as $nif) { ?>
                    <option> <?php echo $nif["nif"]; ?> </option>
                <?php } ?>
            </select>
        </div>
        <br>
        <div>
            <label for="fechaInicio">Fecha Inicio</label>
            <input type="date" name="fechaInicio" />
        </div>
        <br>
        <div>
            <label for="fechaFin">Fecha Fin</label>
            <input type="date" name="fechaFin" />
        </div>
        <p>Si no se escogen las fechas de Inicio y de Final, se mostrará el historial de compras completo.</p>
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
    $fechaInicio =  test_input($_POST["fechaInicio"]);
    $fechaFin =  test_input($_POST["fechaFin"]);

    if (empty($nif)) {
        echo "<br>La selección de NIF es obligatoria";
        die();
    }
    $nombreCompleto = obtenerNombreApellidoPorNif($nif);
    $totalCompras = obtenerMontanteTotalComprasPorNif($nif);

    echo "<br>Datos de compra de ";
    foreach ($nombreCompleto as $nombre) {
        echo "<strong>" . $nombre . " </strong>";
    }
    echo "con un total de <strong>" . $totalCompras . "</strong> compras";

    $compras = obtenerComprasPorCliente($nif, $fechaInicio, $fechaFin);
    mostrarComprasPorCliente($compras);
}




?>