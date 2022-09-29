<!DOCTYPE html>
<HTML>
<HEAD><TITLE> Ejercicios arrays unidimensionales </TITLE></HEAD>
<BODY>
<?php

$i=1;
$impar=array();

while(count($impar)<20){
	
	if($i%2!=0){
		array_push($impar, $i);
	}
	$i++;

}

echo "<table border='1'>";
echo"	<tr>";
echo"		<th>Indice</th>";
echo"		<th>Valor</th>";
echo"		<th>Suma</th>";
echo"	</tr>";

$suma = 0;
$posicion = 0;
foreach ($impar as $valor) {

$suma = $suma + $valor;

echo "<tr>";
echo	"<td>$posicion</td>";
echo	"<td>$valor</td>";
echo	"<td>$suma</td>";
echo "</tr>";
$posicion++;
}


?>
</BODY>
</HTML>

