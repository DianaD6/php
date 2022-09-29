<HTML>

<HEAD>
    <TITLE> EJ6B – Factorial</TITLE>
</HEAD>

<BODY>
    <?php
    $num = "5";
    $factorial = 1;

    for ($i = 1; $i <= $num; $i++) {

        $factorial = $factorial * $i;
    }
    echo $factorial . "</br>";
    ?>
</BODY>

</HTML>
