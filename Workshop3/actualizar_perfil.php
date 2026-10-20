
<?php

session_start();

if (!isset($_SESSION["id"])) {
    header("Location: Index.php");
    exit;
}

require_once "Conexion.php";

$id = $_SESSION["id"];
$usuario = trim($_POST["usuario"] ?? "");
$id_provincia = $_POST["id_provincia"] ?? "";

if ($usuario == "" || !ctype_digit((string)$id_provincia)) {
    echo "Datos incorrectos.";
    exit;
}

$sql = "UPDATE usuarios
        SET usuario = :usuario,
            id_provincia = :id_provincia
        WHERE id = :id";

$stmt = $conexion->prepare($sql);

$stmt->execute([
    ":usuario" => $usuario,
    ":id_provincia" => $id_provincia,
    ":id" => $id
]);

$_SESSION["usuario"] = $usuario;

header("Location: panel.php");
exit;

?>

