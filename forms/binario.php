<!DOCTYPE html>
<html>

<head>
    <title>Conversor binario</title>
</head>

<body>
    <h1>Conversor binario</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Numero decimal: <input type="text" name="decimal"><br />
        <br>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $decimal = test_input($_POST["decimal"]);
    $resultado = binario($decimal);
    echo "Numero binario ".'<input type="text" name="binario" value="'.$resultado.'">'."<br>";
}
function binario($num){

    return decbin($num);
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
<br>
        <input type="submit" value="Enviar"/>
        <input type="reset" value="Borrar" />
    </form>
</body>

</html>
