<?php

session_start();

if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel</title>
</head>
<body>

    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION["usuario"]); ?></h1>

    <p>Has iniciado sesión correctamente.</p>

    <a href="logout.php">Cerrar sesión</a>

</body>
</html>