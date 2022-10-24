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

</html>
