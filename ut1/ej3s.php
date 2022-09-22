<HTML>
<HEAD><TITLE> EJ2-Direccion Red – Broadcast y Rango</TITLE></HEAD>
<BODY>
<?php
// A partir de la dirección IP y la máscara de red, obtener la dirección de red, la
//dirección de broadcast y el rango de IPs disponibles para los equipos

$ip="192.0.0.33/30";
// Muestro ip y mascara
echo "IP " .$ip;
echo "<br/>";
$masc = substr($ip,((strpos($ip,"/")+1)));
echo "Máscara " .$masc;
echo "<br/>";

//Convierto en binario
$p1 = strpos($ip,"."); 
$p2 = strpos($ip,".",($p1+1));
$p3 = strrpos($ip,".");

$num1 = substr($ip,0,($p1));
$num2 = substr($ip,($p1+1),($p2-$p1-1));
$num3 = substr($ip,($p2+1),($p3-$p2-1));
$num4 = substr($ip,($p3+1),($p3));

$n1 = decbin($num1);
$n2 = decbin($num2);
$n3 = decbin($num3);
$n4 = decbin($num4);

//paso para no perder los 0 del principio
$n1 = str_pad($n1,8,"0",STR_PAD_LEFT);
$n2 = str_pad($n2,8,"0",STR_PAD_LEFT);
$n3 = str_pad($n3,8,"0",STR_PAD_LEFT);
$n4 = str_pad($n4,8,"0",STR_PAD_LEFT);

$binIp = $n1.$n2.$n3.$n4;

//Comprobamos que funciona: 
//echo "binario: ".$binIp."<br/>";  //es un string

//Divido el binario de la ip por la mascara de red
$dirRed1 = substr($binIp,0,$masc);
$dirRed2 = substr($binIp,$masc,((strlen($binIp))-$masc));	

//compruebo
//echo "primera division: ".$dirRed1."<br/>";  //1100000010101000
//echo "segunda division: ".$dirRed2."<br/>";  // 0001000001100100

//Direccion de Red: Convierto la segunda division en 0
$dirRed02 = str_replace("1","0","$dirRed2");

//compruebo
//echo "segunda division convertida: ".$dirRed2."<br/>";

//vuelvo a juntar todo
$binDirRed = $dirRed1.$dirRed02;

//compruebo
//echo "binario direccion red: ".$binDirRed."<br/>"; 

//Divido la ip en cuatro partes de 8 bits
$bitDirRed1 = substr($binDirRed,0,8);
$bitDirRed2 = substr($binDirRed,8,8);
$bitDirRed3 = substr($binDirRed,16,8);
$bitDirRed4 = substr($binDirRed,24,8);

//Muestro dirección de red y convierto en decimal
$direccionRed = bindec($bitDirRed1).".".bindec($bitDirRed2).".".bindec($bitDirRed3).".".bindec($bitDirRed4);
echo "Direccion Red: ".$direccionRed."<br/>";

//Saco la Direccion de Broadcast
$dirRed12 = str_replace("0","1","$dirRed2");
//echo $dirRed12;

//juntamos todo
$binDirBr = $dirRed1.$dirRed12;
//echo $binDirBr."<br/>";
//dividimos la ip en cada 8 bits
$bitDirBr1 = substr($binDirBr,0,8);
$bitDirBr2 = substr($binDirBr,8,8);
$bitDirBr3 = substr($binDirBr,16,8);
$bitDirBr4 = substr($binDirBr,24,8);

//Muestro direccion Broadcast y convierto en decimal
$direccionBroadcast = bindec($bitDirBr1).".".bindec($bitDirBr2).".".bindec($bitDirBr3).".".bindec($bitDirBr4);
echo "Direccion Broadcast: ".$direccionBroadcast."<br/>";

//Rango:
echo "Rango: ".bindec($bitDirRed1).".".bindec($bitDirRed2).".".bindec($bitDirRed3).".".(bindec($bitDirRed4)+1)." a ".bindec($bitDirBr1).".".bindec($bitDirBr2).".".bindec($bitDirBr3).".".(bindec($bitDirBr4)-1);

/*Ejemplos salida:
IP 192.168.16.100/16
Mascara 16
Direccion Red: 192.168.0.0
Direccion Broadcast: 192.168.255.255
Rango: 192.168.0.1 a 192.168.255.254
*/

?>
</BODY>
</HTML>
