<HTML>

<HEAD>
    <TITLE> Ejercicios Arrays Unidimensionales</TITLE>
</HEAD>

<BODY>
    <?php
    /*Programa ej7a.php crear un array asociativo con los nombres de 5 alumnos y la edad de cada uno de
ellos. Se pide:
a. Mostrar el contenido del array utilizando bucles.
b. Sitúa el puntero en la segunda posición del array y muestra su valor
c. Avanza una posición y muestra el valor
d. Coloca el puntero en la última posición y muestra el valor
e. Ordena el array por orden de edad (de menor a mayor) y muestra la primera posición del
array y la última */

    $edad = array("Pedro" => "35", "Mariana" => "37", "Andrea" => "43", "Marta" => "5", "Diego" => "72");

    #a
    foreach ($edad as $i => $valor) {
        echo $i . " tiene " . $valor . " años." . "</br>";
    }

    echo "</br>";

    #b
    $posicion = 0;
    foreach ($edad as $i => $valor) {

        if ($posicion == 1) {
            echo "Segunda posicion: " . $i . " tiene " . $valor . " años." . "</br>";
        }
        $posicion++;
    }

    #c
    echo "</br>";
    $segundo = next($edad) . "</br>";
    echo "Segundo v2.0: " . $segundo;
    $avanzo = next($edad);
    echo "Avanzo otra posicion: " . $avanzo . "</br>";


    #d
    echo "</br>";
    echo "Ultima edad: " . end($edad) . "</br>";
    $posicion = 0;
    foreach ($edad as $i => $valor) {

        if ($posicion == count($edad) - 1) {
            echo "Ultima edad v2.0: " . $i . " tiene " . $valor . " años." . "</br>";
        }
        $posicion++;
    }

    echo "</br>";

    #e
    echo "Array del revés: </br>";
    asort($edad);
    foreach ($edad as $i => $valor) {
        echo $i . " tiene " . $valor . " años." . "</br>";
    }


    #var_dump($edad);



    ?>
</BODY>

</HTML>
