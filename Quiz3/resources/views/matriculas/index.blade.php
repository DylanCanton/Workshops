<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Matrícula de estudiantes</title>
    <link rel="stylesheet" href="{{ asset('estilos.css') }}">
</head>
<body>

    <h1>Matrícula de estudiantes</h1>

    <a href="{{ route('cursos.index') }}">Administrar cursos</a>

    <br><br>

    @foreach($errors->all() as $error)
        <p style="color: red;">{{ $error }}</p>
    @endforeach

    <form action="{{ route('matriculas.store') }}" method="POST">

        @csrf

        <label>Nombre del estudiante:</label>
        <input type="text" name="nombre_estudiante" required>

        <br><br>

        <label>Seleccione un curso:</label>

        <select name="curso_id" required>

            <option value="">Seleccione un curso</option>

            @foreach($cursos as $curso)
                <option value="{{ $curso->id }}">
                    {{ $curso->nombre }}
                </option>
            @endforeach

        </select>

        <br><br>

        <button type="submit">Matricular</button>

    </form>

</body>
</html>