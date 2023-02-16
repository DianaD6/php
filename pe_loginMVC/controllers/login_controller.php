<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-container">
            <div>
                <label for="username">User:</label>
                <input type="text" id="username" name="username">
            </div>
            <br>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit">Iniciar sesión</button>
        </div>
    </form>
</body>

</html>
<?php
echo "Inicio controller"."<br>";
//Llamada al modelo -- Intermediario entre vista y modelo !!!
if ($_SERVER["REQUEST_METHOD"] == "POST") {
require_once("models/login_model.php");
$user =login($_POST['username'], $_POST['password']);
//Llamada a la vista -- Intermediario entre vista y modelo !!!
require_once("views/login_view.php");
echo "Fin controller"."<br>";
}
?>