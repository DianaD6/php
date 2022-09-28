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

$impares=array();
$pares=array();

for($i=0; $i < count($impar); $i++){
	
	if($i%2 != 0){
		array_push($impares, $impar[$i]);
	}else{
		array_push($pares, $impar[$i]);
	}
}

$sumaImpar = 0;
foreach ($impares as $valorImp) {
	$sumaImpar=$sumaImpar+$valorImp;
}
$sumaPar = 0;
foreach ($pares as $valorPar) {
	$sumaPar=$sumaPar+$valorPar;
}

$mediaImpares = $sumaImpar/count($impares);
$mediaPares = $sumaPar/count($pares);

echo "<tr>";
echo	"<td>$mediaImpares</td>";
echo	"<td>$mediaPares</td>";
echo "</tr>";

?>
</BODY>
</HTML>
