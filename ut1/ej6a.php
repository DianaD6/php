<HTML>

<HEAD>
    <TITLE> Ejercicios Arrays Unidimensionales</TITLE>
</HEAD>

<BODY>
    <?php

    $arr1 = array("Bases Datos", "Entornos Desarrollo", "Programación");
    $arr2 = array("Sistemas Informaticos", "FOL", "Mecanizado");
    $arr3 = array("Desarrollo Web ES", "Desarrollo Web EC", "Despliegue", "Desarrollo Interfaces", "Ingles");

    $arr = array_merge($arr1, $arr2, $arr3);
    array_splice($arr, 5, 1);
    $arr = array_reverse($arr);

    foreach ($arr as $value) {
        echo $value . "</br>";
    }

    ?>
</BODY>

</HTML>
