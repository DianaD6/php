<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cambio de base</title>
</head>

<body>
    <h1>CONVERSOR NUMERICO</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Numero decimal: <input type="text" name="decimal" />
        <h4>Convertir a:</h4>
        <br>
        <input type="radio" name="base" value="binario" /> Binario <br>
        <input type="radio" name="base" value="octal" /> Octal <br>
        <input type="radio" name="base" value="hexa" /> Hexadecimal <br>
        <input type="radio" name="base" value="todos" checked /> Todos sistemas <br>
        <br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $decimal = test_input($_POST["decimal"]);
            $n = $_POST['base'];

            if ($n == "binario") {
                echo "Numero decimal " . '<input type="text" name="decimal1" value="' . $decimal . '">' . "<br>";
                echo "<table border='1'>";
                echo "<tr>";
                echo "<td>Binario </td>" . "<td>" . binario($decimal) . "</td>" . "<br>";
                echo "</tr>";
                echo "</table>";
            } elseif ($n == "octal") {
                echo "Numero decimal " . '<input type="text" name="decimal1" value="' . $decimal . '">' . "<br>";
                echo "<table border='1'>";
                echo "<tr>";
                echo "<td>Octal </td>" . "<td>" . octal($decimal) . "</td>" . "<br>";
                echo "</tr>";
                echo "</table>";
            } elseif ($n == "hexa") {
                echo "Numero decimal " . '<input type="text" name="decimal1" value="' . $decimal . '">' . "<br>";
                echo "<table border='1'>";
                echo "<tr>";
                echo "<td>Hexadecimal </td>" . "<td>" . hexa($decimal) . "</td>" . "<br>";
                echo "</tr>";
                echo "</table>";
            } elseif ($n == "todos") {
                echo "Numero decimal " . '<input type="text" name="decimal1" value="' . $decimal . '">' . "<br>";
                echo "<table border='1'>";
                echo "<tr>";
                echo "<td>Binario </td>" . "<td>" . binario($decimal) . "</td>" . "<br>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Octal </td>" . "<td>" . octal($decimal) . "</td>" . "<br>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Hexadecimal </td>" . "<td>" . hexa($decimal) . "</td>" . "<br>";
                echo "</tr>";
                echo "</table>";
            }
        }
        ?>
        <?php

        function binario($num)
        {
            return decbin($num);
        }
        function octal($num)
        {
            return decoct($num);
        }
        function hexa($num)
        {
            return dechex($num);
        }

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <br>
        <input type="submit" value="Enviar" />
        <input type="reset" value="Borrar" />
    </form>
</body>

</html>
