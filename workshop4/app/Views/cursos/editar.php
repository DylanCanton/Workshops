
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Curso - Workshop 4</title>

    <!-- Archivo externo de estilos -->
    <link rel="stylesheet" href="estilos.css?v=3">
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
            <h1>Editar Curso</h1>
        </div>

        <!-- Formulario para editar -->
        <form
            action="index.php?ruta=/cursos/actualizar"
            method="POST"
            class="formulario-curso"
        >

            <!-- ID del curso -->
            <input
                type="hidden"
                name="id"
                value="<?php echo htmlspecialchars($curso["id"], ENT_QUOTES, 'UTF-8'); ?>"
            >

            <!-- Nombre -->
            <label for="nombre">Nombre del curso:</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="<?php echo htmlspecialchars($curso["nombre"], ENT_QUOTES, 'UTF-8'); ?>"
                required
            >

            <!-- Código -->
            <label for="codigo">Código del curso:</label>
            <input
                type="text"
                id="codigo"
                name="codigo"
                value="<?php echo htmlspecialchars($curso["codigo"], ENT_QUOTES, 'UTF-8'); ?>"
                required
            >

            <!-- ID Carrera -->
            <label for="id_carrera">ID de la carrera:</label>
            <input
                type="number"
                id="id_carrera"
                name="id_carrera"
                min="1"
                value="<?php echo htmlspecialchars($curso["id_carrera"], ENT_QUOTES, 'UTF-8'); ?>"
                required
            >

            <!-- Créditos -->
            <label for="creditos">Créditos:</label>
            <input
                type="number"
                id="creditos"
                name="creditos"
                min="0"
                value="<?php echo htmlspecialchars($curso["creditos"], ENT_QUOTES, 'UTF-8'); ?>"
                required
            >

            <!-- Descripción -->
            <label for="descripcion">Descripción:</label>
            <textarea
                id="descripcion"
                name="descripcion"
            ><?php echo htmlspecialchars($curso["descripcion"] ?? "", ENT_QUOTES, 'UTF-8'); ?></textarea>

            <!-- Botón actualizar -->
            <button
                type="submit"
                class="btn-guardar"
            >
                Actualizar Curso
            </button>

        </form>

    </div>

</body>
</html>
