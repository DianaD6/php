<!DOCTYPE html>
<html lang="en">

<head>
    <title>cambioBase</title>
</head>

<body>
    <h1>CONVERSOR NUMERICO</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $decimal = test_input($_POST["decimal"]);

        if ($_POST["base"] == "binario") {
            echo "Numero binario " . '<input type="text" name="decimal" value="' . $decimal . '">' . "<br>";
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>Binario </td>" . "<td>" . binario($decimal) . "</td>" . "<br>";
            echo "</tr>";
            echo "</table>";
        } elseif ($_POST["base"] == "octal") {
            echo "Numero binario " . '<input type="text" name="decimal" value="' . $decimal . '">' . "<br>";
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>Octal </td>" . "<td>" . octal($decimal) . "</td>" . "<br>";
            echo "</tr>";
            echo "</table>";
        } elseif ($_POST["base"] == "hexa") {
            echo "Numero binario " . '<input type="text" name="decimal" value="' . $decimal . '">' . "<br>";
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>Hexadecimal </td>" . "<td>" . hexa($decimal) . "</td>" . "<br>";
            echo "</tr>";
            echo "</table>";
        } elseif ($_POST["base"] == "todos") {
            echo "Numero binario " . '<input type="text" name="decimal" value="' . $decimal . '">' . "<br>";
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
        } else {
            echo "Elige una opcion" . "<br>";
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
</body>

</html>
