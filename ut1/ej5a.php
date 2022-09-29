<HTML>

<HEAD>
    <TITLE> Ejercicios Arrays Unidimensionales</TITLE>
</HEAD>

<BODY>
    <?php
  
    $arr1 = array("Bases Datos", "Entornos Desarrollo", "Programación");
    $arr2 = array("Sistemas Informaticos", "FOL", "Mecanizado");
    $arr3 = array("Desarrollo Web ES", "Desarrollo Web EC", "Despliegue", "Desarrollo Interfaces", "Ingles");
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
  
  
    // foreach ($arr4 as $valor) {
    //     echo $valor . "</br>";
    // }

    ?>
</BODY>

</HTML>
