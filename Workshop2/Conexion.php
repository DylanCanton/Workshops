<?php

$host = "localhost";
$db = "workshop2";
$user = "root";
$pass = "";

try {
    $conexion = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $pass
    );

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión correcta a MySQL";

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}