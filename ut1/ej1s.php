<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
$ip="192.18.16.204";

$p1 = strpos($ip,".");  //esto es la posición: 3
$p2 = strpos($ip,".",($p1+1)); //esto es la posición: 6
$p3 = strrpos($ip,"."); //esto es la posición: 9

$num1 = substr($ip,0,($p1)); //($ip,0,[longitud:3])
$num2 = substr($ip,($p1+1),($p2-$p1-1)); // 6-3-1
$num3 = substr($ip,($p2+1),($p3-$p2-1));
$num4 = substr($ip,($p3+1),($p3));


printf("IP $num1.$num2.$num3.$num4 en binario es %08b.%08b.%08b.%08b <br/>",$num1,$num2,$num3,$num4);

//%08b como tiene que tener 8 valores, se pone el 08 para que no omita los ceros antes de un numero.

?>
</BODY>
</HTML>
