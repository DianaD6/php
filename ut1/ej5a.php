
<HTML>

<HEAD>
    <TITLE> Ejercicios Arrays Unidimensionales</TITLE>
</HEAD>

<BODY>
    <?php
    /*definir tres arrays con los siguientes valores relativos a módulos que se imparten en
el ciclo DAW:
“Bases Datos”, “Entornos Desarrollo”, “Programación”
“Sistemas Informáticos”,”FOL”,”Mecanizado”
“Desarrollo Web ES”,”Desarrollo Web EC”,”Despliegue”,”Desarrollo Interfaces”, “Inglés”
Se pide:
*/

    $arr1 = array("Bases Datos", "Entornos Desarrollo", "Programación");
    $arr2 = array("Sistemas Informaticos", "FOL", "Mecanizado");
    $arr3 = array("Desarrollo Web ES", "Desarrollo Web EC", "Despliegue", "Desarrollo Interfaces", "Ingles");

    //a. Unir los 3 arrays en uno único sin utilizar funciones de arrays
    $arr4 = array();

    for ($i = 0; $i < count($arr1); $i++) {

        $arr4[$i] = $arr1[$i];
    }
    for ($i = 0; $i < count($arr2); $i++) {

        $arr4[$i + count($arr1)] = $arr2[$i];
    }
    for ($i = 0; $i < count($arr3); $i++) {

        $arr4[$i + count($arr1) + count($arr2)] = $arr3[$i];
    }

    var_dump($arr4);

    //b. Unir los 3 arrays en uno único usando la función array_merge()
    $arrMer = array_merge($arr1, $arr2, $arr3);
    var_dump($arrMer);

    //c. Unir los 3 arrays en uno único usando la función array_push()
    foreach ($arr1 as $value) {
        array_push($arr2, $value);
    }
    foreach ($arr3 as $value) {
        array_push($arr2, $value);
    }
    var_dump($arr2);
    ?>
</BODY>

</HTML>
