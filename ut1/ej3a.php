<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php
echo "<table border='1'>";
echo"	<tr>";
echo"		<th>Indice</th>";
echo"		<th>Binario</th>";
echo"		<th>Octal</th>";
echo"	</tr>";

$arr = array();

for($i=0; $i < 20; $i++){
	
	$arr[$i] = decbin($i);
	$octal = decoct($i);
	
echo "<tr>";
echo	"<td>$i</td>";
echo	"<td>$arr[$i]</td>";
echo	"<td>$octal</td>";
echo "</tr>";
}

?>
</BODY>
</HTML>
