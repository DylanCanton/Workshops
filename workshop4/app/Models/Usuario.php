
<?php

require_once __DIR__ . "/../Core/Database.php";

class Usuario
{
    // Buscar usuario por nombre para el login
    public static function buscarPorUsuario(string $usuario): ?array
    {
        $conexion = Database::pdo();

        $sql = "SELECT * FROM usuarios
                WHERE usuario = :usuario LIMIT 1";

        $stmt = $conexion->prepare($sql);
        $stmt->execute([":usuario" => $usuario]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    // Buscar los datos del perfil
    public static function buscarPorId(int $id): ?array
    {
        $conexion = Database::pdo();

        $sql = "SELECT usuarios.id, usuarios.usuario,
                       usuarios.id_provincia,
                       provincias.nombre AS provincia
                FROM usuarios
                LEFT JOIN provincias
                ON usuarios.id_provincia = provincias.id_provincia
                WHERE usuarios.id = :id";

        $stmt = $conexion->prepare($sql);
        $stmt->execute([":id" => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    // Obtener todas las provincias
    public static function provincias(): array
    {
        $conexion = Database::pdo();

        $stmt = $conexion->prepare(
            "SELECT * FROM provincias"
        );
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Actualizar el perfil
    public static function actualizar(
        int $id,
        string $usuario,
        int $idProvincia
    ): void {
        $conexion = Database::pdo();

        $sql = "UPDATE usuarios
                SET usuario = :usuario,
                    id_provincia = :id_provincia
                WHERE id = :id";

        $stmt = $conexion->prepare($sql);

        $stmt->execute([
            ":id" => $id,
            ":usuario" => $usuario,
            ":id_provincia" => $idProvincia
        ]);
    }
}
