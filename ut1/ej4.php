<HTML>

<HEAD>
    <TITLE> EJ4B – Tabla Multiplicar</TITLE>
</HEAD>

<BODY>
    <?php
    $num = "8";
    $resultado = 0;

    for ($i = 1; $i <= 10; $i++) {
        $resultado = $num * $i;
        echo $num . " * " . $i . " = " . $resultado . "</br>";
    }

    ?>
</BODY>

</HTML>
