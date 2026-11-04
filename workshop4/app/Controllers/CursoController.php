
<?php

require_once __DIR__ . "/../Models/Curso.php";

class CursoController
{
    // Mostrar listado
    public function index(): void
    {
        $cursos = Curso::all();

        require __DIR__ . "/../Views/cursos/index.php";
    }

    // Mostrar formulario de registro
    public function crear(): void
    {
        require __DIR__ . "/../Views/cursos/crear.php";
    }

    // Guardar nuevo curso
    public function guardar(): void
    {
        $datos = $this->datosFormulario();

        Curso::create($datos);

        $this->volverAlListado();
    }

    // Mostrar formulario de edición
    public function editar(): void
    {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        $curso = $id ? Curso::find($id) : null;

        if (!$curso) {
            $this->volverAlListado();
        }

        require __DIR__ . "/../Views/cursos/editar.php";
    }

    // Actualizar curso
    public function actualizar(): void
    {
        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

        if (!$id) {
            http_response_code(400);
            exit("ID de curso inválido");
        }

        $datos = $this->datosFormulario();
        $datos[":id"] = $id;

        Curso::update($datos);

        $this->volverAlListado();
    }

    // Eliminar curso
    public function eliminar(): void
    {
        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

        if (!$id) {
            http_response_code(400);
            exit("ID de curso inválido");
        }

        Curso::delete($id);

        $this->volverAlListado();
    }

    // Recibir y validar los datos del formulario
    private function datosFormulario(): array
    {
        $nombre = trim($_POST["nombre"] ?? "");
        $codigo = trim($_POST["codigo"] ?? "");
        $idCarrera = filter_input(
            INPUT_POST, "id_carrera", FILTER_VALIDATE_INT
        );
        $creditos = filter_input(
            INPUT_POST, "creditos", FILTER_VALIDATE_INT
        );
        $descripcion = trim($_POST["descripcion"] ?? "");

        if (
            $nombre === "" ||
            $codigo === "" ||
            $idCarrera === false ||
            $idCarrera === null ||
            $idCarrera < 1 ||
            $creditos === false ||
            $creditos === null ||
            $creditos < 0
        ) {
            http_response_code(400);
            exit("Datos del curso inválidos");
        }

        return [
            ":nombre" => $nombre,
            ":codigo" => $codigo,
            ":id_carrera" => $idCarrera,
            ":creditos" => $creditos,
            ":descripcion" => $descripcion
        ];
    }

    // Regresar al listado
    private function volverAlListado(): void
    {
        header("Location: index.php?ruta=/cursos");
        exit;
    }
}

