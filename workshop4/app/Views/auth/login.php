
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión - Workshop 4</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <div class="login-container">
        <div class="login-card">

            <div class="login-header">
                <h2>Bienvenido</h2>
                <p>Inicia sesión para continuar</p>
            </div>

            <?php if (isset($error)): ?>
                <p style="color: red;">
                    <?php echo htmlspecialchars(
                        $error, ENT_QUOTES, "UTF-8"
                    ); ?>
                </p>
            <?php endif; ?>

            <form
                action="index.php?ruta=/autentificar"
                method="POST"
            >

                <div class="form-group">
                    <label for="usuario">Usuario</label>

                    <input
                        type="text"
                        id="usuario"
                        name="usuario"
                        placeholder="Ingresa tu usuario"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Ingresa tu contraseña"
                        required
                    >
                </div>

                <button type="submit">
                    Iniciar sesión
                </button>

            </form>

        </div>
    </div>

</body>
</html>
