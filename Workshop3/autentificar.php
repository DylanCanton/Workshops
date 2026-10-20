
<?php

session_start();
require_once "conexion.php";

$usuario = $_POST["usuario"];
$password = $_POST["password"];

$sql = "SELECT * FROM usuarios
        WHERE usuario = :usuario
        LIMIT 1";

$stmt = $conexion->prepare($sql);

$stmt->execute([
    ":usuario" => $usuario
]);

$datos_usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($datos_usuario && password_verify($password, $datos_usuario["password"])) {

    $_SESSION["id"] = $datos_usuario["id"];
    $_SESSION["usuario"] = $datos_usuario["usuario"];

    header("Location: panel.php");
    exit;

} else {

    echo "Usuario o contraseña incorrectos.";

}
