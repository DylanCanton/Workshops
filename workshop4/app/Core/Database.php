
<?php

class Database
{
    private static ?PDO $pdo = null;

    public static function pdo(): PDO
    {
        if (self::$pdo === null) {

            // Utilizar nuestra conexión existente
            require __DIR__ . "/../../conexion.php";

            if (!isset($conexion) || !($conexion instanceof PDO)) {
                throw new RuntimeException("Error al conectar con MySQL");
            }

            self::$pdo = $conexion;
        }

        return self::$pdo;
    }
}
