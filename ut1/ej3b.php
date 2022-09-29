<HTML>

<HEAD>
	<TITLE> EJ3B – Conversor Decimal a base 16</TITLE>
</HEAD>

<BODY>
	<?php

	$num = 222;
	$base = 16;
	$resultado = $num;
	$final = " ";

	while ($resultado >= $base) {

		$resto = $resultado % $base;
		$resultado = $resultado / $base;
		if ($resto == 10) {
			$resto = "A";
		}
		if ($resto == 11) {
			$resto = "B";
		}
		if ($resto == 12) {
			$resto = "C";
		}
		if ($resto == 13) {
			$resto = "D";
		}
		if ($resto == 14) {
			$resto = "E";
		}
		if ($resto == 15) {
			$resto = "F";
		}

		$final .= $resto;
	}

	$resultado = ((int)$resultado);

	if ($resultado == 10) {
		$resultado = "A";
	}
	if ($resultado == 11) {
		$resultado = "B";
	}
	if ($resultado == 12) {
		$resultado = "C";
	}
	if ($resultado == 13) {
		$resultado = "D";
	}
	if ($resultado == 14) {
		$resultado = "E";
	}
	if ($resultado == 15) {
		$resultado = "F";
	}

	echo "Numero $num en hexadecimal = " . $resultado . strrev($final);

	?>
</BODY>

</HTML>
