<?php
echo "Inicio modelo"."<br>";
function login($username, $password)//funcion que recibe el user y password del usuario y comprueba si existe y coincide
{
    $conn = connectDB();
   // global $conn;

    $stmt = $conn->prepare("SELECT * FROM customers WHERE customerNumber = :username AND contactLastName = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $customerNumber = $stmt->fetchColumn(0);

    return $customerNumber; //devuelve true y customerNumber si existe, si no existe devuelve false.
}

echo "Fin modelo"."<br>";
?>