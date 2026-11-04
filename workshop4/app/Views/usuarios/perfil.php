
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mi Perfil - Workshop 4</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <div class="cursos-container">

        <!-- Menú de navegación -->
        <nav class="cursos-nav">
            <a href="index.php?ruta=/perfil">Mi Perfil</a>
            <a href="index.php?ruta=/cursos">Cursos</a>
            <a href="index.php?ruta=/logout">Cerrar sesión</a>
        </nav>

        <hr>

        <div class="panel-header">

            <div>
                <h1>Mi Perfil</h1>
                <p>Administración de mi cuenta</p>
            </div>

            <a
                href="index.php?ruta=/logout"
                class="btn-logout"
            >
                Cerrar sesión
            </a>

        </div>

        <div class="bienvenida">

            <h2>
                ¡Bienvenido,
                <?php echo htmlspecialchars(
                    $datos_usuario["usuario"],
                    ENT_QUOTES,
                    "UTF-8"
                ); ?>!
            </h2>

            <p>
                Actualiza tu información personal y mantén
                tu cuenta segura.
            </p>

        </div>

        <div class="panel-grid">

            <!-- Información del usuario -->
            <div class="card">

                <h2>Información personal</h2>

                <div class="info-item">
                    <span>Nombre de usuario</span>

                    <strong>
                        <?php echo htmlspecialchars(
                            $datos_usuario["usuario"],
                            ENT_QUOTES,
                            "UTF-8"
                        ); ?>
                    </strong>
                </div>

                <div class="info-item">
                    <span>Provincia</span>

                    <strong>
                        <?php echo htmlspecialchars(
                            $datos_usuario["provincia"] ?? "Sin provincia",
                            ENT_QUOTES,
                            "UTF-8"
                        ); ?>
                    </strong>
                </div>

                <div class="estado">
                    ● Sesión activa
                </div>

            </div>

            <!-- Actualizar perfil -->
            <div class="card">

                <h2>Actualizar mis datos</h2>

                <form
                    action="index.php?ruta=/perfil/actualizar"
                    method="POST"
                >

                    <div class="form-group">

                        <label for="usuario">
                            Nombre de usuario
                        </label>

                        <input
                            type="text"
                            id="usuario"
                            name="usuario"
                            value="<?php echo htmlspecialchars(
                                $datos_usuario['usuario'],
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>"
                            required
                        >

                    </div>

                    <div class="form-group">

                        <label for="id_provincia">
                            Provincia
                        </label>

                        <select
                            id="id_provincia"
                            name="id_provincia"
                            required
                        >

                            <option value="">
                                Seleccione una provincia
                            </option>

                            <?php foreach ($provincias as $provincia): ?>

                                <option
                                    value="<?php echo (int) $provincia['id_provincia']; ?>"
                                    <?php
                                    if (
                                        (int) $datos_usuario["id_provincia"] ===
                                        (int) $provincia["id_provincia"]
                                    ) {
                                        echo "selected";
                                    }
                                    ?>
                                >
                                    <?php echo htmlspecialchars(
                                        $provincia["nombre"],
                                        ENT_QUOTES,
                                        "UTF-8"
                                    ); ?>
                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <button
                        type="submit"
                        class="btn-guardar"
                    >
                        Guardar cambios
                    </button>

                </form>

            </div>

        </div>

        <div class="panel-footer">
            Workshop 4 - Patrón MVC
        </div>

    </div>

</body>
</html>
