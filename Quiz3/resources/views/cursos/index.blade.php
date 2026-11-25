<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cursos</title>
    <link rel="stylesheet" href="{{ asset('estilos.css') }}">
</head>
<body>

    <h1>Listado de cursos</h1>

    <a href="{{ route('matriculas.index') }}">Volver a matrícula</a>

    <a href="{{ route('cursos.create') }}">Crear curso</a>

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>Nombre</th>
            <th>Código</th>
            <th>Créditos</th>
            <th>Carrera</th>
            <th>Acciones</th>
        </tr>

        @foreach($cursos as $curso)
            <tr>
                <td>{{ $curso->nombre }}</td>
                <td>{{ $curso->codigo }}</td>
                <td>{{ $curso->creditos }}</td>
                <td>{{ $curso->carrera->nombre }}</td>
                <td>
                    <a href="{{ route('cursos.edit', $curso->id) }}">
                        Editar
                    </a>

                    <form action="{{ route('cursos.destroy', $curso->id) }}"
                          method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</body>
</html>