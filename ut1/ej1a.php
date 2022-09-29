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


V2.0

<HEAD><TITLE> Ejercicios arrays unidimensionales </TITLE></HEAD>
<BODY>
<?php
echo "<table border='2'>";
echo"	<tr>";
echo"		<th>Media impares</th>";
echo"		<th>Media pares</th>";
echo"	</tr>";
$i=1;
$impar=array();
while(count($impar)<20){
	
	if($i%2  !=0){
		array_push($impar, $i);
	}
	$i++;
}
$sumaImpar = 0;
$sumaPar = 0;
for($i=0; $i < count($impar); $i++){
	
	if($i%2 != 0){
		$sumaImpar=$sumaImpar+$impar[$i];
	}else{
		$sumaPar=$sumaPar+$impar[$i];
	}
}
$mediaImpares = $sumaImpar/(count($impar)/2);
$mediaPares = $sumaPar/(count($impar)/2);
echo "<tr>";
echo	"<td>$mediaImpares</td>";
echo	"<td>$mediaPares</td>";
echo "</tr>";
?>
</BODY>
</HTML>
