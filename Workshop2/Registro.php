<?php

require_once "conexion.php";

$sql = "SELECT * FROM provincias";

$stmt = $conexion->prepare($sql);

$stmt->execute();

$provincias = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de usuarios</title>
</head>
<body>

    <h2>Registro de usuarios</h2>

    <form action="guardar_usuario.php" method="POST">

        <label>Usuario:</label>
        <input type="text" name="usuario" required>

        <br><br>

        <label>Contraseña:</label>
        <input type="password" name="password" required>

        <br><br>

        <label>Provincia:</label>
        <select name="id_provincia" required>
            <option value="">Seleccione una provincia</option>

            <?php foreach ($provincias as $provincia) { ?>

                <option value="<?php echo $provincia['id_provincia']; ?>">
                    <?php echo htmlspecialchars($provincia['nombre']); ?>
                </option>

            <?php } ?>

        </select>

        <br><br>

        <button type="submit">Registrarse</button>

    </form>

</body>
</html>