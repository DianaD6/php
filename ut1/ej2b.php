<HTML>
<HEAD><TITLE> EJ2B – Conversor Decimal a base n </TITLE></HEAD>
<BODY>
<?php

$num=1;
$base = 8;
$resultado = $num/$base;
$resto1=$num%$base;
$cadena="";

while($resultado >= $base){
	
	$resto2 = $resultado%$base;

	$resultado = $resultado/$base;

	$cadena .=$resto2;
	
}
if ($num == 1){
	$final = strrev($cadena).$resto1;
	echo "Numero $num en base $base = ". $final;
	
} else if ($base == 2) {
	
	$final = ((int)$resultado).strrev($cadena).$resto1;
	$final = str_pad($final,8,"0",STR_PAD_LEFT);
	echo "Numero $num en base $base = ". $final;
	
} else {
	
	$final = ((int)$resultado).strrev($cadena).$resto1;
	echo "Numero $num en base $base = ". $final;
	
}

?>
</BODY>
</HTML>

