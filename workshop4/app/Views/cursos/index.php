
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Listado de Cursos - Workshop 4</title>

    <!-- Archivo externo de estilos -->
    <link rel="stylesheet" href="estilos.css?v=2">
</head>

<body>

    <div class="cursos-container">

        <!-- Menú de navegación -->
    <nav class="cursos-nav">
        <a href="index.php?ruta=/perfil">Mi Perfil</a>
        <a href="index.php?ruta=/cursos">Cursos</a>
        <a href="index.php?ruta=/logout">Cerrar sesión</a>
    </nav>

        <!-- Encabezado -->
        <div class="cursos-header">

            <h1>Listado de Cursos</h1>

            <a
                href="index.php?ruta=/cursos/crear"
                class="btn-curso btn-nuevo"
            >
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
                            <?php echo htmlspecialchars($curso["nombre"], ENT_QUOTES, "UTF-8"); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($curso["codigo"], ENT_QUOTES, "UTF-8"); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($curso["id_carrera"], ENT_QUOTES, "UTF-8"); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($curso["creditos"], ENT_QUOTES, "UTF-8"); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($curso["descripcion"] ?? "", ENT_QUOTES, "UTF-8"); ?>
                        </td>

                        <td>

                            <div class="acciones-curso">

                                <!-- Editar curso -->
                                <a
                                    href="index.php?ruta=/cursos/editar&id=<?php echo (int) $curso["id"]; ?>"
                                    class="btn-curso btn-editar"
                                >
                                    Editar
                                </a>

                                <!-- Eliminar curso mediante POST -->
                                <form
                                    action="index.php?ruta=/cursos/eliminar"
                                    method="POST"
                                    onsubmit="return confirm('¿Estás seguro de eliminar este curso?');"
                                >

                                    <input
                                        type="hidden"
                                        name="id"
                                        value="<?php echo (int) $curso["id"]; ?>"
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
