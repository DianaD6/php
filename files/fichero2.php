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

        $nombre = $nombre."##";
        $ape1 = $ape1."##";
        $ape2 = $ape2."##";
        $nacimiento = $nacimiento."##";
        $localidad = $localidad;

        $alumno = $nombre . $ape1 . $ape2 . $nacimiento . $localidad;

        $file = fopen("alumnos2.txt", "a");
        fwrite($file, $alumno . PHP_EOL);
        fclose($file);

        echo "<h3>Alumno guardado con éxito</h3>";
        echo ('<br /><a href="fichero2.html">Inscribir otro alumno</a>');
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
