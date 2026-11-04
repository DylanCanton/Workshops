
<?php

require_once __DIR__ . "/../Models/Usuario.php";

class AuthController
{
    // Mostrar pantalla de login
    public function login(): void
    {
        if (isset($_SESSION["id"])) {
            header("Location: index.php?ruta=/perfil");
            exit;
        }

        require __DIR__ . "/../Views/auth/login.php";
    }

    // Procesar inicio de sesión
    public function autentificar(): void
    {
        $usuario = trim($_POST["usuario"] ?? "");
        $password = $_POST["password"] ?? "";

        if ($usuario === "" || $password === "") {
            $error = "Usuario o contraseña incorrectos.";
            require __DIR__ . "/../Views/auth/login.php";
            return;
        }

        $datos = Usuario::buscarPorUsuario($usuario);

        if (
            $datos &&
            password_verify($password, $datos["password"])
        ) {
            session_regenerate_id(true);

            $_SESSION["id"] = $datos["id"];
            $_SESSION["usuario"] = $datos["usuario"];

            header("Location: index.php?ruta=/perfil");
            exit;
        }

        $error = "Usuario o contraseña incorrectos.";
        require __DIR__ . "/../Views/auth/login.php";
    }

    // Cerrar sesión
    public function logout(): void
    {
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();

            setcookie(session_name(), "", [
                "expires" => time() - 3600,
                "path" => $params["path"],
                "domain" => $params["domain"],
                "secure" => $params["secure"],
                "httponly" => $params["httponly"],
                "samesite" => $params["samesite"] ?? "Lax"
            ]);
        }

        session_destroy();

        header("Location: index.php?ruta=/login");
        exit;
    }
}
