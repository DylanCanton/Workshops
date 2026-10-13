
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión</title>

    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <div class="login-container">

        <div class="login-card">

            <div class="login-header">
                <h2>Bienvenido</h2>
                <p>Inicia sesión para Continuar</p>
            </div>

            <form action="autentificar.php" method="POST">

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

                <p>
                    ¿No tienes una cuenta?
                    <a href="Registro.php">Regístrate aquí</a>
                </p>

            </form>

            <div class="footer">
            </div>

        </div>

    </div>

</body>

</html>
