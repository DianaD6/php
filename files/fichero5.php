<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fichero 5
    </title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h2>Operaciones ficheros</h2>
        <label for="ruta">Fichero (Path/nombre) </label>
        <input type="text" name="path" /><br />
        <br>
        Operaciones:<br>
        <input type="radio" value="fichero" name="operacion" /> Mostrar fichero<br>
        <input type="radio" value="linea" name="operacion" />
        Mostrar linea <label for="numeroLinea" /><input type="text" name="numeroLinea" size="1" /> fichero<br>
        <input type="radio" value="primeras" name="operacion" />
        Mostrar primeras <label for="numeroPrimeras" /><input type="text" name="numeroPrimeras" size="1" /> lineas<br>
        <br>
        <input type="submit" value="Enviar" />
        <input type="reset" value="Borrar" />
        <br>
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ruta = test_input($_POST["path"]);
    $numFila = intVal(test_input($_POST["numeroLinea"]));
    $contadorPrimerasFilas = test_input($_POST["numeroPrimeras"]);
    $eleccion = $_POST["operacion"];

    if ($eleccion == "fichero") {
        leerFichero($ruta);
    } else if ($eleccion == "linea") {
        leerUnaLinea($ruta, $numFila);
        var_dump($ruta);
    } else if ($eleccion == "primeras") {
        leerPrimerasLineas($contadorPrimerasFilas, $ruta);
    }
}
function leerFichero($ruta)
{
    $fichero = fopen($ruta, "r");
    while (!feof($fichero)) {
        $linea = fgets($fichero);
        echo $linea . "<br>";
    }
}
function leerUnaLinea($ruta, $contador)
{
    $cont = 0;
    $fichero = fopen($ruta, "r");
    while ($cont <= $contador) {
        $linea = fgets($fichero);

        $cont++;
    }
    echo $linea;
}
function leerPrimerasLineas($contador, $ruta)
{
    $cont = 1;
    $fichero = fopen($ruta, "r");
    while ($cont <= $contador) {
        $linea = fgets($fichero);
        echo $linea . "<br>";
        $cont++;
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
