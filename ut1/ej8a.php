<HTML>

<HEAD>
    <TITLE> Ejercicios Arrays Unidimensionales</TITLE>
</HEAD>

<BODY>

//Llamado de funciones y resto de programa
    <?php
    /*Programa ej8a.php crear un array asociativo con los nombres de 5 alumnos y la nota de cada uno de
ellos en Bases Datos. Se pide:
a. Mostrar el alumno con mayor nota.
b. Mostrar el alumno con menor nota.
c. Media notas obtenidas por los alumnos*/

    $baseDatos = array("Dani" => "7", "Sandra" => "8", "Pepe" => "6", "Oscar" => "10", "Manuel" => "7");

    $mayorNota = array_search(max($baseDatos), $baseDatos);

    echo "El alumno con mayor nota es " . $mayorNota . "<br>";

    $menorNota = array_search(min($baseDatos), $baseDatos);

    echo "El alumno con menos nota es " . $menorNota . "<br>";

    mediaNotas($baseDatos); //devuelve funcion

    ?>

//FUNCIONES

    <?php

    function mediaNotas($baseDatos) //recibe por parámetro el array baseDatos
    {

        $suma = 0;

        foreach ($baseDatos as $i => $valor) {

            $suma = $suma + $valor;  //recorre el array para la suma
        }

        $media = $suma / count($baseDatos);

        echo "La media de las notas es: " . $media; //sacamos la media
    }


    ?>
</BODY>

</HTML>
