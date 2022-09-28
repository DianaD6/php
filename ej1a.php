<!DOCTYPE html>
<HTML>
<HEAD><TITLE> Ejercicios arrays unidimensionales </TITLE></HEAD>
<BODY>
<?php

$posicion = -1;

$suma = 0;

echo "<table border='1'>";
echo"	<tr>";
echo"		<th>Indice</th>";
echo"		<th>Valor</th>";
echo"		<th>Suma</th>";
echo"	</tr>";

for($i=0; $posicion < 19; $i++){

	$i++;

	$posicion++;

	$impar[$posicion] = $i;
	
	$suma = $suma + $impar[$posicion];
echo "<tr>";
echo	"<td>$posicion</td>";
echo	"<td>$i</td>";
echo	"<td>$suma</td>";
echo "</tr>";
	
}

echo"</table>";
?>
</BODY>
</HTML>
