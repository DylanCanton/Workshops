
<?php

session_start();

// Verificar que el usuario haya iniciado sesión
if (!isset($_SESSION["id"])) {
    header("Location: Index.php");
    exit;
}

require_once "Conexion.php";

// Obtener el ID del usuario autenticado
$id = $_SESSION["id"];

// Consultar los datos del usuario y su provincia
$sql = "SELECT usuarios.id, usuarios.usuario,
               usuarios.id_provincia,
               provincias.nombre AS provincia
        FROM usuarios
        LEFT JOIN provincias
        ON usuarios.id_provincia = provincias.id_provincia
        WHERE usuarios.id = :id";

$stmt = $conexion->prepare($sql);

$stmt->execute([
    ":id" => $id
]);

$datos_usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar que el usuario exista
if (!$datos_usuario) {
    header("Location: logout.php");
    exit;
}

// Obtener las provincias para el formulario
$sql_provincias = "SELECT * FROM provincias";

$stmt_provincias = $conexion->prepare($sql_provincias);

$stmt_provincias->execute();

$provincias = $stmt_provincias->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mi Perfil - Workshop 2</title>

    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <div class="panel-container">

        <!-- ENCABEZADO -->

        <div class="panel-header">

            <div>
                <h1>Mi Perfil</h1>
                <p>Administración de mi cuenta</p>
            </div>

            <a href="logout.php" class="btn-logout">
                Cerrar sesión
            </a>

        </div>

        <!-- BIENVENIDA -->

        <div class="bienvenida">

            <h2>
                ¡Bienvenido,
                <?php echo htmlspecialchars($datos_usuario["usuario"]); ?>!
            </h2>

            <p>
                Actualiza tu información personal y mantén tu cuenta segura.
            </p>

        </div>


        <div class="panel-grid">


            <div class="card">

                <h2>Información personal</h2>

                <div class="info-item">

                    <span>Nombre de usuario</span>

                    <strong>
                        <?php echo htmlspecialchars($datos_usuario["usuario"]); ?>
                    </strong>

                </div>

                <div class="info-item">

                    <span>Provincia</span>

                    <strong>
                        <?php echo htmlspecialchars($datos_usuario["provincia"] ?? "Sin provincia"); ?>
                    </strong>

                </div>

                <div class="estado">
                    ● Sesión activa
                </div>

            </div>

            <!-- ACTUALIZAR DATOS -->

            <div class="card">

                <h2>Actualizar mis datos</h2>

                <form action="actualizar_perfil.php" method="POST">

                    <div class="form-group">

                        <label for="usuario">
                            Nombre de usuario
                        </label>

                        <input
                            type="text"
                            id="usuario"
                            name="usuario"
                            value="<?php echo htmlspecialchars($datos_usuario['usuario']); ?>"
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

                            <?php foreach ($provincias as $provincia) { ?>

                                <option
                                    value="<?php echo $provincia['id_provincia']; ?>"
                                    <?php
                                    if ($datos_usuario["id_provincia"] == $provincia["id_provincia"]) {
                                        echo "selected";
                                    }
                                    ?>
                                >
                                    <?php echo htmlspecialchars($provincia["nombre"]); ?>
                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <button type="submit" class="btn-guardar">
                        Guardar cambios
                    </button>

                </form>

            </div>

        </div>


        <div class="panel-footer">
            Workshop2 S.A
        </div>

    </div>

</body>
</html>
