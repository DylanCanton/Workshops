
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrar Nuevo Curso - Workshop 4</title>

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
            <h1>Registrar Nuevo Curso</h1>
        </div>

        <!-- Formulario para registrar curso -->
        <form
            action="index.php?ruta=/cursos/guardar"
            method="POST"
            class="formulario-curso"
        >

            <label for="nombre">Nombre del curso:</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                placeholder="Ejemplo: Programación Web"
                required
            >

            <label for="codigo">Código del curso:</label>
            <input
                type="text"
                id="codigo"
                name="codigo"
                placeholder="Ejemplo: ISW-613"
                required
            >

            <label for="id_carrera">ID de la carrera:</label>
            <input
                type="number"
                id="id_carrera"
                name="id_carrera"
                min="1"
                placeholder="Ejemplo: 1"
                required
            >

            <label for="creditos">Créditos:</label>
            <input
                type="number"
                id="creditos"
                name="creditos"
                min="0"
                placeholder="Ejemplo: 4"
                required
            >

            <label for="descripcion">Descripción:</label>
            <textarea
                id="descripcion"
                name="descripcion"
                placeholder="Escribí una descripción del curso"
            ></textarea>

            <!-- Botón guardar -->
            <button
                type="submit"
                class="btn-guardar"
            >
                Guardar Curso
            </button>

        </form>

    </div>

</body>
</html>

