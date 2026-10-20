<?php

session_start();

// Verificar que el usuario inició sesión
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit;
}

// Conexión a la base de datos
require_once "conexion.php";

// Verificar que los datos se enviaron por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recibir el ID del curso
    $id = $_POST["id"] ?? null;

    if ($id) {

        // Consulta para eliminar el curso
        $sql = "DELETE FROM cursos WHERE id = :id";

        $stmt = $conexion->prepare($sql);

        $stmt->execute([
            ":id" => $id
        ]);
    }
}

// Regresar al listado de cursos
header("Location: cursos.php");
exit;

?>