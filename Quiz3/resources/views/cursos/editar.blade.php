<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar curso</title>
    <link rel="stylesheet" href="{{ asset('estilos.css') }}">
</head>
<body>

    <h1>Editar curso</h1>

    @foreach($errors->all() as $error)
        <p style="color: red;">{{ $error }}</p>
    @endforeach

    <form action="{{ route('cursos.update', $curso->id) }}" method="POST">

        @csrf
        @method('PUT')

        <label>Nombre del curso:</label>
        <input type="text" name="nombre"
               value="{{ $curso->nombre }}" required>

        <br><br>

        <label>Código:</label>
        <input type="text" name="codigo"
               value="{{ $curso->codigo }}" required>

        <br><br>

        <label>Créditos:</label>
        <input type="number" name="creditos"
               value="{{ $curso->creditos }}" min="1" required>

        <br><br>

        <label>Carrera:</label>
        <select name="carrera_id" required>

            @foreach($carreras as $carrera)
                <option value="{{ $carrera->id }}"
                    @selected($curso->carrera_id == $carrera->id)>

                    {{ $carrera->nombre }}

                </option>
            @endforeach

        </select>

        <br><br>

        <button type="submit">Actualizar</button>

        <a href="{{ route('cursos.index') }}">Regresar</a>

    </form>

</body>
</html>