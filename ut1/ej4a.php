<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php
echo "<table border='1'>";
echo"	<tr>";
echo"		<th>Indice</th>";
echo"		<th>Binario</th>";
echo"	</tr>";

$arr = array();

for($i=0; $i < 20; $i++){
	
	$arr[$i] = decbin($i);

}

$revertido = array_reverse($arr);

$indice = 0;
foreach($revertido as $valor){
echo "<tr>";	
	echo	"<td>$indice</td>";
	echo	"<td>$valor</td>";
echo "</tr>";
$indice++;
}

//var_dump($revertido);
?>
</BODY>
</HTML>
