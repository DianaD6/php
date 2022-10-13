<?php 
	
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $operando1 = test_input($_POST["operando1"]);
       $operando2 = test_input($_POST["operando2"]);
    if ($operando1 !="" and $operando2!=""){
		if ($_POST["operacion"] == "suma") {
			echo ($resultado = $operando1 + $operando2);
			echo ('<br /><a href="calculadora.html">Volver</a>');
		} elseif ($_POST["operacion"] == "resta") {
			echo ($resultado = $operando1 - $operando2);
			echo ('<br /><a href="calculadora.html">Volver</a>');
		} elseif ($_POST["operacion"] == "multiplicacion") {
			echo ($resultado = $operando1 * $operando2);
			echo ('<br /><a href="calculadora.html">Volver</a>');
		} elseif ($_POST["operacion"] == "division") {
			echo ($resultado = $operando1 / $operando2);
			echo ('<br /><a href="calculadora.html">Volver</a>');
		}
	} else {
		echo("Ingresa alg&uacute;n valor");
		echo ('<br /><a href="calculadora.html">Volver</a>');
	}
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
