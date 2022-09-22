<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php

$ip="192.18.16.204";

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

echo str_pad($n1,8,"0",STR_PAD_LEFT).".";
echo str_pad($n2,8,"0",STR_PAD_LEFT).".";
echo str_pad($n2,8,"0",STR_PAD_LEFT).".";
echo str_pad($n2,8,"0",STR_PAD_LEFT);



?>
</BODY>
</HTML>
