<?php
echo "Inicio db.php"."<br>";
function connectDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "pedidos";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $error = $e->getCode();
        die($e->getCode());
    }

    return $conn;
}

echo "Fin db.php"."<br>";
?>