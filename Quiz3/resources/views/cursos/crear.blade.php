<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear curso</title>
    <link rel="stylesheet" href="{{ asset('estilos.css') }}">
</head>
<body>

    <h1>Crear curso</h1>

    @foreach($errors->all() as $error)
        <p style="color: red;">{{ $error }}</p>
    @endforeach

    <form action="{{ route('cursos.store') }}" method="POST">

        @csrf

        <label>Nombre del curso:</label>
        <input type="text" name="nombre" required>

        <br><br>

        <label>Código:</label>
        <input type="text" name="codigo" required>

        <br><br>

        <label>Créditos:</label>
        <input type="number" name="creditos" min="1" required>

        <br><br>

        <label>Carrera:</label>
        <select name="carrera_id" required>
            <option value="">Seleccione una carrera</option>

            @foreach($carreras as $carrera)
                <option value="{{ $carrera->id }}">
                    {{ $carrera->nombre }}
                </option>
            @endforeach
        </select>

        <br><br>

        <button type="submit">Guardar</button>

        <a href="{{ route('cursos.index') }}">Regresar</a>

    </form>

</body>
</html>