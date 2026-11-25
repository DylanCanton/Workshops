<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Matrícula exitosa</title>
    <link rel="stylesheet" href="{{ asset('estilos.css') }}">
</head>
<body>

    <h1>Matrícula realizada correctamente</h1>

    <p>Registro: {{ $matricula->id }}</p>

    <p>Estudiante: {{ $matricula->nombre_estudiante }}</p>

    <p>Curso: {{ $matricula->curso->nombre }}</p>

    <p>Código: {{ $matricula->curso->codigo }}</p>

    <p>Créditos: {{ $matricula->curso->creditos }}</p>

    <p>Carrera: {{ $matricula->curso->carrera->nombre }}</p>

    <p>Fecha: {{ $matricula->created_at }}</p>

    <a href="{{ route('matriculas.index') }}">
        Realizar otra matrícula
    </a>

</body>
</html>