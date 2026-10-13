<?php

require_once "Conexion.php";

$usuario = $_POST["usuario"];
$password = $_POST["password"];
$id_provincia = $_POST["id_provincia"];

$password_segura = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (usuario, password, id_provincia)
        VALUES (:usuario, :password, :id_provincia)";

$stmt = $conexion->prepare($sql);

$stmt->bindParam(":usuario", $usuario);
$stmt->bindParam(":password", $password_segura);
$stmt->bindParam(":id_provincia", $id_provincia);

$stmt->execute();

echo "Usuario registrado correctamente";

?>