<?php

session_start();

// Verificar inició sesión
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit;
}
require_once "conexion.php";

// Verifica los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recibe los datos del formulario
    $nombre = $_POST["nombre"];
    $codigo = $_POST["codigo"];
    $id_carrera = $_POST["id_carrera"];
    $creditos = $_POST["creditos"];
    $descripcion = $_POST["descripcion"];

    $sql = "INSERT INTO cursos
            (nombre, codigo, id_carrera, creditos, descripcion)
            VALUES
            (:nombre, :codigo, :id_carrera, :creditos, :descripcion)";

    $stmt = $conexion->prepare($sql);

    $stmt->execute([
        ":nombre" => $nombre,
        ":codigo" => $codigo,
        ":id_carrera" => $id_carrera,
        ":creditos" => $creditos,
        ":descripcion" => $descripcion
    ]);

    header("Location: cursos.php");
    exit;
}

?>