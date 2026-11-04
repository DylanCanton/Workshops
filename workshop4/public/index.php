
<?php

session_start();

// Cargar Router y controladores
require_once __DIR__ . "/../app/Core/Router.php";
require_once __DIR__ . "/../app/Controllers/AuthController.php";
require_once __DIR__ . "/../app/Controllers/UsuarioController.php";
require_once __DIR__ . "/../app/Controllers/CursoController.php";

// Crear Router
$router = new Router();

// Obtener ruta
$ruta = $_GET["ruta"] ?? "/login";
$metodo = $_SERVER["REQUEST_METHOD"];

// Proteger las rutas privadas
$rutasPublicas = ["/login", "/autentificar"];

if (
    !in_array($ruta, $rutasPublicas, true) &&
    !isset($_SESSION["id"])
) {
    header("Location: index.php?ruta=/login");
    exit;
}

// Rutas de autenticación
$router->get("/login", [AuthController::class, "login"]);
$router->post("/autentificar", [AuthController::class, "autentificar"]);
$router->get("/logout", [AuthController::class, "logout"]);

// Rutas de perfil
$router->get("/perfil", [UsuarioController::class, "perfil"]);
$router->post("/perfil/actualizar", [UsuarioController::class, "actualizar"]);

// Rutas de cursos
$router->get("/cursos", [CursoController::class, "index"]);
$router->get("/cursos/crear", [CursoController::class, "crear"]);
$router->get("/cursos/editar", [CursoController::class, "editar"]);

$router->post("/cursos/guardar", [CursoController::class, "guardar"]);
$router->post("/cursos/actualizar", [CursoController::class, "actualizar"]);
$router->post("/cursos/eliminar", [CursoController::class, "eliminar"]);

// Ejecutar la ruta solicitada
$router->dispatch($metodo, $ruta);
