<?php

session_start();

if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit;
}

require_once "conexion.php";

// Verifica enviar por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $codigo = $_POST["codigo"];
    $id_carrera = $_POST["id_carrera"];
    $creditos = $_POST["creditos"];
    $descripcion = $_POST["descripcion"];

    // Actualiza el curso en la base de datos
    $sql = "UPDATE cursos
            SET nombre = :nombre,
                codigo = :codigo,
                id_carrera = :id_carrera,
                creditos = :creditos,
                descripcion = :descripcion
            WHERE id = :id";

    $stmt = $conexion->prepare($sql);

    $stmt->execute([
        ":id" => $id,
        ":nombre" => $nombre,
        ":codigo" => $codigo,
        ":id_carrera" => $id_carrera,
        ":creditos" => $creditos,
        ":descripcion" => $descripcion
    ]);

    // Regresa al listado de cursos
    header("Location: cursos.php");
    exit;
}

header("Location: cursos.php");
exit;