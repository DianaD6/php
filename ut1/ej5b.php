<HTML>

<HEAD>
    <TITLE> EJ5B – Tabla multiplicar con TD</TITLE>
</HEAD>

<BODY>
    <?php

    echo "<table border='1'>";
    $num = "8";
    $resultado = 0;

    for ($i = 1; $i <= 10; $i++) {
        $resultado = $num * $i;

        #echo $num . " * " . $i . " = " . $resultado . "</br>";
        echo "<tr>";
        echo    "<td>$num x $i </td>";
        echo    "<td>$resultado </td>";
        echo "</tr>";
    }
    ?>
</BODY>

</HTML>
