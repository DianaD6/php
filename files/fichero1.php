<!DOCTYPE html>
<html>

<head>
    <title>Alumno</title>
</head>

<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = test_input($_POST["nombre"]);
        $ape1 = test_input($_POST["apellido1"]);
        $ape2 = test_input($_POST["apellido2"]);
        $nacimiento = test_input($_POST["fechaNacimiento"]);
        $localidad = test_input($_POST["localidad"]);

        $nombre = str_pad($nombre, 39, " ", STR_PAD_RIGHT);
        $ape1 = str_pad($ape1, 40, " ", STR_PAD_RIGHT);
        $ape2 = str_pad($ape2, 41, " ", STR_PAD_RIGHT);
        $nacimiento = str_pad($nacimiento, 9, " ", STR_PAD_RIGHT);
        $localidad = str_pad($localidad, 26, " ", STR_PAD_RIGHT);

        $alumno = $nombre . $ape1 . $ape2 . $nacimiento . $localidad;

        $file = fopen("fichero1.txt", "a");
        fwrite($file, $alumno . PHP_EOL);
        fclose($file);

        echo "<h3>Alumno guardado con éxito</h3>";
        echo ('<br /><a href="fichero1.html">Inscribir otro alumno</a>');
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
</body>

</html>
