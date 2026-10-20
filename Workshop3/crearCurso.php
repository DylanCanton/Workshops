<?php

session_start();

// Verificar que el usuario inició sesión
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Curso</title>
</head>
<body>

    <h1>Registrar Nuevo Curso</h1>

    <form action="guardarCurso.php" method="POST">

        <label>Nombre del curso:</label>
        <input type="text" name="nombre" required>

        <br><br>

        <label>Código del curso:</label>
        <input type="text" name="codigo" required>

        <br><br>

        <label>ID de la carrera:</label>
        <input type="number" name="id_carrera" min="1" required>

        <br><br>

        <label>Créditos:</label>
        <input type="number" name="creditos" min="0" required>

        <br><br>

        <label>Descripción:</label>
        <textarea name="descripcion"></textarea>

        <br><br>

        <button type="submit">Guardar Curso</button>

    </form>

    <br>

    <a href="cursos.php">Volver a Cursos</a>

</body>
</html>