
<?php

require_once __DIR__ . "/../Models/Usuario.php";

class UsuarioController
{
    // Mostrar perfil
    public function perfil(): void
    {
        $id = (int) $_SESSION["id"];

        $datos_usuario = Usuario::buscarPorId($id);

        if (!$datos_usuario) {
            header("Location: index.php?ruta=/logout");
            exit;
        }

        $provincias = Usuario::provincias();

        require __DIR__ . "/../Views/usuarios/perfil.php";
    }

    // Actualizar perfil
    public function actualizar(): void
    {
        $id = (int) $_SESSION["id"];
        $usuario = trim($_POST["usuario"] ?? "");
        $idProvincia = filter_input(
            INPUT_POST,
            "id_provincia",
            FILTER_VALIDATE_INT
        );

        if (
            $usuario === "" ||
            !$idProvincia ||
            $idProvincia < 1
        ) {
            http_response_code(400);
            exit("Datos incorrectos.");
        }

        // Verificar que la provincia exista
        $provincias = Usuario::provincias();
        $existe = false;

        foreach ($provincias as $provincia) {
            if ((int) $provincia["id_provincia"] === $idProvincia) {
                $existe = true;
                break;
            }
        }

        if (!$existe) {
            http_response_code(400);
            exit("Provincia inválida.");
        }

        Usuario::actualizar($id, $usuario, $idProvincia);

        $_SESSION["usuario"] = $usuario;

        header("Location: index.php?ruta=/perfil");
        exit;
    }
}
