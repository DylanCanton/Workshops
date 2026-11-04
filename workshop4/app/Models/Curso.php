

<?php

require_once __DIR__ . "/../Core/Database.php";

class Curso
{
    // Listar todos los cursos
    public static function all(): array
    {
        $conexion = Database::pdo();

        $stmt = $conexion->prepare("SELECT * FROM cursos");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar un curso por ID
    public static function find(int $id): ?array
    {
        $conexion = Database::pdo();

        $stmt = $conexion->prepare(
            "SELECT * FROM cursos WHERE id = :id"
        );

        $stmt->execute([":id" => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    // Guardar nuevo curso
    public static function create(array $datos): void
    {
        $conexion = Database::pdo();

        $sql = "INSERT INTO cursos
                (nombre, codigo, id_carrera, creditos, descripcion)
                VALUES
                (:nombre, :codigo, :id_carrera, :creditos, :descripcion)";

        $stmt = $conexion->prepare($sql);
        $stmt->execute($datos);
    }

    // Actualizar curso
    public static function update(array $datos): void
    {
        $conexion = Database::pdo();

        $sql = "UPDATE cursos
                SET nombre = :nombre,
                    codigo = :codigo,
                    id_carrera = :id_carrera,
                    creditos = :creditos,
                    descripcion = :descripcion
                WHERE id = :id";

        $stmt = $conexion->prepare($sql);
        $stmt->execute($datos);
    }

    // Eliminar curso
    public static function delete(int $id): void
    {
        $conexion = Database::pdo();

        $stmt = $conexion->prepare(
            "DELETE FROM cursos WHERE id = :id"
        );

        $stmt->execute([":id" => $id]);
    }
}



