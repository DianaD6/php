<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php

$num=168;
$dividendo = 2;
$resultado = $num/$dividendo;
$resto1=$num%$dividendo;
$cadena="";

while($resultado >= $dividendo){
	
	$resto2 = $resultado%$dividendo;

	$resultado = $resultado/$dividendo;

	$cadena .=$resto2;
	
}

if ($num != 1) {
	
	$binario = ((int)$resultado).strrev($cadena).$resto1;
	echo "Numero $num en binario = ". $binario;
	
} else {
	
	$binario = strrev($cadena).$resto1;
	echo "Numero $num en binario = ". $binario;
	
}

?>
</BODY>
</HTML>
