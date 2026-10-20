<?php

session_start();

// Verificar inicio de sesión
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Listado de Cursos - Workshop 3</title>

    <!-- Archivo externo de estilos -->
    <link rel="stylesheet" href="estilos.css?v=2">
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

            <h1>Listado de Cursos</h1>

            <a href="crearCurso.php" class="btn-curso btn-nuevo">
                + Registrar Nuevo Curso
            </a>

        </div>

        <!-- Tabla de cursos -->
        <div class="tabla-contenedor">

            <table class="tabla-cursos">

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
                        <td>
                            <?php echo htmlspecialchars($curso["nombre"]); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($curso["codigo"]); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($curso["id_carrera"]); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($curso["creditos"]); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($curso["descripcion"] ?? ""); ?>
                        </td>

                        <td>

                            <div class="acciones-curso">

                                <!-- Editar curso -->
                                <a
                                    href="editarCurso.php?id=<?php echo $curso["id"]; ?>"
                                    class="btn-curso btn-editar"
                                >
                                    Editar
                                </a>

                                <!-- Eliminar curso mediante POST -->
                                <form
                                    action="eliminarCurso.php"
                                    method="POST"
                                    onsubmit="return confirm('¿Estás seguro de eliminar este curso?');"
                                >

                                    <input
                                        type="hidden"
                                        name="id"
                                        value="<?php echo $curso["id"]; ?>"
                                    >

                                    <button
                                        type="submit"
                                        class="btn-curso btn-eliminar"
                                    >
                                        Eliminar
                                    </button>

                                </form>

                            </div>

                        </td>
                    </tr>

                <?php } ?>

            </table>

        </div>

    </div>

</body>
</html>
