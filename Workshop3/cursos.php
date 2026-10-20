<?php

session_start();

// Verificar inicio sesión
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit;
}

// Conexión a MySQL
require_once "conexion.php";

// Consultar los cursos
$sql = "SELECT * FROM cursos";

$stmt = $conexion->prepare($sql);
$stmt->execute();

$cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Cursos</title>
</head>
<body>

    <h1>Listado de Cursos</h1>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Código</th>
            <th>ID Carrera</th>
            <th>Créditos</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($cursos as $curso) { ?>
            <tr>
                <td><?php echo htmlspecialchars($curso["nombre"]); ?></td>
                <td><?php echo htmlspecialchars($curso["codigo"]); ?></td>
                <td><?php echo htmlspecialchars($curso["id_carrera"]); ?></td>
                <td><?php echo htmlspecialchars($curso["creditos"]); ?></td>
                <td><?php echo htmlspecialchars($curso["descripcion"] ?? ""); ?></td>

                <td>
                    <a href="editarCurso.php?id=<?php echo $curso["id"]; ?>">
                        Editar
                    </a>
                </td>
            </tr>
        <?php } ?>

    </table>

</body>
</html>