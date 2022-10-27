<!DOCTYPE html>
<html>

<head>
    <title>Alumno</title>
</head>

<body>
    <?php

    $fp = fopen("alumnos1.txt", "r");
    $cont = 0;
    echo "<table border='1'>";
    while (!feof($fp)){
        $linea = fgets($fp);
       
        $nombre = substr($linea, 0, 39 );
        $apellido1 = substr($linea, 38, 40);
        $apellido2 = substr($linea, 79, 41);
        $fechaNacimiento = substr($linea, 120, 10);
        $localidad = substr($linea, 130);
        
        echo "<tr>";
        echo  "<td>$nombre</td>";
        echo  "<td>$apellido1</td>";
        echo  "<td>$apellido2</td>";
        echo  "<td>$fechaNacimiento</td>";
        echo  "<td>$localidad</td>";
        echo "</tr>";

        $cont++;
    }
    echo "</table>";
    echo ($cont - 1) . " filas";

    ?>
</body>

</html>



/*
<!DOCTYPE html>
<html>

<head>
    <title>Alumno</title>
</head>

<body>
    <?php

    $fp = fopen("alumnos1.txt", "r");
    $cont = 0;
    echo "<table border='1'>";
    while (!feof($fp)){
        $linea = fgets($fp);
        $snombre = strpos($linea, " ", 0);
        $nombre = substr($linea, 0, $snombre);

        $linea = substr($linea, strlen($nombre));
        $linea = trim($linea);
        $sapellido1 = strpos($linea, " ", 0);
        $apellido1 = substr($linea, 0, $sapellido1);

        $linea = substr($linea, strlen($apellido1));
        $linea = trim($linea);
        $sapellido2 = strpos($linea, " ", 0);
        $apellido2 = substr($linea, 0, $sapellido2);
    
        $linea = substr($linea, strlen($apellido2));
        $linea = trim($linea);
        $fechaNacimiento = substr($linea, 0, 10);
    
        $linea = substr($linea, strlen($fechaNacimiento));
        $linea = trim($linea);
        $localidad = substr($linea, 0);
        echo "<tr>";
        echo  "<td>$nombre</td>";
        echo  "<td>$apellido1</td>";
        echo  "<td>$apellido2</td>";
        echo  "<td>$fechaNacimiento</td>";
        echo  "<td>$localidad</td>";
        echo "</tr>";

        $cont++;
    }
    echo "</table>";
    echo ($cont - 1) . " filas";

    ?>
</body>

</html>
*/




/*<!DOCTYPE html>
<html>

<head>
    <title>Alumno</title>
</head>

<body>
    <?php

    $fp = fopen("alumnos1.txt", "r");
    $cont = 0;
    echo "<table border='1'>";
    while (!feof($fp)) {
        $linea = fgets($fp);
        $linea = strtok($linea, " ");
        echo "<tr>";
        while ($linea !== false) {
            echo  "<td>$linea</td>";
            $linea = strtok(" ");
        }
        echo "</tr>";
        $cont++;
    }
    fclose($fp);
    echo "</table>";
    echo ($cont - 1) . " filas";
    
    ?>
</body>

</html>*/
