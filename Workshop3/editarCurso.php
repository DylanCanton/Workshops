
<?php

session_start();

// Verificar que el usuario inició sesión
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit;
}

// Conexión a la base de datos
require_once "conexion.php";

// Obtiene id curso desde url
$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: cursos.php");
    exit;
}

// Buscar el curso a editar
$sql = "SELECT * FROM cursos WHERE id = :id";

$stmt = $conexion->prepare($sql);

$stmt->execute([
    ":id" => $id
]);

$curso = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si el curso existe
if (!$curso) {
    header("Location: cursos.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Curso - Workshop 3</title>

    <!-- Archivo externo de estilos -->
    <link rel="stylesheet" href="estilos.css?v=3">
</head>

<body>

    <div class="cursos-container">

        <!-- Menú de navegación -->
        <nav class="cursos-nav">
            <a href="panel.php">Mi Perfil</a>
            <a href="cursos.php">Cursos</a>
            <a href="logout.php">Cerrar sesión</a>
        </nav>

        <!-- Encabezado -->
        <div class="cursos-header">
            <h1>Editar Curso</h1>
        </div>

        <!-- Formulario para editar -->
        <form action="actualizarCurso.php"
              method="POST"
              class="formulario-curso">

            <input
                type="hidden"
                name="id"
                value="<?php echo htmlspecialchars($curso["id"]); ?>"
            >

            <!-- Nombre -->
            <label for="nombre">Nombre del curso:</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="<?php echo htmlspecialchars($curso["nombre"]); ?>"
                required
            >

            <label for="codigo">Código del curso:</label>
            <input
                type="text"
                id="codigo"
                name="codigo"
                value="<?php echo htmlspecialchars($curso["codigo"]); ?>"
                required
            >

            <label for="id_carrera">ID de la carrera:</label>
            <input
                type="number"
                id="id_carrera"
                name="id_carrera"
                min="1"
                value="<?php echo htmlspecialchars($curso["id_carrera"]); ?>"
                required
            >

            <label for="creditos">Créditos:</label>
            <input
                type="number"
                id="creditos"
                name="creditos"
                min="0"
                value="<?php echo htmlspecialchars($curso["creditos"]); ?>"
                required
            >

            <label for="descripcion">Descripción:</label>
            <textarea
                id="descripcion"
                name="descripcion"
            ><?php echo htmlspecialchars($curso["descripcion"] ?? ""); ?></textarea>

            <button type="submit" class="btn-guardar">
                Actualizar Curso
            </button>

        </form>

    </div>

</body>
</html>
