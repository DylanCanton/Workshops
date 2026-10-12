<?php

session_start();
require_once "conexion.php";

$usuario = $_POST["usuario"];
$password = $_POST["password"];

$sql = "SELECT * FROM usuarios
        WHERE usuario = :usuario
        AND password = :password
        LIMIT 1";
echo"paso 1";
$stmt = $conexion->prepare($sql);

$stmt->execute([
    ":usuario" => $usuario,
    ":password" => $password
]);
echo"paso 2";
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
echo"paso 3";
if ($usuario) {

    $_SESSION["id"] = $usuario["id"];
    $_SESSION["usuario"] = $usuario["usuario"];

    header("Location: panel.php");
    exit;

} else {

    echo "Correo o contraseña incorrectos.";

}