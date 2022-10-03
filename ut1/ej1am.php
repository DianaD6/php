<HTML>

<HEAD>
    <TITLE> Ejercicios Arrays Unidimensionales</TITLE>
</HEAD>

<BODY>
    <?php

    $matriz1 = array();
    $matriz2 = array();
    $matriz2 = array();
    $matriz = array();
    $valor = 1;


    echo "<table>";
    echo "<tr>";
    for ($i = 0; $i < 3; $i++) {
        $matriz1[$i] = $valor * 2;
        $valor++;
    }

    for ($j = 0; $j < 3; $j++) {
        $matriz2[$j] = $valor * 2;
        $valor++;
    }
    for ($k = 0; $k < 3; $k++) {
        $matriz3[$k] = $valor * 2;
        $valor++;
    }

    $matriz = array($matriz1, $matriz2, $matriz3);
    /*
    
    $matriz = m1= 2   4  8
              m2= 8  10 12
              m3= 14 16 18
    */
    echo "<table border = 1>";
    for ($i = 0; $i < count($matriz); $i++) {
        echo "<tr>";
        for ($j = 0; $j < count($matriz[$i]); $j++) {
            echo "<td>";
            echo $matriz[$i][$j];
            echo "</td>";
        }
        echo "</tr>";
    }


    var_dump($matriz);
    ?>
</BODY>

</HTML>
